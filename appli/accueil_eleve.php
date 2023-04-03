
<?php

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    echo "SUCCESS%".json_encode($_POST);
    //---------A supprimer avant de comuniquer avec l'application 
    $_POST['NomClient'] = "dylan oiknine";
    $_POST['2'] = "2";
    $_POST['4'] = "6";
    $_POST['5'] = "8";
    $_POST['26'] = "12";
    //-----------------------------------------------------------


        //echo "SUCCESS%".json_encode($_POST."   ");

        $i=0; 
        
        foreach($_POST as $key => $value){
            $idMiel[$i] = $key;
            $qte[$i] = $value;
            $i++;
        }

    echo "<pre>";
     print_r($idMiel);
     echo "</pre>";
    echo "<pre>";
     print_r($qte);
     echo "</pre>";
        $ids = "";
        $quantites="";
       
        for($i=1;$i<sizeof($idMiel);$i++){
            //echo $ids."<br>";
            $ids = $ids.$idMiel[$i]."#";
            $quantites = $quantites.$qte[$i]."#";
        }
        

         $ids = substr($ids,0,-1);
         $quantites = substr($quantites,0,-1);
    
        $nom_client = $_POST['NomClient']."<br>";
        echo $ids."<br>";
        echo $quantites."<br>";

        include('../connexion_bdd.php');

        
        $lien = connect_to_db();

    
        $stmt = $lien->prepare('INSERT INTO commande (id_eleve,nom_client,id_miel,Qte_miel) values (:id_eleve,:nom_client,:id_miel,:Qte_miel)');
        $stmt->bindValue(':id_eleve', $_POST['id_eleve'], PDO::PARAM_STR);
        $stmt->bindValue(':nom_client', $_POST['NomClient'], PDO::PARAM_STR);
        $stmt->bindValue(':id_miel', $ids, PDO::PARAM_STR);
        $stmt->bindValue(':Qte_miel', $quantites, PDO::PARAM_STR);
        $requete->execute();
        //$rows = $requete->fetch(PDO::FETCH_ASSOC);
        $rows = $requete->fetchAll();
        