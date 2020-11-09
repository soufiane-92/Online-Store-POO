<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/css/styles.css" >

    <title>La Boutique</title>
  </head>
<body>


<!-- <!DOCTYPE html>
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
