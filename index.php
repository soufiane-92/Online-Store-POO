<?php

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$routes = array(
    "/\/(login)\/?(\d+)?/" => array('LoginController', 'index'),
    "/\/(register)\/?(\d+)?/" => array('RegisterController', 'index'),
    '//' => array('HomeController', 'index')
);

// print("je suis dans l'index.php");
// var_dump($routes);

foreach ($routes as $url => $action) {
  // var_dump($url);
  // var_dump($_SERVER['REQUEST_URI']);
  // var_dump($params);

    $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);
    // var_dump($matches);
    // var_dump($params);

    if ($matches > 0) {
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
