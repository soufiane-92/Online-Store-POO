<!DOCTYPE html>
<html>
<head>
  <title>Boutique Fleurs</title>
</head>
<body>

  <div>
    <h1>Ma vue Home</h1>
    <?php
    foreach($allData as $produit)
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
