<?php

include_once "models/objetojuegos.php";
include_once "models/usuario.php";

    class EditarJuegosModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function getByNombre($nombre){

            
            // echo $nombre;
        
                
                $item = new Objetojuegos();

                $query = $this->db->connect()->prepare("SELECT * FROM juego WHERE nombre = :nombre");

                $query->execute(["nombre" => $nombre]);
               


                $row = $query->fetch();
                // echo"<pre>";
                // print_r($row);
                // echo"</pre>";

                // echo $row["nombre"];
                $item->idJuego = $row["idJuego"];
                $item->nombre = $row["nombre"];

                // echo "============";
                // echo $item->nombre;
                $item->descripcion = $row["descripcion"];
                $item->imagen = $row["imagen"];
          
                // var_dump($item);
                
            return $item;

            
            
        }

        public function contarPaginas(){
            $query6 = "SELECT * FROM juego";
            $consulta6 = $this->db->connect()->prepare($query6);
            $consulta6->execute();


            $num_total_registros = $consulta6->rowCount();

            if ($num_total_registros > 0) {
                //Limito la busqueda
                $TAMANO_PAGINA = 9;
                $pagina = false;
            
                //examino la pagina a mostrar y el inicio del registro a mostrar
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
                //Limito la busqueda
                $TAMANO_PAGINA = 9;
                $pagina = false;
            
                //examino la pagina a mostrar y el inicio del registro a mostrar
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


        public function update($datos){

            try{

                $query = 'UPDATE juego SET nombre = :nombreA, descripcion = :descripcion, imagen = :imagen WHERE nombre = :nombreB';
                $consulta = $this->db->connect()->prepare($query);
                $consulta->bindValue(':nombreA', $datos['nombre']);
                $consulta->bindValue(':descripcion', $datos['descripcion']);
                $consulta->bindValue(':imagen', $datos['imagen']);
                $consulta->bindValue(':nombreB', $datos['nombreSM']);
                $consulta->execute();

                return true;

              
            }catch(PDOException $e){
              
                
                return false;
            }
        }
    }
?>