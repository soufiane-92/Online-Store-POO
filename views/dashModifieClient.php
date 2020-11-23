<?php $client = $allData?>
<div class="container-fluid">
    <div class="row">
        <?php require 'layout/sidebarDash.php'?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="col-sm-12">
                <?php if (Session::get('flash') !== null) {?>

                <div class="row">
                    <div class="col-11 mx-auto p5">
                        <div class="alert alert-danger">
                            <strong>Attention !</strong>
                            <ul class="list-group">
                                <?php foreach (Session::get('flash') as $key => $val) {?>
                                <li class="list-group-item list-group-item-danger mt-3"> <?=$val?></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php Session::remove('flash');}?>
                <div class="row m-5 d-flex justify-content-between">
                    <div class="col-sm-5">
                        <h2 class="block_green_title">Clients</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-9 col-lg-8 col-xl-6 bg-light p-5 mx-auto">
                        <form method="post">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom"
                                    aria-describedby="prenomHelp" value="<?=$client['prenom']?>">
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nomHelp"
                                    value="<?=$client['nom']?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" value="<?=$client['email']?>">
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" name="adresse" id="adresse"
                                    aria-describedby="adresseHelp" value="<?=$client['adresse']?>">
                            </div>
                            <div class="form-group">
                                <label for="ville">Ville</label>
                                <input type="text" class="form-control" name="ville" id="ville"
                                    aria-describedby="villeHelp" value="<?=$client['ville']?>">
                            </div>
                            <div class="form-group">
                                <label for="codePostal">codePostal</label>
                                <input type="text" class="form-control" name="codePostal" id="codePostal"
                                    aria-describedby="codePostalHelp" value="<?=$client['codePostal']?>">
                            </div>
                            <button type="submit" name="validateModifClient" value="<?=$client['id']?>"
                                class="btn btn-lg btn-green mt-3">
                                Modifier
                            </button>
                        </form>
                    </div>
                </div>
        </main>
    </div>
</div>

</html>