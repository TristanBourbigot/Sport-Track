var express = require("express");
var router = express.Router();

// page de connection
router.get("/", function (req, res) {
  if(req.session.email){
    req.session.destroy();
    res.render("disconnect", { infoDisconnect: "déconnection réussi" });
  }else{
    res.redirect("/connect");
  }

});

module.exports = router;