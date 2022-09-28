<?php

    class User {

        private int $idUser;
        private String $name;
        private String $first_name;
        private String $birthdate;
        private String $gender;
        private String $height;
        private String $weight;
        private String $email;
        private String $password;

        public function __construct(){}

        public function init(int $idUser, String $name, String $first_name, String $birthdate, String $gender, String $height, String $weight, String $email, String $password) {
            $this->idUser = $idUser;
            $this->name = $name;
            $this->first_name = $first_name;
            $this->birthdate = $birthdate;

        }

        public function getIdUser(): int {
            return $this->idUser;
        }

        public function getName(): String {
            return $this->name;
        }

        public function getFirstName(): String {
            return $this->first_name;
        }

        public function getBirthdate(): String {
            return $this->birthdate;
        }

        public function getGender(): String {
            return $this->gender;
        }

        public function getHeight(): String {
            return $this->height;
        }

        public function getWeight(): String {
            return $this->weight;
        }

        public function getEmail(): String {
            return $this->email;
        }

        public function getPassword(): String {
            return $this->password;
        }
        
    }
?>