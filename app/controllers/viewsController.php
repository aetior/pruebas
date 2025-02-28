<?php
    namespace app\controllers;
    require_once "./autoload.php";
    use app\models\viewsModel;

    class viewsController extends viewsModel{

        public function obtenerVistasController($vista){
            if($vista!=""){
                $respuesta = $this->obtenerVistasModelo($vista);

            }else{
                $respuesta="crearUser";
            }
            return $respuesta;
        }
    }