<?php

    include_once "models/usuario.php";
    include_once "controllers/session.php";

    class perfilModel extends Model{

        public function __construct(){

            parent::__construct();

        }
        
        public function getPerfil(){
            $perfil = [];

            try{

            
                $session = new Session();

                $usuario = $session->get(':usr');

                $query = $this->db->connect()->query("SELECT * FROM usuario WHERE usuario=('$usuario')");

                while($row = $query->fetch()){
                    $item = new Usuario();
                    $item->usuario = $row["usuario"];
                    $item->nombre = $row["nombre"];
                    $item->apellidos = $row["apellidos"];
                    $item->email = $row["email"];
                    $item->fecnac = $row["fecnac"];
                    $item->descripcion = $row["descripcion"];
                    
                    
                    array_push($perfil, $item);  
                }

                return $perfil;  

            }catch(PDOException $e){
                return [];
            }
        }

        public function  getById($id){

            $item= new Usuario();

            $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
            try{
                $query->execute(["usuario" => $id]);

                while($row = $query->fetch()){
                    $item->usuario = $row["usuario"];
                    $item->nombre = $row["nombre"];
                    $item->apellidos = $row["apellidos"];
                    $item->email = $row["email"];
                    $item->fecnac = $row["fecnac"];
                    $item->descripcion = $row["descripcion"];
                }

                return $item;
            }catch(PDOException $e){
                return null;

            }
        }

        public function update($item){

            
            $query = $this->db->connect()->prepare("UPDATE usuario SET nombre = :nombre, apellidos = :apellidos, email = :email, fecnac = :fecnac, descripcion = :descripcion WHERE usuario = :usuario");

            try{
                $query->execute([
                    "usuario"=> $item["usuario"],
                    "nombre"=> $item["nombre"],
                    "apellidos"=> $item["apellidos"],
                    "email"=> $item["email"],
                    "fecnac"=> $item["fecnac"],
                    "descripcion"=> $item["descripcion"]
                ]);

                return true;
            }catch(PDOException $e){
                return false;
            }
        }
    }
?>