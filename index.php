<?php

require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
setlocale(LC_MONETARY, 'fr_FR');
$url = new Url();

$app = new Application($url->getUrlInfo()[0]);

if (!isset($_SESSION)) {
    session_start();
}
if (!Session::get('panier')) {
    new Panier();
}
$routes = array(
    "/\/(dashboard)\/?/" => array('DashboardController', 'index'),
    "/\/(panier)\/?/" => array('PanierController', 'index'),
    "/\/(catalogue)\/(.+)/" => array('CatalogueController', 'categorie'),
    "/\/(catalogue)\/?/" => array('CatalogueController', 'index'),
    "/\/(register)\/?(\d+)?/" => array('RegisterController', 'index'),
    "/\/(login)\/?(\d+)?/" => array('LoginController', 'index'),
    "/\/(logout)\/?(\d+)?/" => array('LogoutController', 'index'),
    "/\/(404)\/?(\d+)?/" => array('ErrorController', 'index'),
    "/\/(home)\/?/" => array('HomeController', 'index'),
    "/\/?/" => array('HomeController', 'index'),
);

foreach ($routes as $url => $action) {
    $params = null;
    $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);

    if ($matches > 0) {
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