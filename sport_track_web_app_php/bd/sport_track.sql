BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "User" (
	"id"	INTEGER,
	"name"	TEXT NOT NULL,
	"first_name"	TEXT NOT NULL,
	"birthdate"	DATE NOT NULL,
	"gender"	TEXT NOT NULL CHECK(UPPER("gender") = "HOMME" OR UPPER("gender") = "FEMME" OR UPPER("gender") = "AUTRE"),
	"height"	INTEGER NOT NULL CHECK("height" >= 30 AND "height" <= 300),
	"weight"	INTEGER NOT NULL CHECK("weight" >= 6 AND "weight" <= 700),
	"email"	TEXT NOT NULL CHECK("email" LIKE '%@%.%'),
	"password"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Activity" (
	"idActivity"	INTEGER,
	"theUser"	INTEGER NOT NULL,
	"description"	TEXT NOT NULL,
	"date"	DATE NOT NULL,
	FOREIGN KEY("theUser") REFERENCES "User"("id"),
	PRIMARY KEY("idActivity" AUTOINCREMENT)
);
CREATE TABLE IF NOT EXISTS "Data" (
	"idData"	INTEGER,
	"theActivity"	INTEGER,
	"hour"	TIME NOT NULL,
	"cardioFrequency"	INTEGER NOT NULL CHECK("cardioFrequency" > 0 AND "cardioFrequency" < 240),
	"lattitude"	REAL NOT NULL,
	"longitude"	REAL NOT NULL,
	"altitude"	REAL NOT NULL,
	FOREIGN KEY("theActivity") REFERENCES "Activity"("idActivity"),
	PRIMARY KEY("idData" AUTOINCREMENT)
);
COMMIT;
