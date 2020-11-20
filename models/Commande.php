<?php

class Commande extends Model
{
    private $idCommande;

    public function __construct()
    {
        $this->table = "Commande";
        $this->getConnection();
    }

    public function getId()
    {
        return $this->idCommande;
    }

    public function setCommand()
    {
        $idClient = $_SESSION["auth"]["id"];
        $sql = "INSERT INTO `commande`(`dateCommande`, `idClient`) VALUES (NOW(), ?) ";
        $query = $this->_connection->prepare($sql);
        $query->execute([$idClient]);
        $this->idCommande = $this->_connection->lastInsertId();
        $this->setPanier();
    }

    public function setPanier()
    {
        $produits = $_SESSION['panier'];
        $idCommande = $this->getId();
        foreach ($produits as $produit => $quantite) {
            $sql = "INSERT INTO `panier`(`idProduit`, `idCommande`, `quantite`) VALUES (? , ?, ?) ";
            $query = $this->_connection->prepare($sql);
            $query->execute([$produit, $idCommande, $quantite]);
        }
        unset($_SESSION['panier']);
    }

    public function getAllCommande($idClient)
    {
        $sql = "SELECT * FROM `commande` WHERE commande.idClient =? ";
        $query = $this->_connection->prepare($sql);
        $query->execute([$idClient]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProductsFromCommand($value)
    {
        $sql = "SELECT * FROM commande 
        INNER JOIN panier ON commande.id = panier.idCommande 
        INNER JOIN produit ON panier.idProduit = produit.id 
        WHERE commande.id = ?";
        // print($sql);
        $query = $this->_connection->prepare($sql);
        $query->execute([$value]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
