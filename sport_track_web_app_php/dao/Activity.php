<?php

    class Activity{

        private int $idActivity;
        private int $theUser;
        private String $description;
        private String $date;

        public function __construct(){}

        public function init(int $theUser, String $description, String $date){

            $this->idActivity = -1;
            $this->theUser = $theUser;
            $this->description = $description;
            $this->date = $date;

        }

        public function getIdActivity():int{

            return $this->idActivity;

        }

        public function setIdActivity(int $idActivity):void{

            $this->idActivity = $idActivity;

        }

        public function getTheUser():int{

            return $this->theUser;

        }

        public function setTheUser(int $theUser):void{

            $this->theUser = $theUser;

        }

        public function getDescription():String{

            return $this->description;

        }

        public function setDescription(String $description):void{

            $this->description = $description;

        }

        public function getDate():String{

            return $this->date;

        }

        public function setDate(String $date):void{

            $this->date = $date;

        }

        public function __toString()
        {
            
            return "Activity [idActivity=" . $this->idActivity . ", theUser=" . $this->theUser . ", description=" . $this->description . ", date=" . $this->date . "]";

        }

        

    }

?>