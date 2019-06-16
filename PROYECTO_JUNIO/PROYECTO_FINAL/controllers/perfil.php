<?php

    include_once "controllers/session.php";

    session_start();

    class Perfil extends Controller{

        private $session;

        function __construct(){
            parent::__construct();

            $this->view->datos = [];

            $session = new Session();


            $usuarioActivo = $session->get(":usr");

            

            if(!isset($usuarioActivo))
            { 
                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/nolog');

            } 
        }

        function render(){

            $session = new Session();

            $usuario = $session->get(':usr');
            
            $perfil = $this->model->getPerfil();
            $this->view->perfil = $perfil;
            $this->view->render("perfil/index");
        }

        function verUsuario($param = null){
            $usuarioNombre = $param[0];
            $usuario = $this->model->getById($usuarioNombre);


            //definimos variable de sesion. En la siguiente sesion tendremos el ID de la matricula
            $_SESSION["id_verUsuario"] = $usuario->usuario;

            $this->view->usuario = $usuario;
            $this->view->mensaje = "";
            $this->view->render("perfil/modificar");
        }

        function actualizarUsuario(){
            
            $usuario = $_SESSION["id_verUsuario"];
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $email = $_POST["email"];
            $fecnac = $_POST["fecnac"];
            $descripcion = $_POST["descripcion"];

            $falloFecha = true;
            $falloEmail = true;
            $falloNombre = true;
            $falloUsuario = true;
            $falloApellidos = true;
            $falloDescripcion = true;

            $fecha_actual = date("Y-m-d");

            $fecha_antigua = "1930-01-01";

            function test_input($data){
                // para evitar caracteres innecesarios
                $data = trim($data); // quita los espacios al principio y al final
                $data = stripslashes($data); // quita las barras inclinadas
                return $data;
            }




            
             // nombre
            if (empty($_POST['nombre'])) {
                
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario. "/?fracasoModificarNombreVacio");
                die();

            } else if(!preg_match('/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/', $nombre)){
            
                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarNombre");
                die();

            } else {
                $falloNombre = false;
                $nombres = test_input($_POST['nombre']);
            }





            // apellidos
            if (empty($_POST['apellidos'])) {

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarApellidosVacio");
                die();
            
            } else if((!preg_match('/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/', $apellidos)) && (!preg_match('/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/', $apellidos))){

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarApellidos");
                die();

            }else {

                $falloApellidos = false;
                $apellidos2 = test_input($_POST['apellidos']);
            }



            // correo
            if (empty($_POST['email'])) {

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarEmailVacio");
                die();

            }else if(!preg_match('/^[-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+_]+(\.[a-zA-Z]{2,4})$/', $email)){

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarEmail");
                die();

            }else{
                $falloEmail = false;
                $correo = test_input($_POST['email']);
            }



            // fecha
            if (empty($_POST['fecnac'])) {

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarFecnacVacio");
                die();
                

            } else if( $fecnac > $fecha_actual || $fecnac == $fecha_actual ){

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificarFecnac");
                die();

            }else if($fecnac < $fecha_antigua){

                header("location:http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/verUsuario/" . $usuario . "/?fracasoModificar2Fecnac");
                die();
                
            }else{
                $falloFecha = false;
                $fecha = test_input($_POST['fecnac']);
            }


            unset($_SESSION["id_verUsuario"]);

            if($falloNombre==false && $falloApellidos==false && $falloEmail==false && $falloFecha == false){

                if($this->model->update(["usuario" => $usuario, "nombre" => $nombre, "apellidos" => $apellidos, "email" => $email, "fecnac" => $fecnac, "descripcion" => $descripcion])){

                    $usuario = new Usuario();
                    $usuario->usuario = $usuario;
                    $usuario->nombre = $nombre;
                    $usuario->apellidos = $apellidos;
                    $usuario->email = $email;
                    $usuario->fecnac = $fecnac;
                    $usuario->descripcion = $descripcion;
                    
                    $this->view->usuario = $usuario;
                    $this->view->mensaje = "Usuario actualizado con exito";

                } else{
                    
                    $this->view->mensaje = "Error al actualizar el usuario";
                }

                header('location: http://localhost/PROYECTO_JUNIO/PROYECTO_FINAL/perfil/?exitoActualizar');

                
                $this->view->render("perfil/modificar");
            }
            
        }

    }
?>