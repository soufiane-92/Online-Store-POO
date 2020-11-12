<div class="plr_30">

  <h1 class="my-4">Filtrer par Categorie</h1>
  <div class="list-group">
    <?php
    $url = new Url;
    $allCategories = new Categorie;
    $allCategories = $allCategories->getAll();
    foreach($allCategories as $categorie)
    {
      ?>
      <a href="<?= $url->getUrlInfo()[0] . 'catalogue/' . strtolower($categorie['libelle']) ?>" class="list-group-item"  <?= ($url->getUrlInfo()[0] . 'catalogue/' . strtolower($categorie['libelle']) === $url->getUrlInfo()[1]) ? "style='background-color: #007bff; color: #FFF;'" : "" ?> ><?= $categorie['libelle'] ?></a>
    <?php  } ?>
  </div>
</div>
