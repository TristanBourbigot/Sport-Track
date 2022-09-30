<?php
    
    class Data{

        private int $idData;
        private int $theActivity;
        private string $hour;
        private int $cardioFrequency;
        private float $lattitude;
        private float $longitude;
        private float $altitude;

        public function __construct(){}

        public function init(int $theActivity, string $hour, int $cardioFrequency, float $lattitude, float $longitude, float $altitude){

            $this->idData = -1;
            $this->theActivity = $theActivity;
            $this->hour = $hour;
            $this->cardioFrequency = $cardioFrequency;
            $this->lattitude = $lattitude;
            $this->longitude = $longitude;
            $this->altitude = $altitude;

        }

        public function getIdData(): int{
            return $this->idData;
        }

        public function setIdData(int $idData): void{
            $this->idData = $idData;
        }

        public function getTheActivity(): int{
            return $this->theActivity;
        }

        public function setTheActivity(int $theActivity): void{
            $this->theActivity = $theActivity;
        }

        public function getTime(): String{
            return $this->hour;
        }

        public function setTime(String $hour): void{
            $this->hour = $hour;
        }

        public function getCardioFrequency(): int{
            return $this->cardioFrequency;
        }

        public function setCardioFrequency(int $cardioFrequency): void{
            $this->cardioFrequency = $cardioFrequency;
        }

        public function getLattitude(): float{
            return $this->lattitude;
        }

        public function setLattitude(float $lattitude): void{
            $this->lattitude = $lattitude;
        }

        public function getLongitude(): float{
            return $this->longitude;
        }

        public function setLongitude(float $longitude): void{
            $this->longitude = $longitude;
        }

        public function getAltitude(): float{
            return $this->altitude;
        }

        public function setAltitude(float $altitude): void{
            $this->altitude = $altitude;
        }

        public function __toString()
        {
            
            return "Data [idData=" . $this->idData . ", theActivity=" . $this->theActivity . ", time=" . $this->hour . ", cardioFrequency=" . $this->cardioFrequency . ", lattitude=" . $this->lattitude . ", longitude=" . $this->longitude . ", altitude=" . $this->altitude . "]";
        
        }


    }

?>