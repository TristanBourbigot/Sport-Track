var db_connection = require('./sqlite_connection');
var user_dao = require('./user_DAO');
var activity_dao = require('./activity_DAO');
var activity_entry_dao = require('./activity_entry_DAO');

module.exports = {db: db_connection, user_dao: user_dao};