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
                            <form method="post">
                                <button type="submit" name="modifierClient" class="btn btn-lg btn-green">
                                    Voir
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>