<?php
require_once('SqliteConnection.php');
require_once('User.php');
require_once('ActivityDAO.php');
require_once('Activity.php');

class UtilisateurDAO {
    private static UtilisateurDAO $dao;

    private function __construct() {}

    public static function getInstance(): UtilisateurDAO {
        if(!isset(self::$dao)) {
            self::$dao= new UtilisateurDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array{
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "select * from User order by first_name, name";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert(User $st): void{
        if($st instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into User(name, first_name, birthdate, gender, height, weight, email, password) values (:n,:f,:b,:g,:h,:w,:e,:p)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':n',$st->getName(),PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFirstName(),PDO::PARAM_STR);
            $stmt->bindValue(':b',$st->getBirthdate(),PDO::PARAM_STR);
            $stmt->bindValue(':g',$st->getGender(),PDO::PARAM_STR);
            $stmt->bindValue(':h',$st->getHeight(),PDO::PARAM_STR);
            $stmt->bindValue(':w',$st->getWeight(),PDO::PARAM_STR);
            $stmt->bindValue(':e',$st->getEmail(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPassword(),PDO::PARAM_STR);
            
            // execute the prepared statement
            $stmt->execute();

            $lastId = $dbc->lastInsertId();
            $st->setId($lastId);
        }
    }

    public function delete(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            
            $activities = ActivityDAO::getInstance();
            $userActivities = $activities->findAllSpecific($obj->getId());
            $nbSpecificActivities = count($userActivities);

            for($i = 0; $i < $nbSpecificActivities; $i++){

                $activities -> delete($userActivities[$i]);

            }


            $query = "DELETE FROM User WHERE id = :i";
            try{
                
                $stmt = $dbc->prepare($query);

                $stmt->bindValue(':i',$obj->getId(),PDO::PARAM_STR);

                $stmt->execute();

            }catch(Exception $e){
                echo('Erreur : '.$e->getMessage());
            }
            
        }
    }

    public function update(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();

            // prepare the SQL statement
            $query = "UPDATE User SET name=:n, first_name=:f, birthdate=:b, gender=:g, height=:h, weight=:w, email=:e, password=:p WHERE id=:i";
            
            try {
                
                $stmt = $dbc->prepare($query);

                // bind the paramaters
                $stmt->bindValue(':i',$obj->getId(),PDO::PARAM_STR);
                $stmt->bindValue(':n',$obj->getName(),PDO::PARAM_STR);
                $stmt->bindValue(':f',$obj->getFirstName(),PDO::PARAM_STR);
                $stmt->bindValue(':b',$obj->getBirthdate(),PDO::PARAM_STR);
                $stmt->bindValue(':g',$obj->getGender(),PDO::PARAM_STR);
                $stmt->bindValue(':h',$obj->getHeight(),PDO::PARAM_STR);
                $stmt->bindValue(':w',$obj->getWeight(),PDO::PARAM_STR);
                $stmt->bindValue(':e',$obj->getEmail(),PDO::PARAM_STR);
                $stmt->bindValue(':p',$obj->getPassword(),PDO::PARAM_STR);
                

                // execute the prepared statement
                $stmt->execute();

            } catch (Exception $e) {
                echo('Erreur : '.$e->getMessage());
            }
            
        }
    }
}
?>