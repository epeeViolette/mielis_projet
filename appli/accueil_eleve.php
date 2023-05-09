
<?php
//ini_set("html_errors", 0);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


//---------A supprimer avant de comuniquer avec l'application 

// $_POST['NomClient'] = "dylan oiknine";
// $_POST['id_eleve'] = "1";

// $_POST['4'] = "6";
// $_POST['5'] = "8";
// $_POST['26'] = "12";



function extraireDonneesPost($donneesBruts)
{
    //Extraire les données------------------

    $donnees = array();

    $idMiels = "";
    $qteMiels = "";
    foreach ($donneesBruts as $key => $value) {
        if ($key !== 'NomClient' && $key !== 'id_eleve') {
            $idMiels = $idMiels . $key . "#";
            $qteMiels = $qteMiels . $value . "#";
            //echo $key . " : " . $value . "<br>";
        }
    }
    $idMiels = substr($idMiels, 0, -1);
    $qteMiels = substr($qteMiels, 0, -1);
    //echo $idMiels."<br>";
    //echo $qteMiels."<br>";

    $donnees['id_eleve'] = $donneesBruts['id_eleve'];
    $donnees['NomClient'] = $donneesBruts['NomClient'];
    $donnees['idsMilels'] = $idMiels;
    $donnees['qtesMiels'] = $qteMiels;

    return ($donnees);
}

function insererDonneesDansTableCommande($lien,$donnees){

    $sql = 'INSERT INTO commande (id_eleve,nom_client) values (:id_eleve,:nom_client)';
    //echo $sql."<br>".$donnees['id_eleve']."<br>".$donnees['NomClient'];
    $stmt = $lien->prepare($sql);
    $stmt->bindValue(':id_eleve', $donnees['id_eleve'], PDO::PARAM_INT);
    $stmt->bindValue(':nom_client', $donnees['NomClient'], PDO::PARAM_STR);
    $stmt->execute();
    
    $nbrRows = $stmt->rowCount();
    if($nbrRows>0){
    $last_id = $lien->lastInsertId();
    }else{
        $last_id = null;
    }
    
    return $last_id;

}


function insererDonneesDansTableDetailCommande($lien,$donnees,$id_commande){


        $m = explode( '#', $donnees['idsMilels'] );
        $q = explode( '#', $donnees['qtesMiels'] );

        $sql = 'INSERT INTO detailscommandes (id_commande,id_miel,Qte_miel) values ';
        
        $partie2 = "";
        for ($i=0 ; $i < sizeof($m)  ; $i++ ) { 
            $partie2.="(:id_commande,:id_miel".$i.",:Qte_miel".$i.")";
            $partie2.=",";
            
        }
        $partie2 = substr($partie2,0,-1);
        
        $sql = $sql.$partie2;
        echo $sql;
        $stmt = $lien->prepare($sql);
        $stmt->bindValue(':id_commande', $id_commande, PDO::PARAM_INT);
        
        for ($i=0 ; $i < sizeof($m)  ; $i++ ) { 
        $stmt->bindValue(':id_miel'.$i, $m[$i], PDO::PARAM_INT);
        $stmt->bindValue(':Qte_miel'.$i, $q[$i], PDO::PARAM_INT);
        
        }
        $stmt->execute();
        $nbrRows = $stmt->rowCount();
    if($nbrRows>0){
    $last_id = $lien->lastInsertId()+$nbrRows-1;
    }else{
        $last_id = null;
    }
    
    return $last_id;
}




include('../connexion_bdd.php');
// echo '<pre>';
// print_r($_POST);
// echo'</pre>';

//extraire les données
$donnees = extraireDonneesPost($_POST);
$lien = connect_to_db();
//inserer les données dans la table commande
$id_commande = insererDonneesDansTableCommande($lien,$donnees);

//inserer les données dans la table detailsCommande
if($id_commande!==null){
    $id_detailsCommande = insererDonneesDansTableDetailCommande($lien,$donnees,$id_commande);
}

echo "SUCCESS : %".$id_commande."  ---    ".$id_detailsCommande;



        //echo json_encode(array('SUCCESS'=>true,'POST'=>$_POST,'nbInsert'=>$nbInsert));
