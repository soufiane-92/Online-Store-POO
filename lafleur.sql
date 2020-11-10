CREATE TABLE ADMIN(
   IdAdmin SMALLINT,
   NomAdmin VARCHAR(25) NOT NULL,
   PassAdmin VARCHAR(15) NOT NULL,
   PRIMARY KEY(IdAdmin)
);

CREATE TABLE CATEGORIE(
   IdCat VARCHAR(3),
   Libelle VARCHAR(15) NOT NULL,
   PRIMARY KEY(IdCat)
);

CREATE TABLE CLIENT(
   IdClient SMALLINT,
   NomClient VARCHAR(25) NOT NULL,
   PrenomClient VARCHAR(25) NOT NULL,
   MailClient VARCHAR(30) NOT NULL,
   CpClient VARCHAR(5) NOT NULL,
   AdreseClient VARCHAR(35) NOT NULL,
   VilleClient VARCHAR(20) NOT NULL,
   PRIMARY KEY(IdClient)
);

CREATE TABLE PRODUIT(
   IdProduit SMALLINT,
   NomProduit VARCHAR(20) NOT NULL,
   ImageProduit VARCHAR(32),
   PrixProduit DECIMAL(15,2) NOT NULL,
   Description VARCHAR(50),
   IdCat VARCHAR(3) NOT NULL,
   PRIMARY KEY(IdProduit),
   FOREIGN KEY(IdCat) REFERENCES CATEGORIE(IdCat)
);

CREATE TABLE COMMANDE(
   IdCommande SMALLINT,
   DateCommande DATE NOT NULL,
   IdClient SMALLINT NOT NULL,
   PRIMARY KEY(IdCommande),
   FOREIGN KEY(IdClient) REFERENCES CLIENT(IdClient)
);

CREATE TABLE Panier(
   IdProduit SMALLINT,
   IdCommande SMALLINT,
   PRIMARY KEY(IdProduit, IdCommande),
   FOREIGN KEY(IdProduit) REFERENCES PRODUIT(IdProduit),
   FOREIGN KEY(IdCommande) REFERENCES COMMANDE(IdCommande)
);