<?php
abstract class Model{
  // Infos de la DB
  private $host = "localhost";
  private $db_name = "lafleur";
  private $username = "root";
  private $password = "root";

  // Variable qui contiendra l'instance de la connexion
  protected $_connexion;

  // Variable permettant de contenir les datas du model sous forme de tableau
  public $table;

  /**
  * Méthode d'initialisation de la DB
  *
  * @return void
  */
  public function getConnection(){
    // On supprime la dernière connexion
    $this->_connexion = null;
    // On essaie de se connecter à la DB
    try{
      $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->_connexion->exec("set names utf8");
    }catch(PDOException $exception){
      echo "Erreur de connexion : " . $exception->getMessage();
    }
  }
}
