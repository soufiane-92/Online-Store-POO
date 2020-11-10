<?php

class LoginController extends Controller
{
  public function index()
  {
    $this->getView('authentication/login', array());
    if ($_POST['email']) {
      //On instancie une session et on lui attribut un nom
      if (!$session) {
        $session = new Session(session_start());
      }
      $session->set('Flash', "");

      $this->check_client_auth();
    }
  }

   public function check_client_auth(){

     $email = $_POST['email'];
     $pwd   = $_POST['password'];


    $auth = new Auth;
    $auth = $auth->checkAuth($email, $pwd);

    if(!$auth){

      // echo 'Identifiant ou Mot de Passe incorrect.';
         $session->set('Flash', ['erreur1', 'erreur2', 'erreur3']);

    }
    else{
      print(" dans else check_client_auth");


    }
    // header('location:home');
  }

}
?>
