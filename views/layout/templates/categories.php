<div class="row">
  
  <h1 class="ml-5 my-4 block_green">Catégories</h1>
  <div class="col-12 p-5">
    <?php
    $categories = new Categorie;
    $allCategories = $categories->getAll() ?? [];
    ?>
    <ul class="list-group list-categories">
      <?php foreach($allCategories as $categorie): ?>

      <li class="list-group-item"><a href="<?= Application::$root . 'catalogue' . '?categorie=' . $categorie['libelle'] ?>" ><?php echo $categorie['libelle'] ?></a></li>
      <?php  endforeach ?>
    </ul>
  </div>
</div>
