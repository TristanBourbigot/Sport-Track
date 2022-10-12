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
                var valueActEnt = [idLastRowAct,"21:02:00","102",47.644795,2.776605,18];
                activity_entry.findAll(function(err, rows){
                    if(err){
                        console.log(err);
                    }
                    var res1=rows.length;
                    activity_entry.insert(valueActEnt, function(err, rows){
                        if(err){
                            console.log(err);
                        }
                        activity_entry.findAll(function(err, rows){
                            if(err){
                                console.log(err);
                            }
                            var res2=rows.length;
                            if(res2>res1){
                                console.log("Insertion réussie");
                            }else{
                                console.log("Insertion échouée");
                            }
                            var valueActEntUpdate = [idLastRowAct,"22:05:00","172",48.644795,5.776605,8];
                            activity_entry.findByKey(idLastRowAct, function(err, row){
                                if(err){
                                    console.log(err);
                                }
                                console.log("Pre Update :\n");
                                console.log(row);
                                activity_entry.update(idLastRowAct, valueActEntUpdate, function(err, row){
                                    if(err){
                                        console.log(err);
                                    }
                                    activity_entry.findByKey(idLastRowAct, function(err, row){
                                        if(err){
                                            console.log(err);
                                        }
                                        console.log("Post Update :\n");
                                        console.log(row);
                                        activity_entry.delete(idLastRowAct, function(err, rows){
                                            if(err){
                                                console.log(err);
                                            }
                                            activity_entry.findAll(function(err, rows){
                                                if(err){
                                                    console.log(err);
                                                }
                                                var res3=rows.length;
                                                if(res3<res2){
                                                    console.log("Suppression réussie");
                                                }else{
                                                    console.log("Suppression échouée");
                                                }
                                            });
                                        });
                                    });
                                });
                            });
                        });
                    });
                });
            });
        });
    });
});

