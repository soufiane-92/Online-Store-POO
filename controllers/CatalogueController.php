<?php
class CatalogueController extends Controller
{
    public function index()
    {
      function secureData($data, $typeData = "") {
        if($typeData != "password") $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      if(isset($_POST["addToPanier"]) || isset($_POST["idProduit"]) || isset($_POST["quantite"])){
        // if(!empty($_POST["idProduit"]) || !empty($_POST["quantite"])){
          $id = secureData($_POST["idProduit"], "input");
          $quantite = secureData($_POST["quantite"], "input");
          new Panier;
          Panier::add($id, $quantite);

          // die();
        // }
      }

      $this->getModel('Produit');
      $produits = $this->Produit->getAll();
      $this->getView('catalogue', $produits);



    }

    public function categorie($value)
    {
      function secureData($data, $typeData = "") {
        if($typeData != "password") $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      // if(isset($_POST["addToPanier"]) || isset($_POST["idProduit"]) || isset($_POST["quantite"])){
        // if(!empty($_POST["idProduit"]) && !empty($_POST["quantite"])){
          $idProduit = $_POST["idProduit"];
          $quantite = $_POST["quantite"];
          if (Session::get('panier') != null){
            new Panier;
            print($idProduit);
            print($quantite);
            die();
          }
          Panier::add($idProduit, $quantite);
        // }
      // }



      $this->getModel('Categorie');
      $categorie = new Categorie;
      // var_dump($categorie->getOne("libelle",$value)['id']);

      if($this->Categorie->getOne("libelle",secureData($value, "input"))['id']){
        $produits = $this->Categorie->getAllProductsByCategorie($this->Categorie->getOne("libelle",secureData($value, "input"))['id']);
      } else {
        header('location:home');
      }
      $this->getView('catalogue', $produits);
    }



}
