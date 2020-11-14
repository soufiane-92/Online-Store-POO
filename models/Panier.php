<?php

class Panier extends Model
{
  public $panier = [];

    // var_dump($this->panier);
    // $secure = false; // recevoir les cookies uniquement en HTTPS
    // $httponly = false; // évite accès de la session par scripte JavaScript
    // $samesite = '';
    //
    // if(PHP_VERSION_ID < 70300) {
    //   session_set_cookie_params($maxlifetime, '/; samesite='.$samesite, $_SERVER['HTTP_HOST'], $secure, $httponly);
    // } else {
    //   session_set_cookie_params([
    //     'lifetime' => $maxlifetime,
    //     'path' => '/',
    //     'domain' => $_SERVER['HTTP_HOST'],
    //     'secure' => $secure,
    //     'httponly' => $httponly,
    //     'samesite' => $samesite
    //   ]);
    // }
    //
    // setcookie('panier', $panier, time() + 3600, '/', $_SERVER['HTTP_HOST']);
  public function __construct()
  {
   Session::set('panier', $data = []);
  }

  static public function get()
  {
    // if (Session::get("panier") != null) {
    //   return Session::get("panier");
    // }
    return $_SESSION['panier'];
  }

  static public function show()
  {
    if (Session::get("panier") != null){
      $toutLesProduits = array();
      $produit = new Produit;
      $i = 0;
      foreach(Session::get("panier") as $key => $value){
        if ($produit->getOne('id', $key)) {
          $toutLesProduits[$i] = $produit->getOne('id', $key);
          $toutLesProduits[$i]['quantite'] = $value; 
          $i++;
        }
      }
      return $toutLesProduits;
    }
  }

  static public function add(string $idProduit,int $quantite)
  {
    $_SESSION['panier'][$idProduit] = intval($quantite);

    // if (Session::get('panier') != null){
    //   $produit = new Produit;
    //   if ($produit->getOne('id', $idProduit)) {
    //   }
    // }
  }

  static public function remove($idProduit)
  {
    // parcourt le tableau panier est suprime le produit ayant la $key = $idProduit

    if (isset($_SESSION['panier'])){
      foreach($_SESSION['panier'] as $key => $value){
        if ($key == $idProduit) {
          unset($_SESSION['panier'][$key]);
        }
      }
    }
  }

  static public function delete()
  {
    if (isset($_SESSION['panier'])){
      Session::stop("panier");
    }
  }

}
