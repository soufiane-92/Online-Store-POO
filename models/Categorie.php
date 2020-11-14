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
    $sql = "SELECT * FROM produit INNER JOIN ".$this->table." ON produit.idCategorie = ".$this->table.".id WHERE produit.idCategorie = '".$value."'";
    $query = $this->_connection->prepare($sql);
    $query->execute([$value]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
