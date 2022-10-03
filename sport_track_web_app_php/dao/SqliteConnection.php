<?php

    class SqliteConnection{

        private static $instance;
        private $pdo;

        private function __construct(){

            try{
                $this->pdo = new PDO('sqlite:'.BD_DIR.'/sport_track.db');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(Exception $e){

                echo('Erreur : '.$e->getMessage());

            }

        }

        public static function getInstance(){

            if(isset(self::$instance)){

                return self::$instance;

            }else{

                self::$instance = new SqliteConnection();
                return self::$instance;

            }

        }

        public function getConnection(){

            return $this->pdo;
            
        }

    }

?>