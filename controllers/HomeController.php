<?php
class HomeController extends Controller
{
    public function index()
    {
      // print("je suis dans la méthode index de la class HomeContriller");
      // print_r($params);
      //On instancie une session et on lui attribut un nom

        // include 'views/home.php';
        // $this->getView("home");
        // $view = new View;
        // $view->getView("home");


        
        $this->getView('home');
        // $view->getView;
        // var_dump($view);
    }
  
}
