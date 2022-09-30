<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/dao/SqliteConnection.php');
require(__ROOT__.'/dao/UtilisateurDAO.php');
require(__ROOT__.'/dao/User.php');

class ConnectController extends Controller{

    public function get($request){
        $this->render('connect_form',[]);
    }

    public function post($request){
        $pdo = SqliteConnection::getInstance()->getConnection();
        $query = "select * from User where email=". $request['email']." and password = ".$request['mdp']." order by id";
        $stmt = $pdo->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'User');
        if(count($results) == 1){
             $this->render('connect_valid',['error' => 'connecté', "user" => $results[0]]);
        }else{
            $this->render('connect_valid',['error' => 'Email ou mot de passe incorrect', "user" => null]);
        }
    }
}

?>
