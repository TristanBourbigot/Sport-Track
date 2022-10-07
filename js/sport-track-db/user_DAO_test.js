var user =  require('./user_DAO');
var db = require('./sport-track-db/sqlite_connection');


var value = ["Tristan","Bourbigot","22-04-2003","Homme","180","80","tristanbourbigot@gmail.com","Test12345"]


user.insert(value, function(err, rows){
    if(err){
        console.log(err);
    }else{
        console.log(rows);
    }
});



db.close();