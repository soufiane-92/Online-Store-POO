<?php

class Produit extends Model
{

  public function __construct()
  {
    // Table par défaut pour notre modèle
    $this->table = "produit";
    // Connexion à la DB
    $this->getConnection();
  }

  /**
   * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
   *
   * @return void
   */
  public function getAll(){
      $sql = "SELECT * FROM ".$this->table;
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetchAll();
  }

}
