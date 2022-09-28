<?php

    class Activity{

        private int $idActivity;
        private int $theUser;
        private String $description;
        private String $date;

        public function __construct(){}

        public function init(int $idActivity, int $theUser, String $description, String $date){

            $this->idActivity = $idActivity;
            $this->theUser = $theUser;
            $this->description = $description;
            $this->date = $date;

        }

        public function getIdActivity():int{

            return $this->idActivity;

        }

        public function getTheUser():int{

            return $this->theUser;

        }

        public function getDescription():String{

            return $this->description;

        }

        public function getDate():String{

            return $this->date;

        }

        

    }

?>