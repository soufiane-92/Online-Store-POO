<?php
class CatalogueController extends Controller
{
    public function index()
    {
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
      $this->getModel('Categorie');
      $categorie = new Categorie;
      // var_dump($categorie->getOne("libelle",$value)['id']);

      if($this->Categorie->getOne("libelle",secureData($value))['id']){
        $produits = $this->Categorie->getAllProductsByCategorie($this->Categorie->getOne("libelle",secureData($value))['id']);
      } else {
        header('location:home');
      }
      $this->getView('catalogue', $produits);
    }
}
