<?php
$total = 0;
foreach (Panier::show() as $produit) {
    $total += round($produit['prix'] * $produit['quantite'], 2);
}
?>
<style>
    .command {
        min-height: 51rem;
    }
</style>

<div class="container mb-4 command">
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
                            <button class="btn btn-lg btn-block btn-success btn-panier" data-toggle="modal" data-target="#paymentModal">Valider la Commander</button>
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
    <!-- Button trigger modal -->
    <div class="modal" tabindex="-1" role="dialog" id="paymentModal">
        <form method="post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Paiement en ligne</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label" >N° de carte</label>
                                <input type="text" class="form-control" id="numCarte" value="4242 4242 4242 4242" name="numCarte">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">CVC</label>
                                <input type="text" class="form-control" id="cvc" value="123" name="cvc">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="recipient-name" class="col-form-label">Date d'expiration</label>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Mois</label>
                                    <input type="text" class="form-control" id="expirationMois" value="02" name="expireMonth">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" value="2025" name="expireYear">Année</label>
                                    <input type="text" class="form-control" id="expirationAnnee" value="2025" name="expireYear">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="paid" class="btn btn-lg btn-block btn-primary" value="ok">Valider</button>
                        <button type="button" class="btn btn-lg btn-block btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $('#paymentModal').on('shown.bs.modal', function() {
            // $('#myInput').trigger('focus')
        })
    </script>