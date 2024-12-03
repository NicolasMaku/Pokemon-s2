-- CREATE DATABASE ETU002445;
-- USE ETU002445;

-- table pour gerer l'utilisateur
CREATE TABLE user(
    id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nom_user VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    genre CHAR(1) NOT NULL,
    mail VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(100) NOT NULL

) ENGINE = innodb;
ALTER TABLE user ADD CONSTRAINT CHECK(YEAR(date_naissance) - YEAR(GETDATE()) >= 12);

-- table pour gerer l'info de l'admin
CREATE TABLE admin(
    id_admin INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Nom_admin VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    genre CHAR(1) NOT NULL,
    mail VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(100) NOT NULL

)ENGINE = innodb;

-- table qui contient les serie(categorie) de carte pokemon
CREATE TABLE serie_carte_pokemon(
    id_serie INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    Nom_serie VARCHAR(100) NOT NULL UNIQUE,
    nom_image VARCHAR(100)

)ENGINE = innodb;

CREATE TABLE serie_carte_pokemon_supprime(
    id_serie INTEGER NOT NULL,
    date_delete DATE
)ENGINE = innodb;

ALTER TABLE serie_carte_pokemon_supprime ADD FOREIGN KEY(id_serie) REFERENCES serie_carte_pokemon(id_serie);

-- table pour les cartes pokemon
CREATE TABLE carte_pokemon(
    id_carte INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    Nom_pokemon VARCHAR(100) NOT NULL,
    prix DECIMAL(19,2) DEFAULT 0,
    nom_image_pokemon VARCHAR(100),
    id_serie INTEGER NOT NULL

)ENGINE = innodb;

ALTER TABLE carte_pokemon ADD FOREIGN KEY(id_serie) REFERENCES serie_carte_pokemon(id_serie);
ALTER TABLE carte_pokemon ADD CONSTRAINT CHECK(prix >= 0);

-- table pour les carte pokemon supprime
CREATE TABLE carte_pokemon_supprime(
    id_carte INTEGER NOT NULL,
    date_delete DATE
) ENGINE = innodb;
ALTER TABLE serie_carte_pokemon_supprime ADD FOREIGN KEY(id_serie) REFERENCES serie_carte_pokemon(id_serie);


-- table pour le stock des cartes pokemon
CREATE TABLE liste_stock_cartes(
    id_stock INTEGER NOT NULL  PRIMARY KEY AUTO_INCREMENT,
    id_carte INTEGER NOT NULL,
    quantite INTEGER DEFAULT 0,
    date_ajout DATE

) ENGINE = innodb;
ALTER TABLE liste_stock_cartes ADD FOREIGN KEY(id_carte) REFERENCES carte_pokemon(id_carte);


-- table de Carte pokemon associé à chaque user
CREATE TABLE user_liste_cartes(
    id_carte INTEGER NOT NULL,
    id_user INTEGER NOT NULL,
    quantite INTEGER NOT NULL DEFAULT 0,
    date_obtention DATE NOT NULL

) ENGINE = innodb;

ALTER TABLE user_liste_cartes ADD FOREIGN KEY(id_user) REFERENCES user(id_user);
ALTER TABLE user_liste_cartes ADD FOREIGN KEY(id_carte) REFERENCES carte_pokemon(id_carte);

-- vue pour joindre la table carte pokemon et la table serie de carte pokemon
CREATE OR REPLACE VIEW v_carte AS 
SELECT id_user, Nom_pokemon, prix, nom_image_pokemon, carte_pokemon.id_serie AS cp_id_serie,quantite, date_obtention 
FROM user_liste_cartes JOIN carte_pokemon ON user_liste_cartes.id_carte = carte_pokemon.id_carte;

-- vue pour le motant total de pokemon par user
CREATE OR REPLACE VIEW v_prix_carte AS
SELECT (prix * quantite),id_user FROM v_user_carte;

-- vue pour joindre la table user, carte pokemon et la table serie de carte pokemon
CREATE OR REPLACE VIEW v_serie AS 
SELECT id_user, Nom_pokemon, prix, nom_image_pokemon,cp_id_serie,Nom_serie,nom_image, quantite, date_obtention 
FROM v_carte JOIN serie_carte_pokemon ON cp_id_serie = serie_carte_pokemon.id_serie;

-- porte monnaie associe à chaque user
CREATE TABLE porte_monnaie(
    id_user INTEGER NOT NULL,
    montant DECIMAL(19,2) DEFAULT 0,
    date_demande DATE,
    date_acceptation DATE

) ENGINE = innodb;

-- ALTER TABLE porte_monnaie ADD CONSTRAINT CHECK(montant >= 0);


-- liste des cartes pokemon à vendre sur la page back office
CREATE TABLE carte_a_vendre_backOffice(
    id_carte INTEGER NOT NULL,
    id_serie INTEGER NOT NULL,
    id_acheteur INTEGER,
    prix DECIMAL(19,2) DEFAULT 0
) ENGINE = innodb;

ALTER TABLE carte_a_vendre_backOffice ADD FOREIGN KEY(id_serie) REFERENCES serie_carte_pokemon(id_serie);
ALTER TABLE carte_a_vendre_backOffice ADD FOREIGN KEY(id_carte) REFERENCES carte_pokemon(id_carte);
ALTER TABLE carte_a_vendre_backOffice ADD FOREIGN KEY(id_acheteur) REFERENCES user(id_user);
ALTER TABLE carte_a_vendre_backOffice ADD CONSTRAINT CHECK(prix >= 0);

-- liste des cartes pokemon à vendre par user
CREATE TABLE carte_a_vendre_user(
    num_vendre INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_carte INTEGER NOT NULL,
    id_vendeur INTEGER NOT NULL,
    id_acheteur INTEGER NOT NULL,
    date_nahalafosana DATE,
    prix_unitaire DECIMAL(19,2) DEFAULT 0,
    qte_a_vendre SMALLINT NOT NULL,
    qte_vendu SMALLINT DEFAULT 0

) ENGINE = innodb;

ALTER TABLE carte_a_vendre_user ADD FOREIGN KEY(id_vendeur) REFERENCES user(id_user);
ALTER TABLE carte_a_vendre_user ADD FOREIGN KEY(id_acheteur) REFERENCES user(id_user);
ALTER TABLE carte_a_vendre_user ADD CONSTRAINT CHECK(prix_unitaire >= 0);
-- ALTER TABLE carte_a_vendre_user ADD CONSTRAINT CHECK(qte_vendu >= 0 AND qte_vendu <= qte_a_vendre);
