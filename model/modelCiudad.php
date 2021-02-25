<?php

class modelCiudad{

    private $db;
    function __contruct(){
        $this->db = new PDO(...);
    }

    function getCiudad($idCiudad){
        $query = $this->db->prepare('SELECT * FROM ciudad WHERE id = ? AND ciudad.aspo = false');
        $query->execute(array[$idCiudad]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function getCiudades(){
        $query = $this->db->prepare('SELECT * FROM ciudad');
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}