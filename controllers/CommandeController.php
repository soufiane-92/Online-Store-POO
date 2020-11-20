<?php
class CommandeController extends Controller
{
    public function index()
    {
        if (Session::get("auth")) {
            if (isset($_POST["commander"])) {
                if (Panier::size() > 0) {
                    $this->getView('commandes');
                } else {
                    header("Location:catalogue");
                }
            }
        } else {
            header("Location:login");
        }
    }

    public function commande($params)
    {
        $erreur = [];
        if (
            Session::get("auth") ||
            $params != 'validate'
        ) {
            if (Panier::size() > 0) {
                if (
                    isset($_POST['numCarte']) ||
                    isset($_POST['cvc']) ||
                    isset($_POST['expireDate']) ||
                    !empty($_POST['numCarte']) ||
                    !empty($_POST['cvc']) ||
                    !empty($_POST['expireDate'])
                ) {
                    $numCarte = $_POST['numCarte'];
                    $cvc = $_POST['cvc'];
                    $dateExpire = $_POST['expireAnne'] . $_POST['expireMois'];
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
                    } else {
                        $commande = new Commande();
                        $commande->setCommand();
                        header("Location:home");
                    }
                }
            } else {
                header("Location:login");
            }
        } else {
            header("Location:login");
        }
    }
}
