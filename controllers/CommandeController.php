<?php
class CommandeController extends Controller
{
    public function index()
    {
        $erreur = [];
        if (Session::get("auth")) {
            if (Panier::size() > 0) {
                if (isset($_POST['paid'])) {
                    if (
                        isset($_POST['numCarte']) ||
                        isset($_POST['cvc']) ||
                        isset($_POST['expireMonth']) ||
                        isset($_POST['expireYear']) ||
                        !empty($_POST['numCarte']) ||
                        !empty($_POST['cvc']) ||
                        !empty($_POST['expireYear']) ||
                        !empty($_POST['expireMonth'])
                    ) {
                        $numCarte = $_POST['numCarte'];
                        $cvc = $_POST['cvc'];
                        $dateExpire = $_POST['expireYear'] . $_POST['expireMonth'];
                        $dateExpire = intval($dateExpire);
                        if (!$numCarte === "4242 4242 4242 4242") {
                            array_push($erreur, "Num failed");
                        }
                        if (!strlen($cvc) === 3) {
                            array_push($erreur, "cvc failed");
                        }
                        if (!strtotime($dateExpire) > intval(date("Ym"))) {
                            array_push($erreur, "date failed");
                        }
                        if (!empty($erreur)) {
                            header("Location:panier");
                        } else {
                            $commande = new Commande();
                            $commande->setCommand();
                            header("Location:home");
                        }
                    }
                }else if (isset($_POST["commander"])) {
                    $this->getView('commandes');
                }
            }
        } else {
            header("Location:login");
        }
    }
}
