<?php

    class SqliteConnection{

        private static $instance;
        private $pdo;

        private function __construct(){

            try{

                $this->pdo = new PDO('sqlite:sqlite-tools-win32-x86-3390300/sport_track.db');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(Exception $e){

                echo('Erreur : '.$e->getMessage());

            }

        }

        public function getInstance(){

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