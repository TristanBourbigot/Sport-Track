var express = require("express");
var user_dao = require("sport_track_db").user_dao;
var router = express.Router();

// page de connection
router.get("/", function (req, res) {

  res.render("connect", { title: "Connexion" });

});


// page de validation de la connection
router.post("/", function (req, res) {
  var email = req.body.email;
  var mdp = req.body.password;
  user_dao.findByEmail(email, function (err, rows) {
    if (err != null) {
      console.log("ERROR= " + err);
    }
    console.log("rows= " + rows[0].password);
    if (rows.length == 0 && rows[0].password == mdp) {
      res.render("connectValid", { infoConnect: "Email incorrect" });
    } else {
      req.session.email = email;
      console.log("email= " + req.session.email);
      res.render("connectValid", { infoConnect: "Connexion réussie" });
    }
  });
});

module.exports = router;