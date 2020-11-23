<div class="row m-5 d-flex justify-content-between">
    <div class="col-sm-5">
        <h2 class="block_green_title" id="produitsDash">Produits</h2>
    </div>
    <div class="col-sm-5 d-flex justify-content-end align-items-center">
    <form method="POST">
        <button type="submit" name="ajouter" class="btn btn-lg ml-5 btn_add">
            Ajouter
        </button>
        </form>
    </div>
</div>
<div class="table-responsive bg-light">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Image Url</th>
                <th>Id catégorie</th>
                <th>Description</th>
                <th>Actions</th>
                <th>Zone Danger</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allData['Produits'] as $produit): ?>
            <tr>
                <td><?=$produit['id']?></td>
                <td><?=$produit['nom']?></td>
                <td><?=$produit['prix']?></td>
                <td><?=$produit['imageUrl']?></td>
                <td><?=$produit['idCategorie']?></td>
                <td><?=$produit['description']?></td>

                <td>
                    <form method="post">
                        <button type="submit" name="modifierProduit" value="<?=$produit['id']?>"
                            class="btn btn-lg btn-green">
                            Modifier
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <button type="submit" name="deleteProduit" value="<?=$produit['id']?>"
                            class="btn btn-lg btn-danger">
                            Supprimer
                        </button>
                    </form>
                </td>

            </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>