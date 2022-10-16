var express = require("express");
var user_dao = require("sport_track_db").user_dao;
var router = express.Router();

router.get("/", function (req, res) {

  res.render("connect", { title: "Connexion" });

});

router.post("/", function (req, res, next) {

  var email = req.body.email;
    var mdp = req.body.mdp;

    user_dao.findByEmailPassword(email, mdp, function (err, rows) {

        nbRows = rows.length;

        if (nbRows == 1) {

          req.session.idUser = rows[0].idUser;
          res.redirect("/");

        } else {

          res.render(err);
        
        }

    });

});

router.get("/disconnect", function (req, res) {

  req.session.destroy();
  res.redirect("/");
  
});

module.exports = router;