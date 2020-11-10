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

}
