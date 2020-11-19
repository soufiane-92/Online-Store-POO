<?php

class Client extends Model
{
  // private $data;
  // private $connexion;

  public function __construct()
  {
    // Table par défaut pour notre modèle
    $this->table = "client";
    // Connexion à la DB
    $this->getConnection();
  }

}
