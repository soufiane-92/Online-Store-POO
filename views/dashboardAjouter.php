<?php $categories = $allData['Categories']?>
<?php //var_dump($categories);die();?>
<div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
      <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link" href="<?=Application::$root . 'dashboard'?>">
                      Dashboard
                  </a>
              </li>
          </ul>
      </div>
      </nav>
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
                <div class="row my-5">
                    <div class="col-sm-5 p-0">
                        <h2 class="block_green_title">Ajouter un Produit</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-md-9 col-lg-8 col-xl-7 bg-light p-5 mr-auto">
                        <form method="post">
                            <div class="form-group">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" name="id" id="id" aria-describedby="idHelp">
                                <small id="idSmall" class="form-text text-muted">* Obligatoire.</small>

                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nomHelp">
                                <small id="nomSmall" class="form-text text-muted">* Obligatoire.</small>

                            </div>
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="text" class="form-control" name="prix" id="prix"
                                    aria-describedby="prixHelp">
                                <small id="prixSmall" class="form-text text-muted">* Obligatoire.</small>

                            </div>
                            <div class="form-group">
                                <label for="imageUrl">Img Url</label>
                                <input type="text" class="form-control" name="imageUrl" id="imageUrl"
                                    aria-describedby="imageUrlHelp" placeholder='ex: images/nomCategorie/nomFichier.[formatImage]'>
                                <small id="imageUrlSmall" class="form-text text-muted">* Obligatoire.</small>

                            </div>
                            <div class="form-group">
                                <label for="idCategorie">Id Catégorie</label>
                                    <select class="form-control" id="idCategorie" name="idCategorie">
                                      <?php foreach ($categories as $cat): ?>
                                        <option value="<?=$cat['libelle']?>"><?=$cat['libelle']?></option>
                                      <?php endforeach?>
                                    </select>
                                    <small id="idCategorieSmall" class="form-text text-muted">* Obligatoire.</small>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description"
                                    aria-describedby="descriptionHelp">
                            </div>
                            <button type="submit" name="ajouterProduit" class="btn btn-lg btn-green mt-3">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-sm-5 p-0">
                        <h2 class="block_green_title">Catégorie</h2>
                    </div>
                </div>

                <div class="row">
                  <div class="col-sm-10 col-md-9 col-lg-8 col-xl-7 bg-light p-5 mr-auto">
                          <form method="post">
                              <div class="form-group">
                                  <label for="idCategorie">Id</label>
                                  <input type="text" class="form-control" name="idCategorie" id="idCategorie"
                                      aria-describedby="idCategorieHelp" placeholder='ex: fle comme pour fleur'>
                                  <small id="idCategorieSmall" class="form-text text-muted">3 lettres Obligatoires.</small>

                              </div>
                              <div class="form-group">
                                  <label for="nom">Libelle </label>
                                  <input type="text" class="form-control" name="libelle" id="libelle" aria-describedby="libelleHelp" placeholder='ex: Fleur'>
                                  <small id="idCategorieSmall" class="form-text text-muted">* Obligatoire.</small>

                              </div>
                              <button type="submit" name="ajouterCategorie" class="btn btn-lg btn-green mt-3">
                                  Ajouter
                              </button>
                          </form>
                      </div>
                </div>
        </main>
    </div>
</div>

</body>

</html>