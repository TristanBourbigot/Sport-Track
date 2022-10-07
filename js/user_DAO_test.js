var user =  require('./user_DAO');
var sqlite_connection = require('./sport-track-db/sqlite_connection');

var PDO = new sqlite_connection();

var varlue = ["Tristan","Bourbigot","22-04-2003","Homme","180","80","tristanbourbigot@gmail.com","Test12345"]

var sql = "SELECT * FROM User WHERE id=?";
db.run(sql, key, callback1);

var res1 = callback1.length;

user.insert(varlue, callback2);

var res2 = callback2.length;

if(res1 < res2){
    console.log("Test réussi");
}else{
    console.log("Test échoué");
}


db.close();