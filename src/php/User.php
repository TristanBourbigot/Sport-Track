<?php

    class User {

        private int $id;
        private String $name;
        private String $first_name;
        private String $birthdate;
        private String $gender;
        private String $height;
        private String $weight;
        private String $email;
        private String $password;

        public function __construct(){}

        public function init(String $name, String $first_name, String $birthdate, String $gender, String $height, String $weight, String $email, String $password) {
            
            $this->id = -1;
            $this->name = $name;
            $this->first_name = $first_name;
            $this->birthdate = $birthdate;
            $this->gender = $gender;
            $this->height = $height;
            $this->weight = $weight;
            $this->email = $email;
            $this->password = $password;

        }

        public function getId(): int {
            return $this->id;
        }

        public function setId(int $id): void {

            $this->id = $id;

        }

        public function getName(): String {
            return $this->name;
        }

        public function setName(String $name): void {

            $this->name = $name;

        }

        public function getFirstName(): String {
            return $this->first_name;
        }

        public function setFirstName(String $first_name): void {

            $this->first_name = $first_name;

        }

        public function getBirthdate(): String {
            return $this->birthdate;
        }

        public function setBirthdate(String $birthdate): void {

            $this->birthdate = $birthdate;

        }

        public function getGender(): String {
            return $this->gender;
        }

        public function setGender(String $gender): void {

            $this->gender = $gender;

        }

        public function getHeight(): String {
            return $this->height;
        }

        public function setHeight(String $height): void {

            $this->height = $height;

        }

        public function getWeight(): String {
            return $this->weight;
        }

        public function setWeight(String $weight): void {

            $this->weight = $weight;

        }

        public function getEmail(): String {
            return $this->email;
        }

        public function setEmail(String $email): void {

            $this->email = $email;

        }

        public function getPassword(): String {
            return $this->password;
        }

        public function setPassword(String $password): void {

            $this->password = $password;

        }

        public function __toString()
        {
            
            return "User [id=" . $this->id . ", name=" . $this->name . ", first_name=" . $this->first_name . ", birthdate=" . $this->birthdate . ", gender=" . $this->gender . ", height=" . $this->height . ", weight=" . $this->weight . ", email=" . $this->email . ", password=" . $this->password . "]";

        }

    }
?>