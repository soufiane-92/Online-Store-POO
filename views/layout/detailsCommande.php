<div class="col-12">
    <div class="text-center mt-30">
        <hr><br>
        <h1>Commande référence <?= $_POST['voirCommande'] ?></h1>
        <br>
    </div>
    <div class="table-responsive mt-30">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col" class="text-right">Total</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0 ?>
                <?php foreach ($allData as $produit) : ?>
                    <?php $total += round($produit['prix'] * $produit['quantite'], 2) ?>
                    <tr>
                        <td>
                            <div style="max-width:100px; background: white; text-align:center;">
                                <img style="max-height:80px;" src="<?= Application::$root . $produit['imageUrl'] ?>" />
                            </div>
                        </td>
                        <td><?= ucfirst($produit['nom']) . " : " . ucfirst($produit['description']) ?>
                        </td>
                        <td><?= $produit['quantite'] ?></td>
                        <td><?= round($produit['prix'], 2) . ' EUR' ?></td>
                        <td class="text-right"><?= round($produit['prix'] * $produit['quantite'], 2) . ' EUR' ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <table class="table table-striped">
            <tbody>
                <tr class="total_box">
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <td class="text-right"><strong><?= round($total, 2) . ' EUR' ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <form action="<?= Application::$root . 'history' ?>" method="post" style="text-align: center;">
            <button type="submit" name="return" class="btn btn-lg btn-block btn-secondary">Fermer</button>
            </a>
        </form>
    </div>
</div>
</div>