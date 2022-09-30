
class Calculdistance {

    constructor(){
        this.$R=6378.137;
    }
    
    calculDistance2PointsGPS($lat1, $lon1, $lat2, $lon2) {
        $lon1 = $lon1 * Math.PI / 180;
        $lon2 = $lon2 * Math.PI / 180;
        $lat1 = $lat1 * Math.PI / 180;
        $lat2 = $lat2 * Math.PI / 180;
        return Math.acos(Math.sin($lat1) * Math.sin($lat2) + Math.cos($lat1) * Math.cos($lat2) * Math.cos($lon2 - $lon1)) * this.$R;
    }


    CalculdistanceTrajet() {}
}