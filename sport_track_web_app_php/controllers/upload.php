<?php
require(__ROOT__.'/controllers/Controller.php');
require_once (__ROOT__.'/model/User.php');
require_once (__ROOT__.'/model/Activities.php');
require_once (__ROOT__.'/model/Data.php');
require_once (__ROOT__.'/model/ActivityDAO.php');
require_once (__ROOT__.'/model/ActivityEntryDAO.php');
require_once (__ROOT__.'/controllers/CalculDistanceImpl.php');


class UploadActivityController extends Controller{
    private array $dataArray;
    
    public function get($request){ 
        $this->render('upload_activity_form',[]);
    }
    
    public function post($request){

        try{

            session_start();

            if($_SESSION){

                if(isset($_FILES["activites"])){

                    $FileData = file_get_contents($_FILES["activites"]["tmp_name"]);
                    
                    $json_data = json_decode($FileData,true);
                    
                    $act = new Activity();
                    $this->initArray();
                    
                    foreach ($json_data as $key => $value) {

                        if($key == "activity"){  

                            $date = $value["date"];
                            $desc = $value["description"];
                            
                        }elseif ($key == "data"){     

                            foreach($value as $k => $v){
                                
                                $time = $v["hour"];
                                $cFreq = $v["cardio_frequency"];
                                $latitude = $v["latitude"];
                                $longitude = $v["longitude"];
                                $altitude = $v["altitude"];
                                
                                $this->dataSauv($time,$cFreq,$latitude,$longitude,$altitude);

                            }

                        }else{

                            $this->render('error',["Une erreur est survenue lors du parcours du fichier"]);

                         }

                    }                
                    
                    $sT = strtotime($this->dataArray[0]);
                    $eT = strtotime($this->dataArray[count($this->dataArray) - 5]);
                    $dur = $eT - $sT;
                    $duration = date("H:i:s",$dur);     
                        
                    $classCalc = new CalculDistanceImpl();
                    $parcours = array();
                    for ($i = 2; $i < count($this->dataArray); $i = $i + 5) {
                        array_push($parcours,['latitude' => $this->dataArray[$i], 'longitude' => $this->dataArray[$i+1]]);
                    }
                    $distTotale = $classCalc->calculDistanceTrajet($parcours);
    
                    $minVal = 0;
                    $maxVal = 2147483647;
                    $avgVal = 0;
                    $count = 0;
                    $add = 0;
    
                    //Cross all the cardioFrequencies to find the min, max and avg
                    for ($i = 1; $i < count($this->dataArray); $i = $i + 5) {
                        if($this->dataArray[$i] < $maxVal){
                            $maxVal = $this->dataArray[$i];
                        }
                        if($this->dataArray[$i] > $minVal){
                            $minVal = $this->dataArray[$i];
                        }
                        $add = $add + $this->dataArray[$i];
                        $count++;
                    }
                    $tmp = $minVal;
                    $minVal = $maxVal;               //minimal cardioFrequency
                    $maxVal = $tmp;                  //maximal cardioFrequency
                    $avgVal = intval($add/$count);   //average cardioFrequency
                    
                    //initialize an activity
                    $act->init(1, $desc, $date, $this->dataArray[0], $duration, $distTotale, $minVal, $avgVal, $maxVal, $_SESSION['idUser']);

                    //insert activityDAO
                    ActivityDAO::getInstance()->insert($act);
                                    
                    for($i = 0; $i < count($this->dataArray); $i = $i + 5){

                        //init the matching data
                        $data = new Data();
                        $data->init(123,$this->dataArray[$i],$this->dataArray[$i+1], $this->dataArray[$i+3], $this->dataArray[$i+2], $this->dataArray[$i+4], $act->getIdActivity());
                    
                        //insert activityEntryDAO
                        ActivityEntryDAO::getInstance()->insert($data);

                    }  
    
                    $this->render('upload_valid',[]);

                 }

                 if(isset($_FILES["file"])){

                    echo realpath($_FILES["file"]["tmp_name"]);

                 }


                
            }else{

                $this->render('user_connect_form',[]);

            }

        }catch(Exception $e){

            echo $e->getMessage();

        }

    }

    private function dataSauv($time,$cFreq,$latitude,$longitude,$altitude){

        array_push($this->dataArray,$time,$cFreq,$latitude,$longitude,$altitude);

    }

    private function initArray(){

        $this->dataArray = array();

    }
    
}

?>