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

        $this->getView('historiqueCommandes', $historyList);
    }
}
