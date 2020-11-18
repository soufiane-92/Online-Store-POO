CREATE TABLE IF NOT EXISTS client_status (
   id int NOT NULL AUTO_INCREMENT,
   nom VARCHAR(25) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS CATEGORIE(
   id VARCHAR(3),
   libelle VARCHAR(15) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS CLIENT(
   id int NOT NULL AUTO_INCREMENT,
   nom VARCHAR(100) NOT NULL,
   prenom VARCHAR(100) NOT NULL,
   email VARCHAR(200) NOT NULL,
   password VARCHAR(200) NOT NULL,
   codePostal VARCHAR(10) NULL,
   adresse VARCHAR(200) NULL,
   ville VARCHAR(200) NULL,
   status INT DEFAULT 1 NOT NULL, 
   created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
   updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
   PRIMARY KEY(id),
   FOREIGN KEY(status) REFERENCES client_status(id)
);

CREATE TABLE IF NOT EXISTS PRODUIT(
   id CHAR (32) NOT NULL,
   description VARCHAR(250),
   nom VARCHAR(20) NOT NULL,
   prix DECIMAL(15,2) NOT NULL,
   imageUrl VARCHAR(32),
   idCategorie VARCHAR(3) NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idCategorie) REFERENCES CATEGORIE(id)
);

CREATE TABLE IF NOT EXISTS COMMANDE(
   id int NOT NULL AUTO_INCREMENT,
   dateCommande DATE NOT NULL,
   idClient INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idClient) REFERENCES CLIENT(id)
);

CREATE TABLE IF NOT EXISTS Panier(
   idProduit CHAR (32) NOT NULL,
   idCommande INT NOT NULL,
   quantite INT NOT NULL,
   PRIMARY KEY(idProduit, idCommande),
   FOREIGN KEY(idProduit) REFERENCES PRODUIT(id),
   FOREIGN KEY(idCommande) REFERENCES COMMANDE(id)
);

# -----------------------------------------------------------------------------
#       CREATION DES LIGNES DES TABLES
# -----------------------------------------------------------------------------
INSERT INTO categorie VALUES ('fle','Fleurs');
INSERT INTO categorie VALUES ('pla','Plantes');
INSERT INTO categorie VALUES ('com','Composition');

INSERT INTO produit VALUES ('f01','Bouquet de roses multicolores', 'comores',58,'images/fleurs/comores.gif','fle');
INSERT INTO produit VALUES ('f02','Bouquet de roses rouges', 'grenadines', 50,'images/fleurs/grenadines.gif','fle');
INSERT INTO produit VALUES ('f03','Bouquet de roses jaunes', 'mariejaune',78,'images/fleurs/mariejaune.gif','fle');
INSERT INTO produit VALUES ('f04','Bouquet de petites roses jaunes', 'mayotte',48,'images/fleurs/mayotte.gif','fle');
INSERT INTO produit VALUES ('f05','Fuseau de roses multicolores','philippines',63,'images/fleurs/philippines.gif','fle');
INSERT INTO produit VALUES ('f06','Petit bouquet de roses roses', 'pakopoka', 43,'images/fleurs/pakopoka.gif','fle');
INSERT INTO produit VALUES ('f07','Panier de roses multicolores', 'seychelles',78,'images/fleurs/seychelles.gif','fle');

INSERT INTO produit VALUES ('c01','Panier de fleurs variées', 'aniwa',53,'images/compo/aniwa.gif','com');
INSERT INTO produit VALUES ('c02','Coup de charme jaune', 'kos',38,'images/compo/kos.gif','com');
INSERT INTO produit VALUES ('c03','Bel arrangement de fleurs de saison', 'loth',68,'images/compo/loth.gif','com');
INSERT INTO produit VALUES ('c04','Coup de charme vert','luzon',41,'images/compo/luzon.gif','com');
INSERT INTO produit VALUES ('c05','Très beau panier de fleurs précieuses','makin',98,'images/compo/makin.gif','com');
INSERT INTO produit VALUES ('c06','Bel assemblage de fleurs précieuses', 'mosso',68,'images/compo/mosso.gif','com');
INSERT INTO produit VALUES ('c07','Présentation prestigieuse','rawaki',128,'images/compo/rawaki.gif','com');

