<?php
class View{

    public function getView(string $view){
        // On va chercher le fichier correspondant a la vue souhaité est creer le Layout
        include('views/layout/header.php');
        include('views/'.$view.'.php');
        include('views/layout/footer.php');
    }

}
