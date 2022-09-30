<?php
require(__ROOT__.'/controllers/Controller.php');

class DisconnectUserController extends Controller{
 
    public function get($request){ 
        session_start();
        if($_SESSION){
            if(session_destroy()){
                $this->render('user_disconnect',[]);
            }else{
                $this->render('error',["déconnecté"]);
            }
        }else{
            $this->render('error',["Vous n'êtes pas connecté"]);
        }
    }
}
?>