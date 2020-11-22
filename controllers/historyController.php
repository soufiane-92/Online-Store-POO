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

        if (isset($_POST['voirCommande']) && !empty($_POST['voirCommande'])) {
            $details = $history->getAllProductsFromCommand($_POST['voirCommande']);
            $this->getView('historiqueCommandes', $details);
        }
        $this->getView('historiqueCommandes', $historyList);

        if (isset($_POST['return'])) {
            unset($_POST['voirCommande']);
        }
    }
}
