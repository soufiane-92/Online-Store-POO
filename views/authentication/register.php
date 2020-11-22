<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-4 mx-auto my-5">
      <div class="text-center">
        <hr><br>
        <h1>Page d'Inscription</h1>
        <br><hr><br>
      </div>
      <?php if(Session::get('flash') !== null){?>

            <div class="alert alert-danger">
              <strong>Attention !</strong>
              <ul class="list-group">
                <?php foreach(Session::get('flash') as $key => $val){?>
                  <li class="list-group-item list-group-item-danger mt-3"> <?= $val ?></li>
                <?php }?>
              </ul>
            </div>
        <?php Session::remove('flash') ; }?>
      <form class="form__login" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="nom" class="form-control form-control-lg" id="nom" aria-describedby="nomHelp" name="nom" value="<?= isset($_POST["nom"]) ? $_POST["nom"] : ""; ?>">
        </div>
        <div class="form-group">
          <label for="prenom">Prenom</label>
          <input type="prenom" class="form-control form-control-lg" id="prenom" aria-describedby="prenomHelp" name="prenom" value="<?= isset($_POST["prenom"]) ? $_POST["prenom"] : ""; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" name="email" value="<?= isset($_POST["email"]) ? $_POST["email"] : ""; ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control form-control-lg" id="password" aria-describedby="passwordHelp" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-register">S'Inscrire</button>
        <p>Déjà un compte LaFleur ?</p>
        <a href="<?= Application::$root . 'login' ?>">
          <span class="btn btn-lg btn-success btn-register">
            Se Connecter
          </span>
        </a>
      </form>
    </div>
  </div>
