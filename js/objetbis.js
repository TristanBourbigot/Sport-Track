
class Calculdistance {

    constructor(){
        this.$R=6378.137;
    }
    
    /**
     * calcul la distance entre 2 points GPS
     * @param {double} $lat1 latitude du point 1
     * @param {double} $lon1 longitude du point 1
     * @param {double} $lat2 latitude du point 2
     * @param {double} $lon2 longitude du point 2
     * @returns la distance en km entre les 2 points
     */
    calculDistance2PointsGPS($lat1, $lon1, $lat2, $lon2) {
        $lon1 = $lon1 * Math.PI / 180;
        $lon2 = $lon2 * Math.PI / 180;
        $lat1 = $lat1 * Math.PI / 180;
        $lat2 = $lat2 * Math.PI / 180;
        return Math.acos(Math.sin($lat1) * Math.sin($lat2) + Math.cos($lat1) * Math.cos($lat2) * Math.cos($lon2 - $lon1)) * this.$R;
    }


    /**
     * cacul la distance entre un point GPS et un point GPS d'un tableau
     * @param {Array} $activite tableau de coordonnées GPS de l'activité
     * @returns la distance parcourue en km lors de l'activité
     */
    CalculdistanceTrajet($activite) {
        $ret=0;

        for ($i = 0; $i < $activite.length - 1; $i++) {
            $ret += this.calculDistance2PointsGPS($activite[$i].latitude, $activite[$i].longitude, $activite[$i + 1].latitude, $activite[$i + 1].longitude);
        }
        return $ret;
    }
}