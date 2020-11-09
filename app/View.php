<?php
class View{

    public $allData;

    public function getView($view, $allData){
      $this->data = $allData;
      require_once('views/layout/header.php');
      require_once('views/'.$view.'.php');
      require_once('views/layout/footer.php');
    }
}
