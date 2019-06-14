<?php
    
    class NuevoModel extends Model{
        public function __construct(){
            parent::__construct();
        }

        public function insert($datos){

           
            $nom = $_POST["nom"];
            $ema = $_POST["ema"];
            $fecnac = $_POST["fecnac"];
            $usr = $_POST["usr"];
            $ape = $_POST["ape"];
            $pwd = $_POST["pwd"];

            $falloFecha = true;
            $falloEmail = true;
            $falloNombre = true;
            $falloUsuario = true;
            $falloApellidos = true;
            $falloContrasenia = true;

            $fecha_actual = date("Y-m-d");
            $fecha_antigua = "1930-01-01";

            function test_input($data){
                // para evitar caracteres innecesarios
                $data = trim($data); // quita los espacios al principio y al final
                $data = stripslashes($data); // quita las barras inclinadas
                return $data;
            }





            // nombre
            if (empty($_POST['nom'])) {
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroNombreVacio");
                die();

            } else if(!preg_match('/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/', $nom)){
            
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroNombre");
                die();
            } else {
                $falloNombre = false;
                $nombre = test_input($_POST['nom']);
            }



             // apellidos
             if (empty($_POST['ape'])) {
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroApellidosVacio");
                die();
            
            } else if((!preg_match('/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/', $ape)) && (!preg_match('/^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/', $ape))){

                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroApellidos");
                die();

            }else {

                $falloApellidos = false;
                $apellidos = test_input($_POST['ape']);
            }




            // fecha
            if (empty($_POST['fecnac'])) {
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroFecnacVacio");
                die();
                

            } else if($fecnac > $fecha_actual || $fecnac == $fecha_actual ){
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroFecnac");
                die();

            }else if($fecnac < $fecha_antigua){
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistro2Fecnac");
                die();
            }else{
                $falloFecha = false;
                $fecha = test_input($_POST['fecnac']);
            }




            // correo
            if (empty($_POST['ema'])) {
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroEmailVacio");
                die();

            }else if(!preg_match('/^[-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+_]+(\.[a-zA-Z]{2,4})$/', $ema)){

                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroEmail");
                die();

            }else{
                $falloEmail = false;
                $correo = test_input($_POST['ema']);
            }





            
            // usuario
            if (empty($_POST['usr'])) {
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroUsuarioVacio");
                die();

            }else if(!preg_match('/^[0-9a-z]+$/', $usr)){
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroUsuario");
                die();

            }else{
                $falloUsuario = false;
                $usuario = test_input($_POST['usr']);
            }


            // pwd
            if (empty($_POST['pwd'])) {
                $error_contrasenia = "Este campo contraseña no puede estar vacío";
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroContraseniaVacio");
                die();

            }else if(strlen($pwd) < 8){
                header("location: http://allgame.epizy.com/nuevo/?fracasoRegistroContrasenia");
                die();

            }else{
                $falloContrasenia = false;
                $contrasenia = test_input(md5($_POST['pwd']));
            }

            



            if($falloNombre==false && $falloEmail==false && $falloFecha==false && $falloUsuario==false && $falloApellidos==false && $falloContrasenia==false){

                try{
    
                    $query = 'INSERT INTO usuario (usuario, pass, nombre, apellidos, email, fecnac) VALUES (:usr, :pwd, :nom, :ape, :ema, :fecnac)';
                    $consulta = $this->db->connect()->prepare($query);
                    $consulta->bindValue(':usr', $datos["usuario"]);
                    $consulta->bindValue(':pwd',$datos["pass"]);
                    $consulta->bindValue(':nom',$datos["nombre"]);
                    $consulta->bindValue(':ape',$datos["apellidos"]);
                    $consulta->bindValue(':ema',$datos["email"]);
                    $consulta->bindValue(':fecnac',$datos["fecnac"]);
                    $consulta->execute();
    
                    // $query->execute(["usr" => $datos["usuario"], "pwd" => $datos["pass"], "nom" => $datos["nombre"], "ape" => $datos["apellidos"], "ema" => $datos["email"], "fecnac" => $datos["fecnac"]]);
    
                    return true;
    
                  
                }catch(PDOException $e){
                    header("location: http://allgame.epizy.com/nuevo/?usuarioDuplicado");
                    return false;
                }
            }
        }

    }
?>