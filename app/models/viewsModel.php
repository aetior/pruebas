<?php
    namespace app\models;

    class ViewsModel{

        protected function obtenerVistasModelo($vista){

            $listaBlanca = ["crearUser","modificarUser","mostrarTodosUsers","buscarUsuario"];

            if(in_array($vista, $listaBlanca)){
                    if(is_file("./app/views/".$vista.".php")){
                        $contenido = "./app/views/".$vista.".php";
                    }else{
                        $contenido = APP_URL."./app/views/404.php";
                    }
            }elseif($vista=="login"|| $vista=="index"){
                $contenido="./app/views/404.php";
            }else{
                $contenido="./app/views/404.php";
            }
            return $contenido;
        }
    }