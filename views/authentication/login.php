<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
<br><br>
Email:<br>
<input type="text" name="email">
<br><br>
Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" value="Submit">
</form>
<?php //$_SESSION['Flash'] = ['erreur1', 'erreur2', 'erreur3']; ?>

<?php if(isset($_SESSION['Flash'])){?>
<div class="danger">
  <?php foreach($_SESSION['Flash'] as $key => $val){?>
    <ul>
      <li> <?= $this->$key = $val ?></li>
    </ul>
  <?php }?>

</div>
<?php }?>
