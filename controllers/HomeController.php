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

        var_dump($produits[0]);
        include 'views/home.php';
        // $this->getView("home");
        // $view = new View;
        //
        // $view->getView("home");
        // var_dump($view);
    }
}
