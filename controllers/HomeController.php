<?php
class HomeController extends Controller
{
    public function index()
    {
      // print("je suis dans la méthode index de la class HomeContriller");
      // print_r($params);

        // On instancie le model "Produit"
        $this->getModel('Produit');

        // On creer le tableau de tous nos produits
        $produits = $this->Produit->getAll();
        $produit = $this->Produit->getOne("id","c03");

// **************   test Ajouter dans Panier   ***************
        // new Panier;
        // var_dump($panier);
// **************   test Ajouter dans Panier   ***************
        // var_dump($_SESSION);
        // print(Count(Panier::get()) === 0 ? "merde" : "fuck");

        // Panier::add("c01", 1);
        // Panier::add("c02", 1);
        // Panier::add("c03", 2);
        // Panier::add("c04", 1);
        // Panier::add("c05", 4);
        // Panier::add("c06", 1);
// **************   test Supprimer element du Panier   ***************
      // Panier::remove("c0wvxcv6");
// **************   test Supprimer tout le Panier   ***************
      // Panier::delete();
// **************   recupere tout les produits du panier   ***************
        // var_dump(Panier::show());
// **************   recupere liste idProduit et quantité du panier   ***************
        // var_dump(Panier::get());
        // var_dump($_SESSION['panier']);
// ************************************************************************************
        $this->getView('home');
    }

}
