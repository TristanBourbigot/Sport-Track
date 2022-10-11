var user = require('./user_DAO');
var activity = require('./activity_DAO')
var value = ["Tristan", "Bourbigot", "22-04-2003", "Homme", "180", "80", "tristanbourbigot@gmail.com", "Test12345"]
user.insert(value, null);
var valueAct = ["Course", "Course à pied", "22-04-2020", "10", "00:30:00", "1"]


activity.findAll((err, rows) => {
    
    if (err) {
      console.log(err);
    }
    // selection avant insertion
    var res1=rows.length;

    activity.insert(value, function(err, rows){
        if(err){
            console.log(err);
        }
        activity.findAll((err, rows) => {
            if (err) {
              console.log(err);
            }
            // selection de la dernière donnée
            var idLastRow = rows[rows.length-1].id;
            var res2=rows.length;

            if(res2>res1){
                console.log("Insertion réussie");
            }else{
                console.log("Insertion échouée");
            }

            
            var valueUpdate = ["Course à pied", "Course", "22-04-2020", "10", "00:35:00", "1"];
            // visualisation de la dernière donnée avant update
            activity.findByKey(idLastRow, (err, row) => {
                if (err) {
                  console.log(err);
                }
                console.log("Pre Update :\n");
                console.log(row);
                // update de la dernière donnée
                activity.update(idLastRow, valueUpdate, function(err, row){
                    if(err){
                        console.log(err);
                    }

                    //visualisation de la dernière donnée après update
                    activity.findByKey(idLastRow, (err, row) => {
                        if(err){
                            console.log(err);
                        }
                        console.log("Post Update :\n");
                        console.log(row);
                        activity.delete(idLastRow, function(err, rows){
                            if(err){
                                console.log(err);
                            }
                            activity.findAll((err, rows) => {
                                if(rows.length==res1) console.log("Delete last activity : OK");
                                else console.log("Delete last activity : ERROR");
                                
                            });
                        });
                    });
                });
            });
        });
    });
});
