<?php

class Auth extends AuthModel
{
  // private $data;
  // private $connexion;

  public function __construct()
  {
    print(" dans class Auth");
    // Table par défaut pour notre modèle
    $this->table = "clients";
    // Connexion à la DB
    $this->getConnection();
  }

}
