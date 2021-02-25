<?php


class modelViaje{

    private $db;
    function __contruct(){
        $this->db = new PDO(...);
    }
    function controlMismoViaje($dia, $hora, $empresa){
        $query = $this->db->prepare('SELECT * FROM viaje WHERE viaje.dia = ? AND viaje.hora = ? AND viaje.empresa = ?')
        $query->execute(array[$dia, $hora, $empresa]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function addViaje($nroViaje, $dia, $hora, $empresa, $idCiudadOrigen, $idCiudadDestino){
        $query = $this->db->prepare('INSERT INTO viaje(nroViaje, dia, hora, empresa, id_ciudad_origen, id_ciudad_destino) VALUES(?, ?, ?, ?, ?, ?)');
        $query->execute(array[$nroViaje, $dia, $hora, $empresa, $idCiudadOrigen, $idCiudadDestino])
    }

    function getViajesByCiudad($idCiudad){
        $query = $this->db->prepare('SELECT * FROM viaje WHERE viaje.id_ciudad_origen = ? OR viaje.id_ciudad_destino = ?');
        $query->execute(array[$idCiudad]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}