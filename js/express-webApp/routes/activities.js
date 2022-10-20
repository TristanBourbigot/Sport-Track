var express = require("express");
var router = express.Router();
var activity_dao = require("sport_track_db").activity_dao;
var activity_entry_dao = require("sport_track_db").activity_entry_dao;

// page de connection
router.get("/", function (req, res) {
  if(req.session.email){
    
    res.render("disconnect", { infoDisconnect: "déconnection réussi" });
  }else{
    res.redirect("/connect");
  }

});

module.exports = router;