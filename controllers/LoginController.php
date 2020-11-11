<?php

class LoginController extends Controller
{
  public function index()
  {

    $this->getView('authentication/login', array());

    if ($_POST['Submit']) {
      $this->check_client_auth();
    }
  }

  public function check_client_auth(){


    function secureData($data, $typeData = "") {
      if($typeData != "password") $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    function valid_email($str) {
      return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }


    $erreurs = array();
    $email = secureData($_POST['email'], "text");
    $pwd   = secureData($_POST['password'], "password");

    if(!isset($email) || empty($email)){
      array_push($erreurs, "Champ email obligatoire.");
    } else {
      if (!valid_email($email)){
        array_push($erreurs, "Format d'email invalide");
      }
    }

    if(!isset($pwd)  || empty($pwd)){
      array_push($erreurs, "Champ mot de passe obligatoire.");
    }

    print_r(count($erreurs));

    if (count($erreurs) > 0) {

      Session::$currentSession->set("flash", $erreurs);
      // print_r($_SESSION);


    } else
    {
      $auth = new Auth;
      print(" else Auth ? ==>");

      if($auth->checkAuth($email, $pwd) == null)
      {
        array_push($erreurs, "Authentification incorrecte.");
        Session::$currentSession->set("flash", $erreurs);
      }
      else
      {
        $auth = $auth->User($email, $pwd);
        Session::$currentSession->set("auth", $auth);
        header('location:catalogue');
        die();
      }
    }
    header('location:login');


  }

}
?>
