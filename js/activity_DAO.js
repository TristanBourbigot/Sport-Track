var db = require('./sport-track-db/sqlite_connection');
var usr = require('./user_DAO');
var ActivityDAO = function(){

    this.insert = function(values, callback){

        var sql = "insert into Activity(name, description, date, distance, duration, user_id) values (?,?,?,?,?,?)";
        db.run(sql, values, callback);

    }

    this.update = function(key, values, callback){

        var sql = "UPDATE Activity SET name=?, description=?, date=?, distance=?, duration=?, user_id=? WHERE id=?";
        values.push(key);
        db.run(sql, values, callback);

    }

    this.delete = function(key, callback){
            
        var sql = "DELETE FROM Activity WHERE id=?";
        db.run(sql, key, callback);

    }
    
    this.findAll = function(callback){
            
        var sql = "SELECT * FROM Activity ORDER BY id";
        db.run(sql, callback);

    }

}
var dao = new ActivityDAO();
module.exports = dao;