<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=Application::$root?>views/css/styles.css">

    <title>La Boutique</title>
</head>

<body>
    <div class="container-fluid p-0">
        <header>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand header__title" href="<?=Application::$root?>home"><img
                        src="<?=Application::$root . 'images/lafleur.gif'?>" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?=Application::$root?>home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Application::$root?>catalogue">Catalogue</a>
                        </li>
                        <?php if (Session::get('auth')) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?=Application::$root?>dashboard">Administration</a>
                            </li>
                        <?php }?>

                    </ul>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?=Application::$root?>panier">Panier: <?=Panier::size();?>
                                Produit(s)</a>
                        </li>
                    </ul>
                    <?php include 'views/layout/registerMenu.php'?>
                </div>
            </nav>
        </header>
