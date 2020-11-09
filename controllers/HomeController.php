<?php
class HomeController extends Controller
{

    public function index()
    {
      // print("je suis dans la méthode index de la class HomeContriller");
      // print_r($params);
        $nom = 'Jonathan';

        //On instancie une session et on lui attribut un nom
        $session = new Session(session_start());
        $session->set('name', $nom);

        print($session->get('name'));
        session_destroy();

        // On instancie le model "Produit"
        $this->getModel('Produit');

        // On creer le tableau de tous nos produits
        $produits = $this->Produit->getAll();

        // var_dump($produits);

        // include 'views/home.php';
        // $this->getView("home");
        // $view = new View;
        // $view->getView("home");

        $this->getView('home', $produits);
        // $view->getView;
        // var_dump($view);
    }
}
