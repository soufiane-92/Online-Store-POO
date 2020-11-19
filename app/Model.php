<?php

abstract class Model
{
    private $db;
    // Variable permettant de contenir les datas du model sous forme de tableau
    public $table;
    protected $_connection;

    /**
     * Méthode d'initialisation de la DB
     *
     * @return void
     */
    public function getConnection()
    {
        // On essaie de se connecter à la DB
        $this->_connection = null;
        try {
            $this->db = new Database();
            $this->_connection = $this->db->connexion;
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }
    }

    /**
     * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
     *
     * @return void
     */
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
     *
     * @return void
     */
    public function getOne($key, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE $key = '$value'";
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
     *
     * @return void
     */
    public function create($data)
    {
        $count = 0;
        $array1 = '';
        $array2 = '';
        $array3 = array();
        foreach ($data as $col => $val) {
            if ($count++ != 0) {
                $array1 .= ', ';
                $array2 .= ', ';
            }

            // $col = mysql_real_escape_string($col);
            // $val = mysql_real_escape_string($val);

            $array1 .= "$col";
            $array2 .= " ? ";
            array_push($array3, $val);
        }
        $array1 = "(" . $array1 . ")";
        $array2 = "(" . $array2 . ")";

        $sql = "INSERT INTO " . $this->table . "  " . $array1 . " VALUES " . $array2;
        $query = $this->_connection->prepare($sql);
        $query->execute($array3);
    }

    /**
     * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
     *
     * @return void
     */
    public function update(string $id, array $data)
    {
        $count = 0;
        $array1 = '';
        $array3 = array();
        foreach ($data as $col => $val) {
            if ($count++ != 0) {
                $array1 .= ', ';
            }

            // $col = mysql_real_escape_string($col);
            // $val = mysql_real_escape_string($val);

            $array1 .= " $col = ?";
            array_push($array3, $val);
        }

        $sql = "UPDATE " . $this->table . " SET" . $array1 . " WHERE id = '$id' ";
        $query = $this->_connection->prepare($sql);
        $res = $query->execute($array3);
    }
    /**
     * Méthode qui récupére tous les enregistrements de la table choisie dans le constructeur
     *
     * @return void
     */
    public function deleteOne($key, $value)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE $key = '$value'";
        $query = $this->_connection->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}
