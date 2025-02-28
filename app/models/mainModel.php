<?php

namespace app\models;

require_once "./autoload.php";

use \PDO;

if (file_exists(__DIR__ . "/../../config/server.php")) {
    require_once __DIR__ . "/../../config/server.php";
}

class mainModel
{


    private $server = DB_SERVER;
    private $db = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    protected function conectar()
    {
        $conexion = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db, $this->user, $this->pass);
        return  $conexion;
    }

    public function consultar()
    {
        $sql = "SELECT * FROM usuarios";
        $consulta = $this->conectar()->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }



    public function guardar($nombre, $password, $email)
    {
        $sql = "INSERT INTO usuarios (nombre,password,email) VALUES (:nombre,:password,:email)";
        $conexion = $this->conectar();
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        if ($stmt->execute()) {
            echo " 
                           <div id='mensaje'> Usuario Guardado</div>
                             <script> setTimeout(function() {
                        document.getElementById('mensaje').style.display = 'none';
                    }, 2000) </script>";
        } else {
            echo "Error al insertar usuario";
        }
    }

    public function seleccionarUno($id)
    {
        $sql = "SELECT nombre FROM usuarios where id=:id";
        $conection = $this->conectar();
        $stmt = $conection->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function editarUsuario($id, $nombre)
    {
        $usuario = $this->seleccionarUno($id);
        $sql = "UPDATE usuarios SET nombre =:nombre where id=:id";
        $conection = $this->conectar();
        $stmt = $conection->prepare($sql);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function validarUsuario($email, $password)
    {
        $sql = "SELECT password FROM usuarios WHERE email = :email";
        $conection = $this->conectar();
        $stmt = $conection->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $storedPassword = $stmt->fetchColumn();

        if (password_verify($password, $storedPassword)) {
            return true;
        } else {
            print_r($storedPassword);
            echo "contraseña no correcta";
            return false;
        }
    }
    public function eliminarUsuario($id){
        $sql="DELETE FROM usuarios where id=:id";
        $conection= $this->conectar();
        $stmt = $conection->prepare($sql);
        $stmt->bindParam(":id",$id);
        

        if($stmt->execute()){
            echo"elimiando con exito";
        }else{
            echo"error al eliminar";
        }

    }
}
