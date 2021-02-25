<?php

require_once './model/modelViaje.php';
require_once './model/modelCiudad.php';
require_once './view/view.php';
require_once './controller/controllerUser.php';
class controllerViaje{
//ejercicio 1 alternativa A
    private $modelViaje;
    private $controllerUser;
    private $modelCiudad;
    private $view;
    function __construct(){
        $this->modelViaje = new modelViaje();
        $this->controllerUser = new controllerUser();
        $this->modelCiudad = new modelCiudad();
        $this->view = new view();
    }
    function addViaje(){
        if((!empty($_POST['nroViaje']) && isset($_POST['nroViaje'])) && (!empty($_POST['dia']) && isset($_POST['dia'])) 
        && (!empty($_POST['hora']) && isset($_POST['hora']))  && (!empty($_POST['empresa']) && isset($_POST['empresa'])) 
        && (!empty($_POST['idCiudadOrigen']) && isset($_POST['idCiudadOrigen'])) && (!empty($_POST['idCiudadDestino']) && isset($_POST['idCiudadDestino']))){
            if($this->controllerUser->isAdmin()){
                $ciudadOrigen = $this->modelCiudad->getCiudad($_POST['idCiudadOrigen']);
                $ciudadDestino = $this->modelCiudad->getCiudad($_POST['idCiudadDestino']);
                if((!empty($ciudadOrigen))){
                    if(!empty($ciudadDestino)){
                    $dia = $_POST['dia'];
                    $hora = $_POST['hora'];
                    $empresa = $_POST['empresa'];
                    $controlMismoViaje = $this->modelViaje->controlMismoViaje($dia, $hora, $empresa);
                    if(empty($controlMismoViaje)){
                        $nroViaje = $_POST['nroViaje'];
                        $this->modelViaje->addViaje($nroViaje, $dia, $hora, $empresa, $_POST['idCiudadOrigen'], $_POST['idCiudadDestino']);
                    }else{
                        $this->view->showError('Hay un viaje identico');
                    }
                }else{
                    $this->view->showError('no existe la ciudad destino'); 
                }
            }else{
                $this->view->showError('No existe la ciudad origen');
            }
        }else{
            $this->view->showError('No es admin del sistema');
        }
    }else{
        $this->view->showError('Hay campos incompletos');
    }
    }
}
?>
