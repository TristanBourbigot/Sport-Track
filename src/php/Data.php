<?php
    
    class Data{

        private int $idData;
        private int $theActivity;
        private String $time;
        private int $cardioFrequency;
        private float $lattitude;
        private float $longitude;
        private float $altitude;

        public function __construct(){}

        public function init(int $idData, int $theActivity, String $time, int $cardioFrequency, float $lattitude, float $longitude, float $altitude){

            $this->idData = $idData;
            $this->theActivity = $theActivity;
            $this->time = $time;
            $this->cardioFrequency = $cardioFrequency;
            $this->lattitude = $lattitude;
            $this->longitude = $longitude;
            $this->altitude = $altitude;

        }

        public function getIdData(): int{
            return $this->idData;
        }

        public function getTheActivity(): int{
            return $this->theActivity;
        }

        public function getTime(): String{
            return $this->time;
        }

        public function getCardioFrequency(): int{
            return $this->cardioFrequency;
        }

        public function getLattitude(): float{
            return $this->lattitude;
        }

        public function getLongitude(): float{
            return $this->longitude;
        }

        public function getAltitude(): float{
            return $this->altitude;
        }

    }

?>