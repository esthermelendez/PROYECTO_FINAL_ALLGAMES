<?php

    include_once "models/usuario.php";
    include_once "controllers/session.php";

    class LoginModel extends Model{

        public function __construct(){

            parent::__construct();

            $this->session = new Session();

        }

        public function buscar(){

            try{

                $usr = $_POST["usr"];

                $pwd = md5($_POST["pwd"]);
                

                $query = "SELECT * FROM usuario WHERE usuario = :usr AND pass = :pwd";

                $consulta = $this->db->connect()->prepare($query);

                $consulta->bindValue(':usr', $usr);
                $consulta->bindValue(':pwd', $pwd);

                $consulta->execute();

                $registrosEncontrados=$consulta->rowcount();

                if ($registrosEncontrados !=0) {

                    $this->session->init();
                    $this->session->add(':usr', $usr);
                    

                    if($this->session->getStatus() == 2){

                        header("location: http://allgame.epizy.com/juego");

                    }else if($this->session->getStatus() == 1)
                    echo "Acceso denegado";
                    
                } else{
                    header("location: http://allgame.epizy.com/login/?fracasoLogin") ;

                 
                }


            }catch(PDOException $e){
                return [];
            }
        }

        public function logout(){
            $this->session->close();
        }

        public function estado(){
            $this->session->getStatus();
        }

    }
?>