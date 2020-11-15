<div class="row m-5 d-flex justify-content-between">
    <div class="col-sm-5">
        <h2 class="block_green_title" id="clientDash">Clients</h2>
    </div>
</div>
<div class="table-responsive bg-light">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Actions</th>
                <th>Zone Danger</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allData['Clients'] as $client): ?>
            <tr>
                <td><?=$client['id']?></td>
                <td><?=$client['prenom']?></td>
                <td><?=$client['nom']?></td>
                <td><?=$client['email']?></td>
                <td>
                    <form method="post">
                        <button type="submit" name="modifierClient" value="<?=$client['id']?>"
                            class="btn btn-lg btn-green">
                            Modifier
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <button type="submit" name="deleteClient" value="<?=$client['id']?>"
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