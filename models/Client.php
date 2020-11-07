<?php

class Client
{
    public static $data = array(
        array(
            'id' => 1,
            'nom' => 'Soufiane Bouleil',
            'produit' => 'Mega Fleurs 1'
        ),

        array(
            'id' => 2,
            'nom' => 'Flavien GROISILLIER',
            'produit' => 'Super Fleurs 2'
        ),

        array(
            'id' => 3,
            'nom' => 'Jonathan ROUGIER',
            'produit' => 'Giga Fleurs 3'
        )
    );

    public static function returnData($column, $value)
    {
      // print("je suis dans returnData ");

        foreach (static::$data as $row) {

            if ($row[$column] == $value) {

                $instance = new static;

                foreach ($row as $key => $value) {
                    $instance->{$key} = $value;
                }

                return $instance;
            }
        }
        return false;
    }
}
