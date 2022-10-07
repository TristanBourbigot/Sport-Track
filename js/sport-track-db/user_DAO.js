var db = require('./sqlite_connection');
var UserDAO = function(){

    this.insert = function(values, callback){
        var sql = "insert into User(name, first_name, birthdate, gender, height, weight, email, password) values (?,?,?,?,?,?,?,?)";
        db.run(sql, values, callback);
    };

    this.update = function(key, values, callback){
        var sql = "UPDATE User SET name=?, first_name=?, birthdate=?, gender=?, height=?, weight=?, email=?, password=? WHERE id=?";
        values.push(key);
        db.run(sql, values, callback);
    };

    this.delete = function(key, callback){
        var sql = "DELETE FROM User WHERE id=?";
        db.run(sql, key, callback);
    };

    this.findAll = function(callback){
        var sql = "SELECT * FROM User ORDER BY id";
        db.all(sql,[], callback);
    };

    this.findByKey = function(key, callback){
        var sql = "SELECT * FROM User WHERE id=?";
        db.all(sql, key, callback);
    };
};
var dao = new UserDAO();
module.exports = dao;