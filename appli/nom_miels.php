

<?php

    include('../connexion_bdd.php');

        
        $lien = connect_to_db();

    
        $requete =$lien->prepare("SELECT nom_miel FROM miel ");  
        $requete->execute();
        //$rows = $requete->fetch(PDO::FETCH_ASSOC);
        $rows = $requete->fetchAll();
        

        $tab_miel = array();
        $i=0;
        foreach($rows as $enregistresement){
            //$tab_miel[$i]['id_miel'] = $enregistresement['id_miel'];
            $tab_miel[$i]['nom_miel'] = $enregistresement['nom_miel'];
            //$tab_miel[$i]['type_miel'] = $enregistresement['type_miel'];
            //array_push($tab_miel, $enregistresement['nom_miel']);
            //$tab_miel[$i]['provenance_miel'] = $enregistresement['provenance_miel'];
            //$tab_miel[$i]['description_miel'] = $enregistresement['description_miel'];
            //$tab_miel[$i]['prix'] = $enregistresement['prix'];
            $i++;
            
        }

        close_db($lien);
        // echo "<pre>";
        // print_r($tab_miel);
        // echo "</pre>";
        
        echo "SUCCESS%".json_encode($tab_miel);
        



?>