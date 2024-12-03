INSERT INTO admin VALUES(null,'Rojo','1989-01-01','m','rojo@gmail.com',sha1('rojo'));
INSERT INTO user VALUES(null,'Tsinjo','1993-01-01','m','tsinjo@gmail.com',sha1('tsinjo'));

INSERT INTO user VALUES(null,'Kevin','2003-01-01','m','kevin@gmail.com',sha1('kevin'));
INSERT INTO user VALUES(null,'Tahina','2002-06-02','m','tahina@gmail.com',sha1('tahina'));
INSERT INTO user VALUES(null,'Nicolas','2003-05-11','m','nicolas@gmail.com',sha1('nicolas'));
INSERT INTO user VALUES(null,'Rojo','1989-01-01','m','rojo@gmail.com',sha1('rojo'));
INSERT INTO user VALUES(null,'Tsinjo','1993-01-01','m','tsinjo@gmail.com',sha1('tsinjo'));

INSERT INTO serie_carte_pokemon VALUES(null,'celebration','CEL.png');
INSERT INTO serie_carte_pokemon VALUES(null,'zenSup','CRZ.png');
INSERT INTO serie_carte_pokemon VALUES(null,'evoCeleste','EVS.png');
INSERT INTO serie_carte_pokemon VALUES(null,'originePerdue','LOR.png');
INSERT INTO serie_carte_pokemon VALUES(null,'paldea','PAL.png');
INSERT INTO serie_carte_pokemon VALUES(null,'tempeteArgente','SIT.png');


INSERT INTO carte_pokemon VALUES(null,'bulBizarre',120,'15.jpg',1);
INSERT INTO carte_pokemon VALUES(null,'Herbizarre',110,'6.jpg',1);
INSERT INTO carte_pokemon VALUES(null,'Florizarre',100,'20.jpg',1);
INSERT INTO carte_pokemon VALUES(null,'Mega-Florizarre',110,'4.jpg',1);
INSERT INTO carte_pokemon VALUES(null,'Salamèche',120,'4.jpg',1);
INSERT INTO carte_pokemon VALUES(null,'Reptincel',130,'4.jpg',2);
INSERT INTO carte_pokemon VALUES(null,'Dracaufeu',140,'4.jpg',2);
INSERT INTO carte_pokemon VALUES(null,'Mega-Dracaufeu X',150,'4.jpg',2);
INSERT INTO carte_pokemon VALUES(null,'Mega-Dracaufeu Y',10,'4.jpg',2);
INSERT INTO carte_pokemon VALUES(null,'Carapuce',12,'4.jpg',3);
INSERT INTO carte_pokemon VALUES(null,'Carabaffe',121,'4.jpg',3);
INSERT INTO carte_pokemon VALUES(null,'Tortank',122,'4.jpg',3);
INSERT INTO carte_pokemon VALUES(null,'Méga-Tortank',111,'4.jpg',3);
INSERT INTO carte_pokemon VALUES(null,'Chenipan',123,'4.jpg',3);
INSERT INTO carte_pokemon VALUES(null,'Chrysacier',111,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Papilusion',123,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Aspicot',122,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Coconfort',220,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Dardargnan',121,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Méga-Dardargnan',124,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Roucool',125,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Roucarnage',126,'4.jpg',4);
INSERT INTO carte_pokemon VALUES(null,'Méga-Roucarnage',128,'4.jpg',5);
INSERT INTO carte_pokemon VALUES(null,'bulBizarre',129,'4.jpg',5);
INSERT INTO carte_pokemon VALUES(null,'Rattata',130,'4.jpg',5);
INSERT INTO carte_pokemon VALUES(null,'Rattatac',131,'4.jpg',5);
INSERT INTO carte_pokemon VALUES(null,'Piafabec',130,'4.jpg',5);
INSERT INTO carte_pokemon VALUES(null,'Papasdepic',120,'4.jpg',6);
INSERT INTO carte_pokemon VALUES(null,'Abo',120,'4.jpg',1);
INSERT INTO carte_pokemon VALUES(null,'Arbok',120,'4.jpg',6);


INSERT INTO liste_stock_cartes VALUES(null,1,3,CURRENT_DATE);
INSERT INTO liste_stock_cartes VALUES(null,3,1,CURRENT_DATE);
INSERT INTO liste_stock_cartes VALUES(null,5,2,CURRENT_DATE);
INSERT INTO liste_stock_cartes VALUES(null,9,1,CURRENT_DATE);

INSERT INTO user_liste_cartes VALUES(1,3,2,CURRENT_DATE);
INSERT INTO user_liste_cartes VALUES(3,1,4,CURRENT_DATE);
INSERT INTO user_liste_cartes VALUES(5,2,3,CURRENT_DATE);
INSERT INTO user_liste_cartes VALUES(2,1,1,CURRENT_DATE);
INSERT INTO user_liste_cartes VALUES(4,1,1,CURRENT_DATE);
INSERT INTO user_liste_cartes VALUES(1,4,1,CURRENT_DATE);

INSERT INTO porte_monnaie VALUES(3,2000,NOW(),NOW());