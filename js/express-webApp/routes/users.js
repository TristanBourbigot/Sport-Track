var express = require('express');
var router = express.Router();
var user_dao = require('sport_track_db').user_dao;
router.get('/', function(req, res, next) {
    user_dao.findAll(function(err, rows) {
        if(err != null){
            console.log("ERROR= " +err);
        }else {
            res.render('users', {data:rows});
        }
    });
});

router.post('/', function(req, res, next) {
    var user = [
        req.body.nom,
        req.body.prenom,
        req.body.dateN,
        req.body.sexe,
        req.body.taille,
        req.body.poids,
        req.body.email,
        req.body.mdp
    ];

    console.log(user);
    user_dao.findAll(function(err, rows) {
        if(err != null){
            console.log("ERROR= " +err);
        }else {
            var exist = false;
            for(var i = 0; i < rows.length; i++){
                if(rows[i].email == user[6]){
                    exist = true;
                }
            }
        }if(!exist){
                user_dao.insert(user, function(err, rows) {
                    if(err != null){
                        console.log("ERROR= " +err);
                    }else {
                        res.render('usersCreate', {infoCreate:"Utilisateur créé"});
                    }
                });

            }else{
                res.render('usersCreate', {infoCreate:"Mail déjà utilisé"});
            }
          
        });
   
});


module.exports = router;