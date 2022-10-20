var express = require("express");
var router = express.Router();
var activity_entry_dao = require("sport_track_db").activity_entry_dao;

// page de connection
router.get("/", function (req, res) {
    if(req.session.email){
        activity_entry_dao.findAllAndJoinActivity(function (err, rows) {
            if (err != null) {
                console.log("ERROR= " + err);
            } else {
                res.render("activities", {data: rows});
            }
        });
    }else{
        res.redirect("/connect");
    }

});

module.exports = router;