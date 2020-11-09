<!DOCTYPE html>
<html>
<head>
  <title>Boutique Fleurs</title>
</head>
<body>

  <div>
    <?php
    var_dump($produits);
    foreach( $produits as $produit)
    {
      $id = $produit['id'];
      $description = $produit['description'];
      $prix=$produit['prix'];
      $image = $produit['image'];
      ?>
      <ul>
        <li><img src="<?php echo $image ?>" alt=image /></li>
        <li><?php echo $description ?></li>
        <li><?php echo "Prix : ".$prix." Euros" ?></li>
      </ul>
      <?php
    }
    ?>
  </div>
</body>
</html>
