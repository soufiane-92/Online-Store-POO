<?php
include './utils/functions.php';
class HistoryController extends Controller
{
    public function index()
    {
        $client = $_SESSION['auth'] ?? false;
        if (!$client) {
            return header('location:home');
        }

        $history = new Commande();

        $historyList = $history->getAllCommande($_SESSION['auth']['id']);

        

        if(isset($_POST['voirCommande']) && !empty($_POST['voirCommande'])){
            $validate = false;
            foreach($historyList['id'] as $id){
                if ($id === $_POST['voirCommande']){
                    $validate === true;
                }
            }
            if ($validate) {
                $details = $history->getAllProductsFromCommand($_POST['voirCommande']);
            }
        }
        $historyList['details']= $details;
        $this->getView('historiqueCommandes', $historyList);
    }
}
