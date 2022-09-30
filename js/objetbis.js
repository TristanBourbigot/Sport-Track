
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
        var $ret=0;

        for (var $i = 0; $i < $activite.length - 1; $i++) {
            $ret += this.calculDistance2PointsGPS($activite[$i].latitude, $activite[$i].longitude, $activite[$i + 1].latitude, $activite[$i + 1].longitude);
        }
        return $ret;
    }
}

var activite = [
    {"time":"13:00:00","cardio_frequency":99,"latitude":47.644795,"longitude":-2.776605,"altitude":18},
    {"time":"13:00:05","cardio_frequency":100,"latitude":47.646870,"longitude":-2.778911,"altitude":18},
    {"time":"13:00:10","cardio_frequency":102,"latitude":47.646197,"longitude":-2.780220,"altitude":18},
    {"time":"13:00:15","cardio_frequency":100,"latitude":47.646992,"longitude":-2.781068,"altitude":17},
    {"time":"13:00:20","cardio_frequency":98,"latitude":47.647867,"longitude":-2.781744,"altitude":16},
    {"time":"13:00:25","cardio_frequency":103,"latitude":47.648510,"longitude":-2.780145,"altitude":16}
  ]

var calcul = new Calculdistance();
console.log(calcul.CalculdistanceTrajet(activite));