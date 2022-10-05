import { DataBase } from "sqlite3";

class sqlite_connection{

    constructor(){

        this.db = new DataBase("sport-track.db");
        module.exports = this.db;

    }
    
}