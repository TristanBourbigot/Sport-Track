const sqlite3 = require('sqlite3').verbose();
class sqlite_connection{

    constructor(){
        

        this.db = new sqlite3.Database('./db/sport_track.db', (err) => {

            if (err) {

              console.error(err.message);

            }else{

                console.log('Connected to the Sport Track database.');

            }
            
        });

    }

    getConnection(){

        return this.db;

    }
    
}
var db = new sqlite_connection();
module.exports = db.getConnection();