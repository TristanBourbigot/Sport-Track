<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/dao/SqliteConnection.php');
require(__ROOT__.'/dao/UtilisateurDAO.php');
require_once(__ROOT__.'/dao/User.php');

class ConnectController extends Controller{

    public function get($request){
        $this->render('user_connect_form',[]);
    }

    public function post($request){
        $pdo = SqliteConnection::getInstance()->getConnection();
        $query = "select * from User where email= ? and password = ? order by id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$request['email'],$request['mdp']]);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
        if(count($results) == 1){
            session_start();
            $_SESSION['idUser'] = $results[0];
            $_SESSION['nom'] = $results[0]->getName();
            $_SESSION['prenom'] = $results[0]->getFirstName();
            $_SESSION['dateN'] = $results[0]->getBirthdate();
            $_SESSION['sexe'] = $results[0]->getGender();
            $_SESSION['taille'] = $results[0]->getHeight();
            $_SESSION['poids'] = $results[0]->getWeight();
            $_SESSION['email'] = $results[0]->getEmail();
            $_SESSION['mdp'] = $results[0]->getPassword();
            $this->render('user_connect_valid',['error' => 'connecté', "user" => $results[0]]);

            
        }else{
            $this->render('user_connect_valid',['error' => 'Email ou mot de passe incorrect', "user" => null]);
        }
    }
}

?>
