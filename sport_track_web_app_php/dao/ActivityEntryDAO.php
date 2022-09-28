<?php
require_once('SqliteConnection.php');
class ActivityEntryDAO {
    private static ActivityEntryDAO $dao;

    private function __construct() {}

    public static function getInstance(): ActivityEntryDAO {
        if(!isset(self::$dao)) {
            self::$dao= new ActivityEntryDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Data order by id";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert(Data $st): void{
        if($st instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Data(theActivity, hour,cardioFrequency,lattitude,longitude,altitude) values (:idAct,:time,:card,:lat,:long,:alt)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':idAct',$st->getTheActivity(),PDO::PARAM_STR);
            $stmt->bindValue(':time',$st->getTime(),PDO::PARAM_STR);
            $stmt->bindValue(':card',$st->getCardioFrequency(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$st->getLattitude(),PDO::PARAM_STR);
            $stmt->bindValue(':long',$st->getLongitude(),PDO::PARAM_STR);
            $stmt->bindValue(':alt',$st->getAltitude(),PDO::PARAM_STR);
            
            

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete(Data $obj): void {
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Data WHERE idData = :i";
            $stmt = $dbc->prepare($query);

            $stmt->bindValue(':i',$obj->getIdData(),PDO::PARAM_STR);

            $stmt->execute();
        }
    }

    public function update(Data $obj): void {
        if($obj instanceof Data){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Data SET theActivity=:act, hour=:time, cardioFrequency=:card, lattitude=:lat, longitude=:long, altitude=:alt WHERE idDATA=:id";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getIdData(),PDO::PARAM_STR);
            $stmt->bindValue(':Act',$obj->getTheActivity(),PDO::PARAM_STR);
            $stmt->bindValue(':time',$obj->getTime(),PDO::PARAM_STR);
            $stmt->bindValue(':card',$obj->getCardioFrequency(),PDO::PARAM_STR);
            $stmt->bindValue(':lat',$obj->getLattitude(),PDO::PARAM_STR);
            $stmt->bindValue(':long',$obj->getLongitude(),PDO::PARAM_STR);
            $stmt->bindValue(':alt',$obj->getAltitude(),PDO::PARAM_STR);
            

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>