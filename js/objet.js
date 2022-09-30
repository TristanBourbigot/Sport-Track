
function Calculdistance(){
    Calculdistance.prototype.calculDistance2PointsGPS = function($lat1, $lon1, $lat2, $lon2) {
        $R = 6378.137;
        $lon1 = $lon1 * Math.PI / 180;
        $lon2 = $lon2 * Math.PI / 180;
        $lat1 = $lat1 * Math.PI / 180;
        $lat2 = $lat2 * Math.PI / 180;
        return Math.acos(Math.sin($lat1) * Math.sin($lat2) + Math.cos($lat1) * Math.cos($lat2) * Math.cos($lon2 - $lon1)) * $R;
    }

    Calculdistance.prototype.CalculdistanceTrajet = function($activite) {
        $ret = 0;

        for ($i = 0; $i < $activite.length - 1; $i++) {
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