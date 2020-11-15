<?php $cat = $allData?>
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
                        <h2 class="block_green_title">Catégorie</h2>
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
                                <label for="libelle">Libelle</label>
                                <input type="text" class="form-control" name="libelle" id="libelle"
                                    aria-describedby="libelleHelp" value="<?=$cat['libelle']?>">
                            </div>
                            <button type="submit" name="validateModifCategorie" value="<?=$cat['id']?>"
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