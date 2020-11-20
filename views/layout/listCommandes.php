<div class="list__command">
    <div class="row m-5 d-flex justify-content-between">
        <div class="col-sm-5">
            <h2 class="block_green_title" id="clientDash">Historique des commandes</h2>
        </div>
    </div>
    <div class="table-responsive bg-light ">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Référence</th>
                    <th>Date de la commande</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($allData as $commande) : ?>
                    <tr>
                        <td><?= $commande['id'] ?></td>
                        <td><?= $commande['dateCommande'] ?></td>
                        <td>
                            <button type="submit" value="<?= $commande['id'] ?>" name="voirCommande" class="btn btn-lg btn-green" data-toggle="modal" data-target="#detailsModal">
                                Voir
                            </button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="detailsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Paiement en ligne</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php var_dump($_POST['voirCommande']) ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col" class="text-right">Prix unitaire</th>
                            <th scope="col" class="text-right">Total</th>
                            <th class="text-right"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($allData['details'] as $produit) {
                            $total += round($produit['prix'] * $produit['quantite'], 2);
                        ?>
                            <tr>
                                <td>
                                    <div style="max-width:100px; background: white; text-align:center;">
                                        <img style="max-height:80px;" src="<?= Application::$root . $produit['imageUrl'] ?>" />
                                    </div>
                                </td>
                                <td><?= ucfirst($produit['nom']) . " : " . ucfirst($produit['description']) ?>
                                </td>
                                <td><?= $produit['quantite'] ?></td>
                                <!-- <td><input class="form-control" type="text" value="1" /></td> -->
                                <td class="text-right"><?= round($produit['prix'], 2) . ' EUR' ?></td>
                                <td class="text-right"><?= round($produit['prix'] * $produit['quantite'], 2) . ' EUR' ?></td>
                                <td class="text-right">
                                    <form method="post">
                                        <button type="submit" name="deleteProduit" value="<?= $produit['id'] ?>" class="btn btn-lg btn-danger">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <table class="table table-striped">
                    <tbody>
                        <tr class="total_box">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?= round($total, 2) . ' EUR' ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" name="paid" class="btn btn-lg btn-block btn-primary" value="ok">Valider</button>
                <button type="button" class="btn btn-lg btn-block btn-secondary" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#detailsModal').on('shown.bs.modal', function() {
        // $('#myInput').trigger('focus')
    })
</script>