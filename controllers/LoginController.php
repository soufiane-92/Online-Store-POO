<?php
include  './utils/functions.php';
class LoginController extends Controller
{
  public function index()
  {
    if (isset($_POST['submit'])) {
      $this->check_client_auth();
    }
    $this->getView('authentication/login', array());
  }

  public function check_client_auth(){

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

    // print_r(count($erreurs));

    if (count($erreurs) > 0) {

      Session::set("flash", $erreurs);
      // print_r($_SESSION);


    } else
    {
      $auth = new Auth;
      // print(" else Auth ? ==>");

      if($auth->checkAuth($email, $pwd) == null)
      {
        array_push($erreurs, "Authentification incorrecte.");
        Session::set("flash", $erreurs);
        // print_r($_SESSION);
        // die();
      }
      else
      {
        $auth = $auth->User($email);
        Session::set("auth", $auth);
        // $_SESSION['auth'] = $auth;
        exit(header('location:catalogue'));
        // return;
      }
    }
    if(Session::get('flash') !== null)
      return Session::get('flash');
    // header('location:login');
  }

}
?>
