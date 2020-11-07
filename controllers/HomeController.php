<?php

class HomeController
{

    public function index($params = 1)
    {
      // print("je suis dans la méthode index de la class HomeContriller");
      // print_r($params);
        $client = Client::returnData('id', $params);
        // $client = Client::returnData('id', 1);

        include 'views/home.php';
    }
}
