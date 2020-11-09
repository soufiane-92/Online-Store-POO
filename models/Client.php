<?php

class Client extends Model
{
  private $data;

  public function __construct()
  {
    // Table par défaut pour notre modèle
    $this->table = "clients";
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

  /**
   * Méthode qui récupére un enregistrement de la table choisie dans le constructeur
   *
   * @return void
   */
  public function getOne($email){
      $sql = "SELECT * FROM ".$this->table."WHERE email = ".$email;
      print($sql);
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetch();
  }

  /**
   * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
   *
   * @return void
   */
  public function insert_new_client($data){
      $sql = "INSERT INTO ".$this->table." SET (name, firstName, email, password, creatAt) ";
      $sql .= "VALUE (";
      foreach ($data as $key => $value) {
        $sql .= $value. ", ";
      }
      $sql .= now();
      $sql .= ")";
      print($sql);
      $query = $this->_connexion->prepare($sql);
      $query->execute();
      return $query->fetchAll();
  }

}
