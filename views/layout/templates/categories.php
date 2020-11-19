<div class="row">

  <h1 class="ml-5 my-4">Catégories</h1>
  <div class="col-12 p-5">
    <?php
$categories = new Categorie;
$allCategories = $categories->getAll() ?? [];
?>
    <ul class="list-group list-categories">
      <?php foreach ($allCategories as $categorie): ?>
        <li class="list-group-item"><a href="<?=Application::$root . 'catalogue/' . strtolower($categorie['libelle'])?>" ><?=$categorie['libelle']?></a></li>
      <?php endforeach?>
    </ul>
  </div>
</div>
<?php
if (Panier::size() > 0) {
    ?>
<form class=""  method="post">
  <input type="hidden" name="deletePanier" value="ok">
  <button type="submit" name="deletePanierBtn" class="btn btn-lg btn-danger">
    Vider Panier
  </button>
</form>
<?php }?>
