

<div class="container mb-4">
  <div class="row">

    <div class="col-12">
      <div class="text-center mt-30">
        <hr><br>
        <h1>Mon Panier</h1>
        <br>
      </div>
      <div class="table-responsive mt-30">
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
$total = 0;
foreach (Panier::show() as $produit) {
    $total += round($produit['prix'] * $produit['quantite'], 2);
    ?>
              <tr>
                <td>
                  <div style="max-width:100px; background: white; text-align:center;">
                    <img style="max-height:80px;" src="<?=Application::$root . $produit['imageUrl']?>" />
                  </div>
                </td>
                <td><?=ucfirst($produit['nom']) . " : " . ucfirst($produit['description'])?>
                </td>
                <td><?=$produit['quantite']?></td>
                <!-- <td><input class="form-control" type="text" value="1" /></td> -->
                <td class="text-right"><?=round($produit['prix'], 2) . ' EUR'?></td>
                <td class="text-right"><?=round($produit['prix'] * $produit['quantite'], 2) . ' EUR'?></td>
                <td class="text-right">
                  <form   method="post">
                    <button type="submit" name="deleteProduit" value="<?=$produit['id']?>" class="btn btn-lg btn-danger">
                      Supprimer
                    </button>
                  </form>
                </td>
              </tr>
              <?php
}
?>
          </tbody>
        </table>
        <table class="table table-striped">
          <tbody>
            <tr class="total_box">
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td><strong>Total</strong></td>
              <td class="text-right"><strong><?=round($total, 2) . ' EUR'?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col mb-2 mt-30">
      <div class="row">
        <div class="col-sm-12  col-md-6">
          <a href="<?=Application::$root . 'catalogue'?>">
            <button class="btn btn-lg btn-block btn-light btn-panier">Retourner au catalogue</button>
          </a>
        </div>
        <div class="col-sm-12 col-md-6 text-right">
          <?php
if (Session::get("auth") !== null) {
    ?>
            <a href="<?=Application::$root . 'commande'?>">
              <button class="btn btn-lg btn-block btn-success btn-panier">Commander</button>
            </a>
            <?php
} else {

    ?>
            <a href="<?=Application::$root . 'login'?>">
              <button class="btn btn-lg btn-block btn-warning btn-panier">Se connecter pour commander</button>
            </a>
            <?php
}
?>
        </div>
      </div>
    </div>
  </div>
</div>
