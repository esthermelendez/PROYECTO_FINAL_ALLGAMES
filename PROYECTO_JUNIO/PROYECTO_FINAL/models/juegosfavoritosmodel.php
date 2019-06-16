<?php

    include_once "models/Objetojuegos.php";
    include_once "models/favoritos.php";
    include_once "models/usuario.php";

    class juegosFavoritosModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function contarPaginas($usuario){
            
            $item = new Usuario();

            $query = "SELECT idUsuario FROM usuario WHERE usuario = :usuario";

            $consulta = $this->db->connect()->prepare($query);

            $consulta->bindValue(':usuario', $usuario);

            $consulta->execute();

            while($row = $consulta->fetch()){
                    

                $item->idUsuario = $row["idUsuario"];
                

            }

            $idUsuarios = $item->idUsuario;

            $query6 =  "SELECT * FROM favoritos JOIN juego ON favoritos.idJuego=juego.idJuego  WHERE favoritos.idUsuario= :idUsuarios";

            $consulta6 = $this->db->connect()->prepare($query6);
            $consulta6->bindValue(':idUsuarios', $idUsuarios);
            $consulta6->execute();


            $num_total_registros = $consulta6->rowCount();

            if ($num_total_registros > 0) {
                
                $TAMANO_PAGINA = 9;
                $pagina = false;
            
                
                if (isset($_GET["pagina"]))
                    $pagina = $_GET["pagina"];
                    
                if (!$pagina) {
                    $inicio = 0;
                    $pagina = 1;
                }
                else {
                    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
                }

                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                return $total_paginas;
            }

        }
        
        
        public function juegosFavs($usuario, $pagina){

            $item = new Usuario();

            $query = "SELECT idUsuario FROM usuario WHERE usuario = :usuario";

            $consulta = $this->db->connect()->prepare($query);

            $consulta->bindValue(':usuario', $usuario);

            $consulta->execute();

            while($row = $consulta->fetch()){
                    

                $item->idUsuario = $row["idUsuario"];
                

            }

            $idUsuarios = $item->idUsuario;
            
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $query5 = "SELECT * FROM favoritos JOIN juego ON favoritos.idJuego=juego.idJuego  WHERE favoritos.idUsuario= :idUsuarios";

            $consulta5 = $this->db->connect()->prepare($query5);
            $consulta5->bindValue(':idUsuarios', $idUsuarios);
            $consulta5->execute();


            $num_total_registros = $consulta5->rowCount();

            if ($num_total_registros > 0) {
               
                $TAMANO_PAGINA = 9;
                $pagina = false;
            
               
                if (isset($_GET["pagina"]))
                    $pagina = $_GET["pagina"];
                    
                if (!$pagina) {
                    $inicio = 0;
                    $pagina = 1;
                }
                else {
                    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
                }

                $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

                $juegofav = [];

                $query2 = "SELECT * FROM favoritos JOIN juego ON favoritos.idJuego=juego.idJuego  WHERE favoritos.idUsuario= :idUsuarios ORDER BY juego.idJuego DESC LIMIT $inicio,".$TAMANO_PAGINA.";";

                $consulta2 = $this->db->connect()->prepare($query2);
                $consulta2->bindValue(':idUsuarios', $idUsuarios);
                $consulta2->execute();

                while($row = $consulta2->fetch()){
                    $item2 = new Objetojuegos();
                    
                    $item2->idJuego = $row["idJuego"];
                    $item2->nombre = $row["nombre"];
                    $item2->descripcion = $row["descripcion"];
                    $item2->imagen = $row["imagen"];
                    
                    array_push($juegofav, $item2);  
                }

                return $juegofav;
            }
        }
    }
?>