<?php $produit = $allData?>
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
                        <h2 class="block_green_title">Produit</h2>
                    </div>
                    <div class="col-sm-5 d-flex justify-content-end align-items-center">
                        <a href="<?=Application::$root?>dashboard/ajouter" class="btn btn-lg ml-5 btn_add">
                            Ajouter
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-9 col-lg-8 col-xl-6 bg-light p-5 mx-auto">
                        <form method="post">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nomHelp"
                                    value="<?=$produit['nom']?>">
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="text" class="form-control" name="prix" id="prix"
                                    aria-describedby="prixHelp" value="<?=$produit['prix']?>">
                            </div>
                            <div class="form-group">
                                <label for="imageUrl">Img Url</label>
                                <input type="text" class="form-control" name="imageUrl" id="imageUrl"
                                    aria-describedby="imageUrlHelp" value="<?=$produit['imageUrl']?>">
                            </div>
                            <div class="form-group">
                                <label for="idCategorie">Id Catégorie</label>
                                <input type="text" class="form-control" name="idCategorie" id="idCategorie"
                                    aria-describedby="idCategorieHelp" value="<?=$produit['idCategorie']?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                    aria-describedby="descriptionHelp" value="<?=$produit['description']?>">
                            </div>
                            <button type="submit" name="validateModifProduit" value="<?=$produit['id']?>"
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