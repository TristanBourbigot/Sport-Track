<?php
require_once('SqliteConnection.php');
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
        $query = "select * from students order by nom,prenom";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        return $results;
    }

    public final function insert(User $st): void{
        if($st instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into User(name, firstname, birthdate, gender, height, weight, email, password) values (:n,:f,:b,:g,:h,:w,:e,:p)";
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
        }
    }

    public function delete(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "DELETE INTO FROM USER WHERE id = :i";
            $stmt = $dbc->prepare($query);

            $stmt->bindValue(':i',$obj->getIdUser(),PDO::PARAM_STR);

            $stmt->execute();
        }
    }

    public function update(User $obj): void {
        if($obj instanceof User){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "UPDATE User SET name=:n, firstname=:f, birthdate=:b, gender=:g, height=:h, weight=:w, email=:e, password=:p WERE id=:i";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':i',$obj->getIdUser(),PDO::PARAM_STR);
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
        }
    }
}
?>