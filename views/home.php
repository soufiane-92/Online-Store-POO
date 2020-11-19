<div class="row home p-5">
    <div class="col-md-6 home_presentation d-flex flex-column justify-content-center align-items-start">
        <h1>Welcome to this Demo Ecommerce</h1>
        <p class="mt-5">Ce projet à pour but de présenter une trame possible de développement PHP, Orienté Objet</p>
        <a href="#descriptions" class="btn btn-green">Lire la suite</a>
    </div>
    <div class="col-md-6">
        <img src="<?=Application::$root?>images\lala-azizli-tfNyTfJpKvc-unsplash.jpg" class="img-fluid rounded" alt="image who shows developers in work">
        <span class="credit_image">Photo by <a href="https://unsplash.com/@lazizli?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Lala Azizli</a> on <a href="https://unsplash.com/s/photos/developers?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
    </div>
</div>
<div class="row home__infos">
<div class="col-md-7 mx-auto" id="descriptions">
        <h2 class="home_title">Qui a réalisé ce projet ?</h2>
        <ul class="ml-5">
            <li>Sofiane</li>
            <li>Jonathan</li>
            <li>Flavien</li>
        </ul>
    </div>
    <div class="col-md-7 mx-auto my-5" id="goal">
        <h2 class="home_title">Pourquoi ?</h2>
        <p>En commun accord avec nos enseignants de la partie informatique, dans le cadre du BTS SIO option SLAM, nous avons décidé de rafraichir un projet qui avait pour but de présenter l'architecture MVC.</p>
        <p class="mt-2">Cette application ecommerce a été reconstruite en partant de zero en programmation object.</p>
        <p>Pendant sa création, nous avons essayé de ne pas inutilement complexifier le code. Nous avons donc fait des choix spécifiques qui ne peuvent pas s'appliquer dans le cadre d'une application en production. </p>
    </div>
    <div class="col-md-7 mx-auto my-5" id="goal">
        <h2 class="home_title">Important</h2>
        <p class="mt-2">Cette application ne peut pas être utilisé en production, notamment pour des raisons de sécurité.</p>

    </div>
</div>
<div class="row home__doc">
    <div class="col-md-7 mx-auto" id="descriptions">
        <h2 class="home_title">Présentation graphique avec MCD</h2>
    </div>
    <div class="col-md-10 mx-auto" id="descriptions">
        <img class="img-fluid" src="<?=Application::$root?>images/mcd.png" alt="description mcd">
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
  Mon Bouton
</button>

<div class="modal" tabindex="-1" role="dialog" id="paymentModal">
  <form>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Paiement en ligne</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">N° de carte</label>
                <input type="text" class="form-control" id="numCarte">
              </div>
            </div>
            <div class="col-xs-12">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">CVC</label>
                <input type="text" class="form-control" id="cvc">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <label for="recipient-name" class="col-form-label">Date d'expiration</label>
              </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Mois</label>
                    <input type="text" class="form-control" id="expirationMois">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Année</label>
                    <input type="text" class="form-control" id="expirationAnnee">
                  </div>
                </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lg btn-block btn-primary">Valider</button>
        <button type="button" class="btn btn-lg btn-block btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</form>
</div>
<script type="text/javascript">
$('#paymentModal').on('shown.bs.modal', function () {
  // $('#myInput').trigger('focus')
})

</script>
