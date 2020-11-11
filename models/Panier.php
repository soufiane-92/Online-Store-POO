<?php

class Panier extends Model
{
  public $panier;
  public function __construct()
  {
    if(Session::get("panier") == null){
      Session::set("panier", $panier);
    }
    $this->panier = Session::get("panier");

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
  }

  public function get()
  {
    if (Session::get("panier") != null) {
      return Session::get("panier");
    }
  }

  public function show()
  {
    if (Session::get("panier") != null){
      $toutLesProduits = array();
      $produit = new Produit;
      $i = 0;
      foreach(Session::get("panier") as $key => $value){
        if ($produit->getOne('id', $key)) {
          $toutLesProduits[$i] = $produit->getOne('id', $key);
          $i++;
        }
      }
      return $toutLesProduits;
    }
  }

  public function add(string $idProduit,int $quantite)
  {
    if (isset($_SESSION['panier'])){
      $produit = new Produit;
      if ($produit->getOne('id', $idProduit)) {
        $_SESSION['panier'][$idProduit] = $quantite;
      }
    }
  }

  public function remove($idProduit)
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

  public function delete()
  {
    if (isset($_SESSION['panier'])){
      Session::stop("panier");
    }
  }

}
