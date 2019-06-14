<?php

    include_once "models/objetojuegos.php";
    include_once "models/usuario.php";

    class JuegoModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function contarPaginas(){
            $query6 = "SELECT * FROM juego";
            $consulta6 = $this->db->connect()->prepare($query6);
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

        public function getJuegos($pagina){

            $query5 = "SELECT * FROM juego";
            $consulta5 = $this->db->connect()->prepare($query5);
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
                



                $juego = [];

                try{

                    

                    
                    $query = $this->db->connect()->query("SELECT * FROM juego ORDER BY juego.idJuego DESC LIMIT $inicio,".$TAMANO_PAGINA.";");

                    while($row = $query->fetch()){
                        
                        $item = new Objetojuegos();
                        
                        $item->idJuego = $row["idJuego"];
                        $item->nombre = $row["nombre"];
                        $item->descripcion = $row["descripcion"];
                        $item->imagen = $row["imagen"];
                        
                        array_push($juego, $item);  
                    }

                    return $juego; 

                }catch(PDOException $e){
                    return [];
                }
            }
        }

        public function insertarFavoritos($nombre, $usuario){
            

            $item = new Objetojuegos();

            $query = "SELECT idJuego FROM juego WHERE nombre = :nombre";

            $consulta = $this->db->connect()->prepare($query);

            $consulta->bindValue(':nombre', $nombre);

            $consulta->execute();

            while($row = $consulta->fetch()){
                    

                $item->idJuego = $row["idJuego"];
                

            }
            
            $idJuegos = $item->idJuego;
           

            $item2 = new Usuario();

            $query2 = "SELECT idUsuario FROM usuario WHERE usuario = :usuario";

            $consulta2 = $this->db->connect()->prepare($query2);

            $consulta2->bindValue(':usuario', $usuario);

            $consulta2->execute();

            while($row = $consulta2->fetch()){
                    
                $item2->idUsuario = $row["idUsuario"];
                
            }

            $idUsuarios = $item2->idUsuario;


            $query4 = "SELECT * FROM favoritos JOIN juego ON favoritos.idJuego=juego.idJuego  WHERE favoritos.idUsuario= :idUsuarios AND favoritos.idJuego= :idJuegos";
            $consulta4 = $this->db->connect()->prepare($query4);
            $consulta4->bindValue(':idUsuarios', $idUsuarios);
            $consulta4->bindValue(':idJuegos', $idJuegos);
            $consulta4->execute();

            $CountReg = $consulta4 -> fetchAll();
            $TRegistros	= count($CountReg);

            if($TRegistros > 0){
                header("location: http://allgame.epizy.com/juego/?fracasoFavoritos");
            } 
            else {

                $query3 = 'INSERT INTO favoritos (idUsuario, idJuego) VALUES (:idUsuarios, :idJuegos)';
                $consulta3 = $this->db->connect()->prepare($query3);
                $consulta3->bindValue(':idUsuarios', $idUsuarios);
                $consulta3->bindValue(':idJuegos', $idJuegos);
                $consulta3->execute();
                header("location: http://allgame.epizy.com/juego/?exitoFavoritos");
            }


            

        }

        public function eliminarFav($idJuego, $usuario){

            $juegoId = $idJuego[0];

            $item2 = new Usuario();

            $query2 = 'SELECT idUsuario FROM usuario WHERE usuario = :usuario';

            $consulta2 = $this->db->connect()->prepare($query2);

            $consulta2->bindValue(':usuario', $usuario);

            $consulta2->execute();

            while($row = $consulta2->fetch()){
                    
                $item2->idUsuario = $row["idUsuario"];
                
            }

            $idUsuarios = $item2->idUsuario;
            

            $query4 = "DELETE FROM favoritos WHERE idUsuario= :idUsuarios AND idJuego= :juegoId";
            $consulta4 = $this->db->connect()->prepare($query4);
            $consulta4->bindValue(':idUsuarios', $idUsuarios);
            $consulta4->bindValue(':juegoId', $juegoId);
            $consulta4->execute();
        }
        
    }
?>