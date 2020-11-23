<div class="container-fluid">
    <div class="row">
        <?php if (!empty(Session::get('success'))) : ?>
            <div class="col-md-12" style="text-align: center;">
                <div class="alert alert-success">
                    La commande a bien été validée.
                </div>
                <?php Session::remove('success') ?>
            </div>
        <?php endif ?>
        <?php if (empty($_POST['voirCommande'])) : ?>
            <section role="section" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
                <?php require 'layout/listCommandes.php' ?>
            </section>
        <?php else : ?>
            <section role="section" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 mb-5">
                <?php require 'layout/detailsCommande.php' ?>
            </section>
        <?php endif ?>
    </div>
</div>