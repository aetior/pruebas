<?php

namespace app\controllers;
use app\models\mainModel;

class controllerMain extends mainModel {

    public function saveUser() {
        if(isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['email'])){
      
            $nombre=$_POST['nombre'];
            $pass=$_POST['password'];
            $email=$_POST['email'];
            $response = $this->guardar($nombre,$pass,$email);
            return $response;
        }else{
            echo "faltan datos";
        }
    }

    public function getUser(){
       if (isset($_POST['hidden'])) {
            $response = $this->consultar();
            return  $response;           
        }
    }

    public function getOneUser(){
        if(isset($_POST['hidden2'])){
            $id = $_POST['id'];
            $response = $this->seleccionarUno($id);
            return $response;
        }
    }    



}