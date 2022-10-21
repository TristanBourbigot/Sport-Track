var express = require("express");
var router = express.Router();
var activity_dao = require("sport_track_db").activity_dao;
var activity_entry_dao = require("sport_track_db").activity_entry_dao;

// page de connection
router.get("/", function (req, res) {
    // var valActivity = ["Course", "2020-04-22", 2];
    // var activite = [
    //     {"time":"13:00:00","cardio_frequency":99,"latitude":47.644795,"longitude":-2.776605,"altitude":18},
    //     {"time":"13:00:05","cardio_frequency":100,"latitude":47.646870,"longitude":-2.778911,"altitude":18},
    //     {"time":"13:00:10","cardio_frequency":102,"latitude":47.646197,"longitude":-2.780220,"altitude":18},
    //     {"time":"13:00:15","cardio_frequency":100,"latitude":47.646992,"longitude":-2.781068,"altitude":17},
    //     {"time":"13:00:20","cardio_frequency":98,"latitude":47.647867,"longitude":-2.781744,"altitude":16},
    //     {"time":"13:00:25","cardio_frequency":103,"latitude":47.648510,"longitude":-2.780145,"altitude":16}
    //   ]
    //   activity_dao.insert(valActivity, function (err, result) {
    //     if (err) {
    //         console.log(err);
    //     }
    //     for(var i = 0; i < activite.length; i++){
    //         activity_entry_dao.insert([10, activite[i].time, activite[i].cardio_frequency, activite[i].latitude, activite[i].longitude, activite[i].altitude], function (err, result) {
    //             if (err) {
    //                 console.log(err);
    //             }
    //         });
    //     }
    // });

    if(req.session.email){
        activity_entry_dao.findAllAndJoinActivity(function (err, rows) {
            if (err != null) {
                console.log("ERROR= " + err);
            } else {
                activity_entry_dao.findAllAndJoinActivityDistance(function (err, rows2) {
                    if (err != null) {
                        console.log("ERROR= " + err);
                    } else {
                        var distance = [];
                        var tempDistance = 0;
                        if(rows2.length > 0){
                            var activities = rows2[0].theActivity;
                            var i = 0;
                            while(i < rows2.length){
                                var tempDistance = [];
                                while(i<rows2.length && rows2[i].theActivity == activities){
                                    tempDistance.push({"latitude": rows2[i].lattitude, "longitude": rows2[i].longitude});
                                    i++;
                                }
                                distance.push({"distance": calculDistanceTrajet(tempDistance)});
                            }
                        }
                        
                        res.render("activities", {data: rows, distance: distance});
                    }
                });
            }
        });
    }else{
        res.redirect("/connect");
    }

});

//calcul de la distance entre 2 points GPS
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

//calcul de la distance totale d'une activité
function calculDistanceTrajet(activity){

    var distance = 0;
    var lat1 = 0;
    var lat2 = 0;
    var lon1 = 0;
    var lon2 = 0;

    for (i = 0; i < activity.length - 1; i++) {

        lat1 = activity[i].latitude;
        lon1 = activity[i].longitude;
        lat2 = activity[i+1].latitude;
        lon2 = activity[i+1].longitude;

        distance = distance + calculDistance2PointsGPS(lat1, lat2, lon1, lon2);

    }

    return distance;

}

module.exports = router;