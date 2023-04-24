
<?php
    ini_set("html_errors",0);
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
   

    //---------A supprimer avant de comuniquer avec l'application 
    // $_POST['NomClient'] = "dylan oiknine";
    // $_POST['2'] = "2";
    // $_POST['4'] = "6";
    // $_POST['5'] = "8";
    // $_POST['26'] = "12";
    // //-----------------------------------------------------------


        //echo "SUCCESS%".json_encode($_POST."   ");

    //     $i=0; 
        
    //     foreach($_POST as $key => $value){
    //         $idMiel[$i] = $key;
    //         $qte[$i] = $value;
    //         $i++;
    //     }

    // echo "<pre>";
    //  print_r($idMiel);
    //  echo "</pre>";
    // echo "<pre>";
    //  print_r($qte);
    //  echo "</pre>";
    //     $ids = "";
    //     $quantites="";
       
    //     for($i=1;$i<sizeof($idMiel);$i++){
    //         //echo $ids."<br>";
    //         $ids = $ids.$idMiel[$i]."#";
    //         $quantites = $quantites.$qte[$i]."#";
    //     }
        

    //      $ids = substr($ids,0,-1);
    //      $quantites = substr($quantites,0,-1);
    
        // $nom_client = $_POST['NomClient']."<br>";
        // echo $ids."<br>";
        // echo $quantites."<br>";

        include('../connexion_bdd.php');

        
        $lien = connect_to_db();

        $sql = 'INSERT INTO commande (id_eleve,nom_client,id_miel,Qte_miel) values (:id_eleve,:nom_client,:id_miel,:Qte_miel)';
    
        $stmt = $lien->prepare($sql);
        $stmt->bindValue(':id_eleve', $_POST['id_eleve'], PDO::PARAM_INT);
        $stmt->bindValue(':nom_client', $_POST['NomClient'], PDO::PARAM_STR);

        $nbInsert = 0;
        $sql = 'select id_miel from miel';
        $res = $lien->query($sql);
        while($miel = $res->fetch(PDO::FETCH_ASSOC)) {
            $id_miel = strval($miel['id_miel']);
            if(isset($_POST[$id_miel])) {
                $quantity = intval($_POST[$id_miel]);
                if($quantity > 0) {
                    $stmt->bindValue(':id_miel', $id_miel, PDO::PARAM_INT);
                    $stmt->bindValue(':Qte_miel', $quantity, PDO::PARAM_INT);
                    $nbInsert++;
                    $stmt->execute();
                }
                
            }
        }

        echo json_encode(array('SUCCESS'=>true,'POST'=>$_POST,'nbInsert'=>$nbInsert));
    
        