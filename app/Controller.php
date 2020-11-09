<?php

abstract class Controller extends View{

    public function getModel(string $model){
        // On va chercher le fichier correspondant au modèle souhaité
        require_once('models/'.$model.'.php');
        // On crée une instance de ce modèle. Ainsi "Article" sera accessible par $this->Article
        $this->$model = new $model();
    }

}
