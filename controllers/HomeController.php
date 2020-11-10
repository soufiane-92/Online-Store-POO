<?php
class HomeController extends Controller
{

    public function index()
    {
      // print("je suis dans la méthode index de la class HomeContriller");
      // print_r($params);

        // //On instancie une session et on lui attribut un nom
        // $session = new Session(session_start());
        // $session->set('name', 'Flash');

        // print($session->get('name'));
        // session_destroy();

        // On instancie le model "Produit"
        $this->getModel('Produit');

        // On creer le tableau de tous nos produits
        $produits = $this->Produit->getAll();
        $produit = $this->Produit->getOne("id","c03");

        var_dump($produit);

        // include 'views/home.php';
        // $this->getView("home");
        // $view = new View;
        // $view->getView("home");

        $this->getView('home', $produits);
        // $view->getView;
        // var_dump($view);
    }
}
