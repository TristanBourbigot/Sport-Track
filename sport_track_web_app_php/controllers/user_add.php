<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/dao/SqliteConnection.php');
require( __ROOT__."/dao/User.php"); 
require( __ROOT__."/dao/UtilisateurDAO.php");

class AddUserController extends Controller{
   
    public function get($request){
        $this->render('user_add_form',[]);
    }

    public function post($request){
     
        $insertUser = UtilisateurDAO::getInstance();
        $user = new User();
        try{
            $pdo = SqliteConnection::getInstance()->getConnection();
            $email = $request['email'];
            $query = "select * from User where email =?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$email]);
            $results = $stmt->fetch();
            if($results){
                $this->render('user_add_valid',['nom' => $request['nom'], 'prenom' => $request['prenom'], 'date de Naissance' => $request['dateN'], 'sexe' => $request['sexe'], 'taille' => $request['taille'], 'poids' => $request['poids'], 'email' => $request['email'], 'mot de passe' => $request['mdp'],'insert' => 'Email déjà utilisé']);
            }else{
                $user->init($request['nom'],$request['prenom'],$request['dateN'],$request['sexe'],$request['taille'],$request['poids'],$request['email'],$request['mdp']);
                $result1 = $insertUser->findAll();
                $insertUser->insert($user);
                $result2 = $insertUser->findAll();
                if(count($result1) == count($result2)){
                    $this->render('user_add_valid',['nom' => $request['nom'], 'prenom' => $request['prenom'], 'date de Naissance' => $request['dateN'], 'sexe' => $request['sexe'], 'taille' => $request['taille'], 'poids' => $request['poids'], 'email' => $request['email'], 'mot de passe' => $request['mdp'], 'insert' => 'compte non créé']);
                }
                else{
                    $this->render('user_add_valid',['nom' => $request['nom'], 'prenom' => $request['prenom'], 'date de Naissance' => $request['dateN'], 'sexe' => $request['sexe'], 'taille' => $request['taille'], 'poids' => $request['poids'], 'email' => $request['email'], 'mot de passe' => $request['mdp'],'insert' => 'compte bien créé']);
                }
            }
        }catch(Exception $e){
            $this->render('user_add_valid', ['nom' => $request['nom'], 'prenom' => $request['prenom'], 'date de Naissance' => $request['dateN'], 'sexe' => $request['sexe'], 'taille' => $request['taille'], 'poids' => $request['poids'], 'email' => $request['email'], 'mot de passe' => $request['mdp'],'insert' => $e->getMessage()]);
            return;
        }
        
        
    }
}

?>
