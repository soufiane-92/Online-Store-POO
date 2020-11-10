<?php

class RegisterController extends Controller
{
  public function index()
  {
    $this->getView('authentication/register', array());
    if ($_POST['email']) {
      //On instancie une session et on lui attribut un nom
      if (!$session) {
        $session = new Session(session_start());
      }
      $session->set('Flash', 'erreur');

      $this->check_client_if_exist();
    }
  }

   public function check_client_if_exist(){

    $name=$_POST['name'];
    $firstName=$_POST['firstName'];
    $email=$_POST['email'];


    // On instancie le model "Client"
    $this->getModel('Client');
    $client = $this->Client->getOne("email", $_POST['email']);

    if($client){
      echo 'Cette email existe déjà.';
      header('location:register');

    }
    else{
      $data = array(
        'name' =>$_POST['name'],
        'firstName' =>$_POST['firstName'],
        'email' =>$_POST['email'],
        'password' =>password_hash($_POST['password'], PASSWORD_BCRYPT),
        'createdAt' => date("Y-m-d h:i:s")
        // 'updatedAt' => date("Y-m-d h:i:s")
      );
      $this->Client->create($data);



      // $this->Client->update('1', $data);

    }
    // header('location:home');
  }

}
?>
