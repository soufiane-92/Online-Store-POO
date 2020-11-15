<div class="row">


  <div class="col-sm-12 col-md-8 col-lg-4 mx-auto my-5">
    <div class="text-center">
      <hr><br>
      <h1>Page de Connection</h1>
      <br><hr><br>
    </div>
      <?php if(Session::get('flash') !== null){?>

            <div class="alert alert-danger">
              <strong>Attention !</strong>
              <ul class="list-group">
                <?php foreach(Session::get('flash') as $erreur){?>
                  <li class="list-group-item list-group-item-danger mt-3"> <?= $erreur ?></li>
                <?php }?>
              </ul>
            </div>
        <?php Session::remove('flash') ; }?>


      <form class="form__login" method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="password" class="form-control form-control-lg" id="password" aria-describedby="passwordHelp" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-lg btn-primary btn-register">Se Connecter</button>
        <p>Toujours pas de compte LaFleur ?</p>
        <a href="<?= Application::$root . 'register' ?>">
          <span class="btn btn-lg btn-success btn-register">
            S'Inscrire
          </span>
        </a>
      </form>

    </div>
  </div>
