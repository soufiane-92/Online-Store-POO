<?php
$total = 0;
foreach (Panier::show() as $produit) {
    $total += round($produit['prix'] * $produit['quantite'], 2);
}
?>

<div class="container mb-4">
    <div class="row">

        <div class="col-12">
            <div class="text-center mt-30">
                <hr><br>
                <h1>Ma Commande</h1>
                <br>
            </div>
            <div class="text-center">
                Vous etes sur le point de commander <?= Panier::size(); ?> produits pour un montant de <?= $total ?>
                Euros.
            </div>
            <div class="col mb-2 mt-30">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="<?= Application::$root . 'catalogue' ?>">
                            <button class="btn btn-lg btn-block btn-light btn-panier">Retourner au catalogue</button>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <?php
                        if (Session::get("auth") !== null) {
                        ?>
                            <a href="<?= Application::$root . 'commande' ?>">
                                <button class="btn btn-lg btn-block btn-success btn-panier">Valider la Commander</button>
                            </a>
                        <?php
                        } else {

                        ?>
                            <a href="<?= Application::$root . 'login' ?>">
                                <button class="btn btn-lg btn-block btn-warning btn-panier">Se connecter pour
                                    commander</button>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
