var db = require('./sqlite_connection');
var usr = require('./user_DAO');
var ActivityDAO = function(){

    this.insert = function(values, callback){

        var sql = "insert into Activity(description, date, theUser) values (?,?,?)";
        db.run(sql, values, callback);

    }

    this.update = function(key, values, callback){

        var sql = "UPDATE Activity SET description=?, date=?, theUser=? WHERE idActivity=?";
        values.push(key);
        db.run(sql, values, callback);

    }

    this.delete = function(key, callback){
            
        var sql = "DELETE FROM Activity WHERE idActivity=?";
        db.run(sql, key, callback);

    }
    
    this.findAll = function(callback){
            
        var sql = "SELECT * FROM Activity ORDER BY idActivity";
        db.all(sql, callback);

    }

    this.findByKey = function(key, callback){

        var sql = "SELECT * FROM Activity WHERE idActivity=?";
        db.all(sql, key, callback);

    };

    this.findByUser = function(key, callback){

        var sql = "SELECT * FROM Activity WHERE theUser=?";
        db.all(sql, key, callback);

    };

}
var dao = new ActivityDAO();
module.exports = dao;