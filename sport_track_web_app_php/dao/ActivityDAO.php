<?php
require_once('SqliteConnection.php');
class ActivityDAO {
    private static ActivityDAO $dao;

    private function __construct() {}

    public static function getInstance(): ActivityDAO {
        if(!isset(self::$dao)) {
            self::$dao= new ActivityDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from Activity order by idActivity";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert(Activity $st): void{
        if($st instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into Activity(theUser, description, date) values (:user,:desc,:d)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':user',$st->getTheUser(),PDO::PARAM_STR);
            $stmt->bindValue(':desc',$st->getDescription(),PDO::PARAM_STR);
            $stmt->bindValue(':d',$st->getDate(),PDO::PARAM_STR);
            
            

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete(Activity $obj): void {
        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE FROM Activity WHERE idActivity = :i";
            $stmt = $dbc->prepare($query);

            $stmt->bindValue(':i',$obj->getIdActivity(),PDO::PARAM_STR);

            $stmt->execute();
        }
    }

    public function update(Activity $obj): void {
        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE Activity SET theUser=:user, description=:desc, date=:d WHERE idActivity=:i";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':i',$obj->getIdActivity(),PDO::PARAM_STR);
            $stmt->bindValue(':user',$obj->getTheUser(),PDO::PARAM_STR);
            $stmt->bindValue(':desc',$obj->getDescription(),PDO::PARAM_STR);
            $stmt->bindValue(':d',$obj->getDate(),PDO::PARAM_STR);
            

            // execute the prepared statement
            $stmt->execute();
        }
    }
}
?>