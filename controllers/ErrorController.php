<?php

class ErrorController extends Controller
{
    public function index()
    {
      $this->getView('_404');
    }
}