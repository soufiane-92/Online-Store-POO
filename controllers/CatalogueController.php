<?php
include  './utils/functions.php';
class CatalogueController extends Controller
{
    public function index()
    {
      $this->getModel('Produit');
      $produits = $this->Produit->getAll();
      
      $this->getView('catalogue', $produits);
    }

    public function categorie()
    {
      $url = $_SERVER['REQUEST_URI'];
      $tokens = explode('/', $url);
      $value = $tokens[sizeof($tokens)-1];
      $getPositionEqual = strpos($value, '=');
      if($getPositionEqual === false) {
        return redirectErrorPage();
      } else {
        $value = substr_replace($value, '', 0, $getPositionEqual + 1);
      }
      if(!verifUrl($value, ['Composition', 'Fleurs', 'Plantes'])) {
        return redirectErrorPage();
      }
      
      
      $this->getModel('Categorie');
      $categorie = new Categorie;
      if($this->Categorie->getOne("libelle",secureData($value))['id']){
        
        $produits = $this->Categorie->getAllProductsByCategorie($this->Categorie->getOne("libelle",secureData($value))['id']);
      } else {
        return redirectErrorPage();
      }
      
      $this->getView('catalogue', $produits);
    }
}
