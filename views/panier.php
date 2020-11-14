<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Mon Panier</h1>
  </div>
</section>

<div class="container mb-4">
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col"> </th>
              <th scope="col">Produit</th>
              <th scope="col">Quantité</th>
              <th scope="col" class="text-right">Prix unitaire</th>
              <th scope="col" class="text-right">Total</th>
              <th class="text-right"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach (Panier::show() as $produit) {
              $total += round($produit['prix'] * $produit['quantite'], 2);
              ?>
              <tr>
                <td>
                  <div style="max-width:100px; background: white; text-align:center;">
                    <img style="max-height:80px;" src="<?= $produit['imageUrl'] ?>" />
                  </div>
                </td>
                <td><?= ucfirst($produit['nom']) . " : " . ucfirst($produit['description']) ?>
                </td>
                <td><?= $produit['quantite'] ?></td>
                <!-- <td><input class="form-control" type="text" value="1" /></td> -->
                <td class="text-right"><?= money_format('%i', $produit['prix']) ?></td>
                <td class="text-right"><?= money_format('%i', round($produit['prix'] * $produit['quantite'], 2)) ?></td>
                <td class="text-right">
                  <form   method="post">
                    <button type="submit" name="deleteProduit" value="<?= $produit['id'] ?>" class="btn btn-lg btn-danger">
                      Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              <?php
            }
            ?>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <!-- <td>Sous-Total</td>
              <td class="text-right"><?= money_format('%i',$total) ?></td> -->
            </tr>
            <!-- <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TVA</td>
            <td class="text-right">6,90 €</td>
          </tr> -->
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td class="text-right"><strong><?= money_format('%i',$total) ?></strong></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col mb-2">
    <div class="row">
      <div class="col-sm-12  col-md-6">
        <a href="<?= Application::$root . 'catalogue' ?>">
          <button class="btn btn-lg btn-block btn-light">Retourner au catalogue</button>
        </a>
      </div>
      <div class="col-sm-12 col-md-6 text-right">
        <?php
        if (Session::get("auth") !== null) {
          ?>
          <a href="<?= Application::$root . 'commande' ?>">
            <button class="btn btn-lg btn-block btn-success text-uppercase">Commander</button>
          </a>
          <?php
        } else {

          ?>
          <a href="<?= Application::$root . 'register' ?>">
            <button class="btn btn-lg btn-block btn-warning text-uppercase">S'inscrire pour commander</button>
          </a>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>
