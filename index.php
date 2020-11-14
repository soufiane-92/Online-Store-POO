<?php

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$url = new Url();

$app = new Application($url->getUrlInfo()[0]);


if(!isset($_SESSION)) 
    { 
        session_start();
        
}
if(!Session::get('panier')) {
  new Panier();
}

$routes = array(
    "/\/(catalogue)\/(.+)/" => array('CatalogueController', 'categorie'),
    "/\/(catalogue)\/?/" => array('CatalogueController', 'index'),
    "/\/(register)\/?(\d+)?/" => array('RegisterController', 'index'),
    "/\/(login)\/?(\d+)?/" => array('LoginController', 'index'),
    "/\/(logout)\/?(\d+)?/" => array('LogoutController', 'index'),
    '//' => array('HomeController', 'index')
);

// print(Application::$root);


foreach ($routes as $url => $action) {

  // var_dump($_SERVER['REQUEST_URI']);
  $params = null;
  // var_dump($params);
    $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);
    //  var_dump($matches);
    // var_dump($params);
    // var_dump($matches);

    if ($matches > 0) {
      // var_dump($matches);
      // var_dump($url);
      // var_dump($action);
        // var_dump($action[0]);
        if (isset($params[2])) {

          $params = $params[2];
        } else {
          $params = 1;
        }
        $controller = new $action[0];

        $controller->{$action[1]}($params);

        // Exemple:
        // $controller = new HomeController;
        // $controller->index($params);

        break;
    }
}
