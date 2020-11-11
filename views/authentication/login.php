<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
<br><br>
Email:<br>
<input type="text" name="email">
<br><br>
Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="Submit" value="Submit">
</form>
<?php if(Session::get('flash') !== null){?>
<div class="alert alert-danger">
  <strong>Attention !</strong>
    <ul>
      <?php foreach(Session::get('flash') as $val){?>
      <li> <?= $val ?></li>
    <?php }?>
    </ul>
</div>

<?php Session::remove('flash') ; }?>
