<?php

class RegisterController extends Controller
{
  public function index()
  {
    $this->getView('authentication/register', array());
    if (isset($_POST['submit'])) {
      $this->check_client_if_exist();
    }
  }

   public function check_client_if_exist(){
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

    $name      = secureData($_POST['nom'],"text");
    $firstName = secureData($_POST['prenom'],"text");
    $email     = secureData($_POST['email'],"text");
    $password  = secureData($_POST['password'], "password");


    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!isset($password)  || empty($password)){
      array_push($erreurs, "Champ Mot de passe obligatoire.");
    } else {
      if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        array_push($erreurs, "Mot de passe de 8 caractères minimum.");
        array_push($erreurs, "Mot de passe contenant au moins une Majuscule et un Nombre.");
      }
    }

    if(!isset($name)  || empty($name)){
      array_push($erreurs, "Champ Nom obligatoire.");
    }

    if(!isset($firstName)  || empty($firstName)){
      array_push($erreurs, "Champ Prénom obligatoire.");
    }

    if(!isset($email) || empty($email)){
      array_push($erreurs, "Champ Email obligatoire.");
    } else {
      if (!valid_email($email)){
        array_push($erreurs, "Format d'Email invalide");
      }
    }

    if (count($erreurs) > 0) {
      Session::set("flash", $erreurs);
      header('location:register');

    } else {
      // On instancie le model "Client"
      $this->getModel('Client');
      $client = $this->Client->getOne("email", $email);
      if($client){
        array_push($erreurs, "Cette email existe déjà.");
        if (count($erreurs) > 0) {
          Session::set("flash", $erreurs);
          header('location:register');
    
        } else {
          header('location:register');
        }

      }
      else{
        $data = array(
          'nom' =>$name,
          'prenom' =>$firstName,
          'email' =>$email,
          'password' =>password_hash($password, PASSWORD_BCRYPT),
        );
       
        $this->Client->create($data);



        // $this->Client->update('1', $data);

      }
      // header('location:home');
    }
  }

}
?>
