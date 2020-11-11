
<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
Nom:<br>
<input type="text" name="name" >
<br>
prénom:<br>
<input type="text" name="firstName">
<br><br>
Email:<br>
<input type="text" name="email">
<br><br>
Password:<br>
<input type="password" name="password">
<br><br>
<input type="submit" name="Submit" value="Submit">
</form>
<?php if(isset($_SESSION['flash'])){?>
<div class="alert alert-danger">
  <strong>Attention !</strong> 
    <ul>
      <?php foreach($_SESSION['flash'] as $key => $val){?>
      <li> <?= $this->$key = $val ?></li>
    <?php }?>
    </ul>
</div>
<?php Session::remove('flash') ; }?>
