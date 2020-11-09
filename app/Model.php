<?php


abstract class Model {
  private $db;
  // Variable permettant de contenir les datas du model sous forme de tableau
  public $table;
  protected $_connection;

  /**
  * Méthode d'initialisation de la DB
  *
  * @return void
  */
  public function getConnection(){
    // On essaie de se connecter à la DB
    $this->_connection = null;
    try{  
      $this->db = new Database();
      $this->_connection = $this->db->connexion;
      
       
    }catch(PDOException $exception){
      echo "Erreur de connexion : " . $exception->getMessage();
    }
  }

}
