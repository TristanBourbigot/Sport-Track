var user = require('./user_DAO');
var activity = require('./activity_DAO')
var value = ["Tristan", "Bourbigot", "22-04-2003", "Homme", "180", "80", "tristanbourbigot@gmail.com", "Test12345"]

user.insert(value, function(err, rows){

    if(err){

        console.log(err);

    }else{

        user.findAll((err, rows) => {

            if(err){

                console.log(err);

            }else{

                var idLastRow = rows[rows.length-1].id;
                var valueActivity = ["Course", "2020-04-22", idLastRow];

                activity.findAll((err, rows) => {
                   
                    if(err){

                        console.log(err);

                    }else{

                        var res1 = rows.length;

                        activity.insert(valueActivity, (err, rows) => {

                            if(err){

                                console.log(err);

                            }else{

                                activity.findAll((err, rows) => {

                                    if(err){

                                        console.log(err);

                                    }else{

                                        var res2 = rows.length;

                                        if(res2>res1){

                                            console.log("Insertion réussie");
                                            console.log("Pre-Update :\n");

                                            var idLastRowActivity = rows[rows.length-1].idActivity;
                                            var lastRowIndex = rows.length-1;

                                            console.log(rows[lastRowIndex]);

                                            var valueUpdate = ["IUT-RU", "2020-04-22", idLastRow];

                                            activity.update(rows[lastRowIndex].idActivity, valueUpdate, (err, rows) => {

                                                if(err){

                                                    console.log(err);

                                                }else{

                                                    console.log("Post-Update :\n");

                                                    activity.findByKey(idLastRowActivity, (err, rows) => {

                                                        if(err){

                                                            console.log(err);

                                                        }else{

                                                            console.log(rows);

                                                            activity.delete(idLastRowActivity, (err, rows) => {

                                                                if(err){

                                                                    console.log(err);

                                                                }else{

                                                                    activity.findAll((err, rows) => {

                                                                        if(err){

                                                                            console.log(err);

                                                                        }else{

                                                                            var res3 = rows.length;

                                                                            if(res3 == res1){
        
                                                                                console.log("Suppression réussie");
        
                                                                            }else{
        
                                                                                console.log("Suppression échouée");
        
                                                                            }

                                                                        }
                                                                    
                                                                    });

                                                                }

                                                            });

                                                        }

                                                    });

                                                }


                                            });


                                        }else{

                                            console.log("Insertion échouée");

                                        }

                                    }

                                });

                            }

                        });

                    }

                    
                });

            }
            
        });

    }

});

