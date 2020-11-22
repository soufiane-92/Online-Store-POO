<?php
class PanierController extends Controller
{
    public function index()
    {
      if (isset($_POST["deleteProduit"]) && !empty($_POST["deleteProduit"])) {
        Panier::remove($_POST["deleteProduit"]);
      }

      if (Panier::size() > 0) {
        $this->getView('panier');
      }
      else {
        header("Location:catalogue");
      }
    }

}
