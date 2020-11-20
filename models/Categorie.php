<?php

class Categorie extends Model
{
  public function __construct()
  {
    // Table par défaut pour notre modèle
    $this->table = "categorie";
    // Connexion à la DB
    $this->getConnection();
  }
  public function getAllProductsByCategorie($value){
    $sql = "SELECT * FROM ".$this->table." INNER JOIN produit ON produit.idCategorie = ".$this->table.".id WHERE produit.idCategorie = ?";
    // print($sql);
    $query = $this->_connection->prepare($sql);
    $query->execute([$value]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
