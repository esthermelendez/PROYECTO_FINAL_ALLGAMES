<?php

    include_once "models/Objetojuegos.php";

    class juegoXboxModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function contarPaginas(){
            $query6 = "SELECT * FROM plataforma_juego JOIN juego ON plataforma_juego.idJuego=juego.idJuego  WHERE plataforma_juego.idPlataforma=6";
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
        
        public function getXbox($pagina){

            $query5 = "SELECT * FROM plataforma_juego JOIN juego ON plataforma_juego.idJuego=juego.idJuego  WHERE plataforma_juego.idPlataforma=6";
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

                $juegoxbox = [];

                try{

                    $query = $this->db->connect()->query("SELECT * FROM plataforma_juego JOIN juego ON plataforma_juego.idJuego=juego.idJuego  WHERE plataforma_juego.idPlataforma=6 ORDER BY juego.idJuego DESC LIMIT $inicio,".$TAMANO_PAGINA.";");
                    

                    while($row = $query->fetch()){
                        $item = new Objetojuegos();
                        
                        $item->idJuego = $row["idJuego"];
                        $item->nombre = $row["nombre"];
                        $item->descripcion = $row["descripcion"];
                        $item->imagen = $row["imagen"];
                        
                        array_push($juegoxbox, $item);  
                    }

                    return $juegoxbox;  

                }catch(PDOException $e){
                    return [];
                }
            }
        }
    }
?>