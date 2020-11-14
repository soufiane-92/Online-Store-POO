 <?php
 foreach($allData as $produit) {
  $id = $produit['id'];
  $nom = $produit['nom'];
  $prix=$produit['prix'];
  $image = $produit['imageUrl'];
  ?>
  <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mt-3">
    <div class="card" style="width: 22rem;max-height:35rem">
      <img src="<?php echo Application::$root . $image ?>" class="card-img-top article__image" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo "Prix : ".$prix." Euros" ?></h5>
        <p class="card-text ellipsis"><?php echo $nom ?></p>
        <div class="row">
          <form action="<?php //print $url->getUrlInfo()[1] ?>"  method="post">
            <div class="col-6">
              <input type="hidden" name="idProduit" value=<?php echo $id ?>>
              <button type="submit" name="addToPanier" class="btn btn-primary">Ajouter au panier</button>
            </div>
            <div class="col-6 d-inline-flex justify-content-end">
              <select name="quantite">
                <?php for($i=1; $i <= 5; $i++) {?>
                  <option value=<?php echo $i; ?> ><?php echo $i; ?></option>
                <?php } ?>
              </select>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
