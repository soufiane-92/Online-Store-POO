<img src="images/panier.gif" alt="Panier" title="panier" />
<?php

foreach ($lesProduitsDuPanier as $unProduit) {
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];

?>
	<p>
		<form action="" method="POST">
			<img src="<?php echo $image ?>" alt=image width=100 height=100 />
			<?php
			echo	$description . "($prix Euros)";
			?>
			<input type="number" name="nbProduits" max="99" style="width: 40px;" value=""> 			
			<a href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=ajouterDesProduits" onclick="return confirm('ajouter');">
				<img src="images/mettrepanier.png" TITLE="Ajouter au panier"></a>
			<a href="index.php?uc=gererPanier&produit=<?php echo $id ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article frais?');">
				<img src="images/retirerpanier.png" TITLE="Retirer du panier"></a>
		</form>



	</p>
<?php
}
?>
<br>
<a href=index.php?uc=gererPanier&action=passerCommande><img src="images/commander.jpg" TITLE="Passer commande"></a>