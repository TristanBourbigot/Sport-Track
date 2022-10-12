var user = require('./user_DAO');
var activity = require('./activity_DAO');
var activity_entry = require('./activity_entry_DAO');
var value = ["Tristan", "Bourbigot", "22-04-2003", "Homme", "180", "80", "tristanbourbigot@gmail.com", "Test12345"];

user.insert(value, function(err, rows){
    if(err){
        console.log(err);
    }
    user.findAll((err, rows) => {
        if (err) {
          console.log(err);
        }
        // selection de la dernière donnée
        var idLastRow = rows[rows.length-1].id;
        var valueAct = ["Course", "Course à pied", "22-04-2020", "10", "00:30:00", ""+idLastRow];
        activity.insert(valueAct, function(err, rows){
            if(err){
                console.log(err);
            }
            activity.findAll((err, rows) => {
                if(err){
                    console.log(err);
                }
                // selection de la dernière donnée
                var idLastRowAct = rows[rows.length-1].id;
                var valueActEnt = [idLastRowAct,"21:02:00","102",]

