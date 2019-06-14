<?php

    include_once "models/objetojuegos.php";
    include_once "models/usuario.php";

    const TOKEN = "l7xxe524dc1c367a42b697daace407f93224";

    class PopulateModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function datosPopulate(){
            
            //todos los datos de la tabla Juegos

            $datos_url = "https://api.shop.com/AffiliatePublisherNetwork/v1/products/?publisherID=TEST&locale=en_US&perPage=30&categoryId=1-32866&apikey=".TOKEN;

            $datos   = json_decode(file_get_contents($datos_url));

            foreach ($datos->products as $item):

                $nomJue = addslashes($item->name);
                $desJue = addslashes($item->description);
                $desarrolladorJue = $item->brand;
                $idJue = $item->id;
                $imgJue = $item->imageUrl;
        
               

                $query = 'INSERT INTO juego (nombre, descripcion, idJueAPI, imagen) VALUES (:nomJue, :desJue, :idJue, :imgJue)';
                $consulta = $this->db->connect()->prepare($query);
                $consulta->bindValue(':nomJue', $nomJue);
                $consulta->bindValue(':desJue', $desJue);
                $consulta->bindValue(':idJue', $idJue);
                $consulta->bindValue(':imgJue', $imgJue);
                $consulta->execute();
        
            endforeach;

            // //plataformas de juegos
            $plat_url= "https://api.shop.com/AffiliatePublisherNetwork/v1/categories/?publisherID=TEST&locale=en_US&perPage=15&apikey=".TOKEN;
            $plataformas = json_decode(file_get_contents($plat_url));

            foreach ($plataformas->categories as $item):

                $nomCat = $item->name;

                if($nomCat=="Video Games"):

                    foreach ($item->subCategories as $info) {
                        $nomPla = $info->name;
                        $idPla = $info->id;

                        $query2 = 'INSERT INTO plataforma (idPlaAPI, nombre) VALUES (:idPla, :nomPla)';
                        $consulta2 = $this->db->connect()->prepare($query2);
                        $consulta2->bindValue(':idPla', $idPla);
                        $consulta2->bindValue(':nomPla', $nomPla);
                        $consulta2->execute();
                        
                    }
                    
                endif;

            endforeach;

            //compañias de juegos
            $companias_url= "https://api.shop.com/AffiliatePublisherNetwork/v1/products/?publisherID=TEST&locale=en_US&perPage=10&categoryId=1-32866&apikey=".TOKEN;
            $companias = json_decode(file_get_contents($companias_url));

            foreach ($companias->brands as $item):

                $nomCom = $item->name;
                $idComAPI = $item->id;

                $query3 = 'INSERT INTO compania (nombre, idComAPI) VALUES (:nomCom, :idComAPI)';
                $consulta3 = $this->db->connect()->prepare($query3);
                $consulta3->bindValue(':nomCom', $nomCom);
                $consulta3->bindValue(':idComAPI', $idComAPI);
                $consulta3->execute();

            endforeach;
        }
    }
?>