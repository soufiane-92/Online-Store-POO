<?php
$isIdentified = $_SESSION['Auth'] ?? false;

?>
<?php if($isIdentified): ?>

    <ul class="navbar-nav mx-auto">
        <li class="nav-item mr-5 header__user">
        <span class="nav-link header__user"><?php echo $_SESSION['Auth']; ?></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/commande">Vos Commandes</a>
        </li>
    </ul>
<?php  else:  ?>
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
            <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/register">Register</a>
        </li>
    </ul>
<?php endif; ?>
