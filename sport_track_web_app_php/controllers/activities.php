<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/dao/User.php');
require(__ROOT__.'/dao/Activity.php');
require(__ROOT__.'/dao/Data.php');
require(__ROOT__.'/dao/ActivityDAO.php');
require_once(__ROOT__.'/dao/ActivityEntryDAO.php');
require(__ROOT__.'/dao/CalculDistanceImpl.php');

    class ListActivityController extends Controller{

        public function get($request){

            session_start();

            if(isset($_SESSION)){

                $activities = ActivityDAO::getInstance();
                $listActivities = $activities->findAllSpecific($_SESSION['idUser']->getId());

                $count = count($listActivities);
                $arrResult = array('', $count, 3);

                for($i = 0; $i < $count; $i++){

                    $arrResult[$i][0] = $listActivities[$i]->getId();
                    $arrResult[$i][1] = $listActivities[$i]->getDate();
                    $arrResult[$i][2] = $listActivities[$i]->getDescription();

                }
                
                $this->render('list_activity',["activities" => $arrResult]);

            }else{

                $this->render('error',["Vous n'êtes pas connecté"]);

            }

        }

    } 

?>