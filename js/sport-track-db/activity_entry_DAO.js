var db = require('./sqlite_connection');
var ActivityEntryDAO  = function(){

    this.insert = function(values, callback){
        var sql = "insert into Data(theActivity, hour,cardioFrequency,lattitude,longitude,altitude) values (?,?,?,?,?,?)";
        db.run(sql, values, callback);
    };

    this.update = function(key, values, callback){
        var sql = "UPDATE Data SET theActivity=?, hour=?, cardioFrequency=?, lattitude=?, longitude=?, altitude=? WHERE idDATA=?";
        values.push(key);
        db.run(sql, values, callback);
    };

    this.delete = function(key, callback){
        var sql = "DELETE FROM Data WHERE idData=?";
        db.run(sql, key, callback);
    };

    this.findAll = function(callback){
        var sql = "select * from Data order by idData";
        db.all(sql,[], callback);
    };

    this.findAllAndJoinActivity = function(callback){
        var sql = "SELECT idActivity, description, date, MIN(hour) minHour, (MAX(hour)-MIN(hour)) temps, MIN(cardioFrequency) minCardio, MAX(cardioFrequency) maxCardio, AVG(cardioFrequency) moyCardio FROM Data, Activity WHERE Data.theActivity = Activity.idActivity ORDER BY idActivity";
        db.all(sql,[], callback);
    }

    this.findAllAndJoinActivityDistance = function(callback){
        var sql = "SELECT idActivity,lattitude,longitude,altitude FROM Data, Activity WHERE Data.theActivity = Activity.idActivity ORDER BY idActivity,hour";
        db.all(sql,[], callback);
    }

    this.findByKey = function(key, callback){
        var sql = "SELECT * FROM Data WHERE idData=?";
        db.all(sql, key, callback);
    };
};
var dao = new ActivityEntryDAO();
module.exports = dao;