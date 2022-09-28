<?php

require_once 'CalculDistance.php';

class CalculDistanceImpl implements CalculDistance{

    /**
     * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
     * @param float $lat1 Latitude du premier point GPS
     * @param float $long1 Longitude du premier point GPS
     * @param float $lat2 Latitude du second point GPS
     * @param float $long2 Longitude du second point GPS
     * @return float La distance entre les deux points GPS
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float{
        $lat1  = pi()*($lat1)/180;
        $lat2  = pi()*($lat2)/180;
        $long1  = pi()*($long1)/180;
        $long2  = pi()*($long2)/180;

        return 6378.137 * acos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1));
    }


    /**
     * Retourne la distance en mètres du parcours passé en paramètres. Le parcours est
     * défini par un tableau ordonné de points GPS.
     * @param Array $parcours Le tableau contenant les points GPS
     * @return float La distance du parcours
     */
    public function calculDistanceTrajet(Array $parcours): float{
        $ret=0;

        $i=0;
        while($i<sizeof($parcours)-1){
            $ret = $ret + $this->calculDistance2PointsGPS($parcours[$i]["latitude"],$parcours[$i]["longitude"],$parcours[$i+1]["latitude"],$parcours[$i+1]["longitude"]);
            $i++;
        }

        return $ret;
    }
}
?>