INSERT INTO produit VALUES ('p01','Plante fleurie', 'antharium',43,'images/plantes/antharium.gif','pla');
INSERT INTO produit VALUES ('p02','Pot de phalaonopsis','galante',58,'images/plantes/galante.gif','pla');
INSERT INTO produit VALUES ('p03','Assemblage paysagé', 'lifou',103,'images/plantes/lifou.gif','pla');
INSERT INTO produit VALUES ('p04','Belle coupe de plantes blanches', 'losloque',128,'images/plantes/losloque.gif','pla');
INSERT INTO produit VALUES ('p05','Pot de mitonia mauve','papouasi',83,'images/plantes/papouasi.gif','pla');
INSERT INTO produit VALUES ('p06','Pot de phalaonopsis blanc','pionosa',58,'images/plantes/pionosa.gif','pla');
INSERT INTO produit VALUES ('p07','Pot de phalaonopsis rose mauve','sabana',58,'images/plantes/sabana.gif','pla');

INSERT INTO `client_status`(`nom`) VALUES ('client');
INSERT INTO `client_status`(`nom`) VALUES ('admin');

INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Marjory', 'Burberow', 'mburberow0@creativecommons.org', '9JnJeZ7z', '75005', '70211 Barby Lane', 'Wedoro');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Jarrid', 'Wight', 'jwight1@zdnet.com', 'xVCk9GXZ1uj', '75005', '38 Maple Wood Pass', 'Varadero');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Daphna', 'Freund', 'dfreund2@fda.gov', '8qPtstNL5HU5', '216282', '2096 Graedel Way', 'Ovsyanka');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Benito', 'Tingey', 'btingey3@kickstarter.com', 'P3qrK2JSGC3t', '5400-006', '0 Knutson Drive', 'Chaves');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Minnnie', 'Pilmore', 'mpilmore4@earthlink.net', '4elUxIYo9w', '09700-000', '634 Hayes Parkway', 'São Bernardo do Campo');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Georgie', 'Cattemull', 'gcattemull5@nasa.gov', '24ozQ8WTbB', '4326', '7 Rockefeller Park', 'Herrera');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Isaac', 'Landa', 'ilanda6@xrea.com', 'b93wQSO', '75005', '685 Surrey Plaza', 'Dongxiao');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Chance', 'Mussetti', 'cmussetti7@ifeng.com', 'KQwUAYKsQuY1', '75005', '9534 Village Green Road', 'Buçimas');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Margarita', 'Sultan', 'msultan8@wisc.edu', 'LNMSpKCOK0f', '75005', '54 Monterey Court', 'Koanara');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`, `codePostal`, `adresse`, `ville`) VALUES ('Correna', 'Waldock', 'cwaldock9@berkeley.edu', 'yfIIF4JdBa', '671 65', '1 Sutteridge Terrace', 'Čejkovice');
INSERT INTO `client` (`nom`, `prenom`, `email`, `password`) VALUES ('chalda', 'block', 'super@berkeley.edu', '4455ddddd');

INSERT INTO `commande`(`dateCommande`, `idClient`) VALUES ('2011-07-12','1');
INSERT INTO `commande`(`dateCommande`, `idClient`) VALUES ('2011-07-20','2');

INSERT INTO `panier`(`idProduit`, `idCommande`, `quantite`) VALUES ('p01', '1', '12');
INSERT INTO `panier`(`idProduit`, `idCommande`, `quantite`) VALUES ('f03', '2', '14');
INSERT INTO `panier`(`idProduit`, `idCommande`, `quantite`) VALUES ('p06', '1', '1');
INSERT INTO `panier`(`idProduit`, `idCommande`, `quantite`) VALUES ('f05', '2', '3');
