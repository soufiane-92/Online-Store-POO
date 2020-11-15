<div class="row m-5 d-flex justify-content-between">
    <div class="col-sm-5">
        <h2 class="block_green_title" id="categoriesDash">Catégories</h2>
    </div>
    <div class="col-sm-5 d-flex justify-content-end align-items-center">
        <a href="<?=Application::$root?>dashboard/ajouter" class="btn btn-lg ml-5 btn_add">
            Ajouter
        </a>
    </div>
</div>
<div class="table-responsive bg-light">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Libellé</th>
                <th>Actions</th>
                <th>Zone Danger</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allData['Categories'] as $cat): ?>
            <tr>
                <td><?=$cat['id']?></td>
                <td><?=$cat['libelle']?></td>
                <td>
                    <form method="post">
                        <button type="submit" name="modifierCategorie" value="<?=$cat['id']?>"
                            class="btn btn-lg btn-green">
                            Modifier
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <button type="submit" name="deleteCategorie" value="<?=$cat['id']?>"
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