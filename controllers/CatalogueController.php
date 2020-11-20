<?php
include './utils/functions.php';
class CatalogueController extends Controller
{
  public function index()
  {

    if (isset($_POST["deletePanier"]) && !empty($_POST["deletePanier"])) {
      if (Session::get('panier') != null) {
        if ($_POST["deletePanier"] == "ok") {
          Panier::delete();
        }
      }
    }
    if (isset($_POST["addToPanier"]) || isset($_POST["idProduit"]) || isset($_POST["quantite"])) {
      if (!empty($_POST["idProduit"]) || !empty($_POST["quantite"])) {
        $id = secureData($_POST["idProduit"], "input");
        $quantite = secureData($_POST["quantite"], "input");
        // new Panier;
        Panier::add($id, $quantite);
      }
    }

    $this->getModel('Produit');
    $produits = $this->Produit->getAll();
    $this->getView('catalogue', $produits);
  }

  public function categorie($value)
  {
    $this->getModel('e');
    // $categorie = new Categorie;
    if ($this->Categorie->getOne("libelle", secureData($value, "input"))['id']) {
      $produits = $this->Categorie->getAllProductsByCategorie($this->Categorie->getOne("libelle", secureData($value, "input"))['id']);
    } else {
      return redirectErrorPage();
    }

    if (isset($_POST["deletePanier"]) && !empty($_POST["deletePanier"])) {
      if (Session::get('panier') != null) {
        if ($_POST["deletePanier"] == "ok") {
          Panier::delete();
        }
      }
    }

    if (isset($_POST["addToPanier"]) || isset($_POST["idProduit"]) || isset($_POST["quantite"])) {
      if (!empty($_POST["idProduit"]) || !empty($_POST["quantite"])) {
        $id = secureData($_POST["idProduit"], "input");
        $quantite = secureData($_POST["quantite"], "input");
        Panier::add($id, $quantite);
      }
    }
    $this->getView('catalogue', $produits);
  }
}
