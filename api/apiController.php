<?

//ENDPOINTS 
/*
    calificaciones/  consultar todas las calificaiones
    calificacion/:ID consultar determinada calificacion
    calificaiones/  agregar
    calificaciones/:ID eliminar
*/ 

class apiController{


    function getCalificaciones($params = null){
        $calificaciones = $this->modelCalificacion->getCalificaciones();
        if(!empty($calificaciones)){
            $this->viewApi->response($calificaciones, 200);
        }else{
            $this->viewApi->response("No hay calificaciones", 400);
        }
    }
    function getCalificacion($params = null){
        $idCalificacion = $params[':ID'];
        $calificacion = $this->modelCalificacion->getCalificacion($idCalificacion);
        if(!empty($calificacion)){
            $this->viewApi->response($calificacion, 200);
        }else{
            $this->viewApi->response("No hay calificacion para mostrar", 400);
        }
    }
    function agregarCalificacion($params = null){
        $data = $this->getData();
        $agrego = $this->modelCalificaciones->addCalificacion($data->mensaje, $data->valor);
        if(!empty($agrego)){
            $this->viewApi->response("Agregado Correctamente", 200);
        }else{
            $this->viewApi->response("No se pudo agregar", 400);
    }
    function eliminarCalificaciones($params = null){
        $idCalificacion = $params[':ID'];
        $eliminar = $this->modelCalificaciones->deleteCalificacion($idCalificacion);
        if(!empty($eliminar)){
            $this->viewApi->response("Eliminado Correctamente", 200);
        }else{
            $this->viewApi->response("No pudo eliminar la calificacion", 400);
        }
    }

}