<h1 style="margin-bottom: 60px;margin-left:20px;"><u>Ici se trouve les differents miels :</u></h1>


<?php


    $lien = connect_to_db();

    
    //Requette pour insert d'un nouveau véhicule dans la bdd

    $stmt = $lien->prepare('SELECT * FROM miel');
    $stmt->execute();
    $rows = $stmt->fetchAll();

    foreach($rows as $enregistrement) {

        $id_miel = $enregistrement['id_miel'];
        $nom_miel = $enregistrement['nom_miel'];
        $type_miel = $enregistrement['type_miel'];
        $provenance_miel = $enregistrement['provenance_miel'];
        $description_miel = $enregistrement['description_miel'];
        $image_miel = $enregistrement['image'];
        $prix_miel = $enregistrement['prix'];


    echo("<div class='col-3'>
                <figure>
                    <img style='margin:auto;width:100%;height:100%' src='./images/".$image_miel."'>
                    <figcaption><a href='./index.php?page=modification_produit&id=".$id_miel."'>".$nom_miel."</a></figcaption>
                    <strong>Type de miel:</strong>".$type_miel."
                    <strong>Provenance:</strong>".$provenance_miel."
                    <strong>Description:</strong>".$description_miel."
                    <strong>Prix:</strong>".$prix_miel."€
                </figure>
            </div>");
        

    }

    ?>


<div class="row">
    <div class="col-12" style="text-align: center;">
        <a class="btn btn-primary" type="button" href='./index.php?page=ajouter_produit' name="ajouter" >Ajouter un produit</a>
    </div>
</div>


