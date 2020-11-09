<?php

class RegisterController extends Controller
{
  public function index()
  {
    $this->getView('authentication/register', array());
    if ($_POST['name']) {
      $this->check_client_if_exist();
    }
  }

   public function check_client_if_exist(){
    // On instancie le model "Client"
    $client = new Client;
    $name=$_POST['name'];
    $firstName=$_POST['firstName'];
    $email=$_POST['email'];
    $client = Client::getOne($email);

    if($client){
      echo 'Cette email existe déjà.';
    }
    else{
      $data = array(
        'name' =>$_POST['name'],
        'firstName' =>$_POST['firstName'],
        'email' =>$_POST['email'],
        'password' =>$_POST['password']
      );
      Client::insert_client($data);
    }
    header('location:');
  }

}
?>
