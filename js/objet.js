
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
