var user =  require('./user_DAO');
// var db = require('./sport_track_db');


var value = ["Tristan","Bourbigot","22-04-2003","Homme","180","80","tristanbourbigot@gmail.com","Test12345"];




user.findAll((err, rows) => {
    
    if (err) {
      console.log(err);
    }
    // selection avant insertion
    var res1=rows.length;

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
            var res2=rows.length;

            if(res2>res1){
                console.log("Insertion réussie");
            }else{
                console.log("Insertion échouée");
            }

            
            var valueUpdate = ["Bourbigot","Tristan","22-04-2003","Homme","182","120","bourbigottristan@gmail.com","Test12345"];
            // visualisation de la dernière donnée avant update
            user.findByKey(idLastRow, (err, row) => {
                if (err) {
                  console.log(err);
                }
                console.log("Pre Update :\n");
                console.log(row);
                // update de la dernière donnée
                user.update(idLastRow, valueUpdate, function(err, row){
                    if(err){
                        console.log(err);
                    }

                    //visualisation de la dernière donnée après update
                    user.findByKey(idLastRow, (err, row) => {
                        if(err){
                            console.log(err);
                        }
                        console.log("Post Update :\n");
                        console.log(row);
                        user.delete(idLastRow, function(err, rows){
                            if(err){
                                console.log(err);
                            }
                            user.findAll((err, rows) => {
                                if(rows.length==res1) console.log("Delete last user : OK");
                                else console.log("Delete last user : ERROR");
                                
                            });
                        });
                    });
                });
            });
        });
    });
});