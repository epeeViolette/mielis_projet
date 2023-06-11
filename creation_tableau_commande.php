


<?php


$lien = connect_to_db();

    
//requette globale 

$stmt = $lien->prepare('SELECT * FROM commande,detailscommandes');
$stmt->execute();
$rows = $stmt->fetchAll();

foreach($rows as $enregistrement) {

    $id_commande = $enregistrement['id_commande'];
    $id_eleve = $enregistrement['id_eleve'];
    $nom_client = $enregistrement['nom_client'];
    $idDetailsCommandes = $enregistrement['idDetailsCommandes'];
    $id_miel = $enregistrement['id_miel'];
    $Qte_miel = $enregistrement['Qte_miel'];




// requette pour recuperer le nom et prenom de l'eleve 
$stmt = $lien->prepare("SELECT nom_eleve,prenom_eleve FROM `eleves` WHERE id_eleve = :id_eleve");
$stmt->bindValue(':id_eleve', $id_eleve, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll();

foreach ($rows as $enregistrement) {
    $recup_nom_eleve = $enregistrement['nom_eleve'];
    $recup_prenom_eleve = $enregistrement['prenom_eleve'];

}



// requette pour recuperer le nom des miels
$stmt = $lien->prepare("SELECT nom_miel FROM miel WHERE id_miel = :id_miel");
$stmt->bindValue(':id_miel', $id_miel, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll();

foreach ($rows as $enregistrement) {
    $recup_nom_miel = $enregistrement['nom_miel'];

}



        echo("<tr class='tr_parent'>    
                <th class='th_parent'>".$id_commande."</th>
                <th class='th_parent'>".$recup_nom_eleve." ".$recup_prenom_eleve."</th>
                <th class='th_parent'>".$nom_client."</th>
                <th class='th_parent'>".$recup_nom_miel."</th>
                <th class='th_parent'>".$Qte_miel."</th>
            </tr>");


}