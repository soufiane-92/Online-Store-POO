<div class="row">
  <div class="col-sm-12">
    <?php if(Session::get('flash') !== null){?>

      <div class="row">
        <div class="col-11 mx-auto p5">
          <div class="alert alert-danger">
            <strong>Attention !</strong>
            <ul class="list-group">
              <?php foreach(Session::get('flash') as $key => $val){?>
                <li class="list-group-item list-group-item-danger mt-3"> <?= $val ?></li>
              <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <?php Session::remove('flash') ; }?>
    </div>
    <div class="col-sm-12 col-md-8 col-lg-4 mx-auto my-5">
      <form class="form__login" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="nom" class="form-control form-control-lg" id="nom" aria-describedby="nomHelp" name="nom">
        </div>
        <div class="form-group">
          <label for="prenom">Prenom</label>
          <input type="prenom" class="form-control form-control-lg" id="prenom" aria-describedby="prenomHelp" name="prenom">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" name="email">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="password" class="form-control form-control-lg" id="password" aria-describedby="passwordHelp" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
