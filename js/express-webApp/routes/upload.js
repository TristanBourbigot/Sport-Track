var express = require('express');

var router = express.Router();
var user_dao = require('sport_track_db').user_dao;
var activity_dao = require('sport_track_db').activity_dao;
var activity_entry_dao = require('sport_track_db').activity_entry_dao;

router.post('/', function(req, res, next) {

    if(req.session.email){

        var mailUser = req.session.email;

        user_dao.findByEmail(mailUser, function(err, rows) {

            if(err != null){

                console.log("ERROR= " +err);

            }else {

                var idUser = rows[0].id;

            }

        });

        try {

            if(!req.body.activities) {

                res.send({

                    status: false,
                    message: 'No file uploaded'

                });

            } else {

                //Use the name of the input field (i.e. "avatar") to retrieve the uploaded file
                let activities = req.files.activities;
                
                //Use the mv() method to place the file in the upload directory (i.e. "uploads")
                activities.mv('./uploads/' + activities.name);
    
                //send response
                res.send({

                    status: true,
                    message: 'File is uploaded',

                    data: {

                        name: activities.name,
                        mimetype: activities.mimetype,
                        size: activities.size

                    }
                });
            }
        } catch (err) {
            res.status(500).send(err);
        }

    

    }else{

        res.redirect('/connect');

    }

});

router.get('/', function(req, res, next) {

    if(req.session.email){

        var mailUser = req.session.email;

        user_dao.findByEmail(mailUser, function(err, rows) {

            if (err != null) {
        
                console.log("ERROR= " + err);
        
            } else {   
        
                var idUser = rows[0].id;
                
                activity_dao.findByUser(idUser, function(err, rows) {

                    if(err != null){

                        console.log("ERROR= " +err);

                    }else {

                        res.render('upload', {data:rows});
                    }

                });
        
            }
            
        });

    }

});

module.exports = router;
