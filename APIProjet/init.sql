CREATE TABLE appartement (
    idAppartement serial PRIMARY KEY,
    nom varchar(40),
    capacite integer,
    adresse varchar(100),
    dispo boolean,
    prix integer,
    description varchar(255)
);

CREATE TABLE reservation (
    idReservation serial PRIMARY KEY,
    dateDebut timestamp,
    dateFin timestamp,
    allPrix integer
);

CREATE TABLE client (
    idClient serial PRIMARY KEY,
    nom varchar(20),
    prenom varchar(30),
    age integer,
    email varchar(50),
    role boolean
);
