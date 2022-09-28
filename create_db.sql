/**

Schéma relationnelle :

User {
    email (1),
    mdp (nn),
    nom (nn),
    prenom (nn),
    dateDeNaissaince (nn),
    sexe (nn),
    taille ,
    poids
}

Activite{
    idActivite(1),
    description(nn),
    date(nn)
    @lUtilisateur REF User(email)
}

Donne{
    idDonne(1),
    distance,
    dure,
    debut,
    cardioMin,
    cardioMax,
    cardioMoy,
    @lActivite REF Activite(idActivite) (nn)
}
*/

DROP TABLE Donne;

DROP TABLE Activite;

DROP TABLE User;

CREATE TABLE User(
    email VARCHAR2(50)
        CONSTRAINT pk_User PRIMARY KEY,
    mdp VARCHAR2(16)
        CONSTRAINT nn_mdp NOT NULL,
    nom VARCHAR2(40)
        CONSTRAINT nn_nom NOT NULL,
    prenom VARCHAR2(40)
        CONSTRAINT nn_prenom NOT NULL,
    dateDeNaissaince DATE
        CONSTRAINT nn_dateDeNaissaince NOT NULL,
    sexe VARCHAR2(1)
        CONSTRAINT nn_sexe NOT NULL
        CONSTRAINT dom_sexe CHECK (sexe in ('H','F')),
    taille INTEGER,
    poids INTEGER

);

CREATE TABLE Activite(
    idActivite INTEGER
        CONSTRAINT pk_Activite PRIMARY KEY AUTOINCREMENT,
    description VARCHAR2(240)
        CONSTRAINT nn_description NOT NULL,
    date Date
        CONSTRAINT nn_date NOT NULL,
    lUtilisateur VARCHAR2(50)
        CONSTRAINT fk_Activite_User REFERENCES User(email)
);


CREATE TABLE Donne(
    idDonne INTEGER
        CONSTRAINT pk_Donne PRIMARY KEY AUTOINCREMENT,
    distance DECIMAL(18,8),
    dure INTEGER,
    debut TIME,
    cardioMin INTEGER,
    cardioMax INTEGER,
    cardioMoy INTEGER,
    lActivite INTEGER
        CONSTRAINT fk_Activite_Donne REFERENCES Activite(idActivite)
        CONSTRAINT nn_lActivite NOT NULL
        
);