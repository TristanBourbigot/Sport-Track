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

            $_SESSION['idUser'] = $results[0];
            $_SESSION['nom'] = $results[0]->getNom();
            $_SESSION['prenom'] = $results[0]->getPrenom();
            $_SESSION['dateN'] = $results[0]->getDateN();
            $_SESSION['sexe'] = $results[0]->getSexe();
            $_SESSION['taille'] = $results[0]->getTaille();
            $_SESSION['poids'] = $results[0]->getPoids();
            $_SESSION['email'] = $results[0]->getEmail();
            $_SESSION['mdp'] = $results[0]->getMdp();

        }else{
            $this->render('connect_valid',['error' => 'Email ou mot de passe incorrect', "user" => null]);
        }
    }
}

?>
