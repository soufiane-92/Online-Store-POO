<?php
class CatalogueController extends Controller
{
    public function index()
    {
        // if( isset($_POST['submit'])){
        //     var_dump($_POST);
        //     var_dump($_SESSION);
    
        //     die();
        //   }
    
        // $session = new Session(session_start());
        
        $this->getModel('Produit');
        // get the client for the header authentification
        Session::$test->set("Auth", "Mec bizarre ");
        // var_dump($produits);

        // include 'views/home.php';
        // $this->getView("home");
        // $view = new View;
        // $view->getView("home");

        $this->getModel('Produit');
        $produits = $this->Produit->getAll();
        $this->getView('catalogue', $produits);
    
     
      // On creer le tableau de tous nos produits
      // $data = ['produits' => $produits, 'categories' => $categories]
      
        }
}
