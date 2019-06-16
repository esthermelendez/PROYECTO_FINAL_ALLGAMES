<?php

    include_once "models/Objetojuegos.php";
    include_once "models/juegomodel.php";
    include_once "models/usuario.php";

    class AniadirJuegosModel extends Model{

        public function __construct(){
            parent::__construct();
        }


        public function insert($datos){
            

            

            try{

                $item = new Objetojuegos();

                $query = $this->db->connect()->prepare('INSERT INTO JUEGO (NOMBRE, DESCRIPCION, IMAGEN) VALUES (:nombre, :descripcion, :imagen)');

                $query->execute(["nombre" => $datos["nombre"], "descripcion" => $datos["descripcion"], "imagen" => $datos["imagen"]]);

                $query2 = "SELECT idJuego FROM juego WHERE nombre = :nombre";
                $consulta2 = $this->db->connect()->prepare($query2);
                $consulta2->bindValue(':nombre', $datos['nombre']);
                $consulta2->execute();

                while($row = $consulta2->fetch()){
                    $item->idJuego = $row["idJuego"];
                }

                $idJuegos = $item->idJuego;

               

                $query3 = "INSERT INTO plataforma_juego (IDPLATAFORMA, IDJUEGO) VALUES (:plataforma, :idJuegos)";
                $consulta3 = $this->db->connect()->prepare($query3);
                $consulta3->bindValue(':plataforma', $datos['plataforma']);
                $consulta3->bindValue(':idJuegos', $idJuegos);
                $consulta3->execute();

                


                //insertamos datos en la base de datos
                return true;

              
            }catch(PDOException $e){
                return false;
            }
        }
    }
?>