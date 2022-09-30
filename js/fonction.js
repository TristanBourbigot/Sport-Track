function calculDistance2PointsGPS(lat1, lat2, lon1, lon2) {

    var pi = Math.PI;
    // Calcul de la distance

    lat1 = lat1 * pi / 180;
    lat2 = lat2 * pi / 180;
    lon1 = lon1 * pi / 180;
    lon2 = lon2 * pi / 180;

    distance = 6378.137 * Math.acos(Math.cos(lat1) * Math.cos(lat2) * Math.cos(lon2 - lon1) + Math.sin(lat1) * Math.sin(lat2));

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

var activite = [
    {"time":"13:00:00","cardio_frequency":99,"latitude":47.644795,"longitude":-2.776605,"altitude":18},
    {"time":"13:00:05","cardio_frequency":100,"latitude":47.646870,"longitude":-2.778911,"altitude":18},
    {"time":"13:00:10","cardio_frequency":102,"latitude":47.646197,"longitude":-2.780220,"altitude":18},
    {"time":"13:00:15","cardio_frequency":100,"latitude":47.646992,"longitude":-2.781068,"altitude":17},
    {"time":"13:00:20","cardio_frequency":98,"latitude":47.647867,"longitude":-2.781744,"altitude":16},
    {"time":"13:00:25","cardio_frequency":103,"latitude":47.648510,"longitude":-2.780145,"altitude":16}
  ]

console.log(calculDistanceTrajet(activite));