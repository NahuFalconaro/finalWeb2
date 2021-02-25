<?php

//ejercicio2 alternativa B

require_once './model/modelViaje.php';
require_once './model/modelCiudad.php';
class controllerCiudad{

    private $modelCiudad;
    private $modelViaje;
    function __construct(){
        $this->modelCiudad = new modelCiudad();
        $this->modelViaje = new modelViaje();
    }
    function generateTabla(){
        $listaCiudades = [];

        $ciudades = $this->modelCiudad->getCiudades();
        if(!empty($ciudades)){
            foreach($ciudades as $ciudad){
                $viajesAsociados = $this->modelViajes->getViajesByCiudad($ciudad->id);
                if(!empty($viajesAsociados)){
                    $datos = [];
                    $cantidadViajes = count($viajesAsociados);
                    array_push($datos, $cantidadViajes);
                    array_push($datos, $viajesAsociados);
                    array_push($listaCiudades, $ciudad);
                }else{
                    $this->view->showError("No hay viajes asociados a dicha ciudad");
                }
            }
        }else{
            $this->view->showError("No hay ciudades");
        }
        $this->view->showTable($listaCiudades);
    }
}