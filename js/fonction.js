function calculDistance2PointsGPS(lat1, lat2, lon1, lon2) {

    var pi = Math.PI;
    // Calcul de la distance

    lat1 = lat1 * pi / 180;
    lat2 = lat2 * pi / 180;
    lon1 = lon1 * pi / 180;
    lon2 = lon2 * pi / 180;

    distance = 6378.137 * Math.acos(Math.cos(lat1) * Math.cos(lat2) * Math.cos(lon2 - lon1) + Math.sin(lat1) * Math.sin(lat2));

    // Affichage du résultat
    alert("La distance est de " + distance + " km");

    return distance;

}

function calculDistanceTrajet(activity){

    var distance = 0;
    var lat1 = 0;
    var lat2 = 0;
    var lon1 = 0;
    var lon2 = 0;
    var i = 0;

    for (i = 0; i < activity.length - 1; i++) {

        lat1 = activity[i].latitude;
        lon1 = activity[i].longitude;
        lat2 = activity[i+1].latitude;
        lon2 = activity[i+1].longitude;

        distance = distance + calculDistance2PointsGPS(lat1, lat2, lon1, lon2);

    }

    return distance;

}