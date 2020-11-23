<?php

class LogoutController extends Controller
{
  public function index()
  {
    Session::remove('auth');
    header('location:home');
  }

}
?>
