<div class="row">
  
  <h1 class="ml-5 my-4">Catégories</h1>
  <div class="col-12">
    <?php
    $categories = new Categorie;
    $allCategories = $categories->getAll() ?? [];

    ?>
    <?php foreach($allCategories as $categorie): ?>
     
     <li><a href="<?= Application::$root . 'catalogue/' ?>" ><?= $categorie['libelle'] ?></a></li>
    <?php  endforeach ?>
  </div>
</div>
