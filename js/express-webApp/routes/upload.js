var express = require("express");
var router = express.Router();
var fileUpload = require('express-fileupload');
var user_dao = require('sport_track_db').user_dao;
var activity_dao = require('sport_track_db').activity_dao;
var activity_entry_dao = require('sport_track_db').activity_entry_dao;

router.use(fileUpload({}));

router.get('/', function(req, res) {
    if(req.session.email) {
        res.render('upload', { title: 'Upload' });
    } else {
        res.redirect('/connect');
    }
});

router.post('/', function(req, res) {
    var mailUser = req.session.email;

    user_dao.findByEmail(mailUser, function(err, rows) {

        if(err != null){

            console.log("ERROR= " +err);

        }else {

            var idUser = rows[0].id;

        }

    });

    try {

        if(!req.files) {

            console.log("No files were uploaded.");



        } else {

            //Use the name of the input field (i.e. "avatar") to retrieve the uploaded file
            let activities = req.files.data;

            console.log(activities);
        
        }
    } catch (err) {
        console.log(err);
        res.status(500).send(err);
    }
});

module.exports = router;
