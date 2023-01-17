<?php


if (isset($_POST['ajouter'])) {

    $lien = connect_to_db();

    $stmt = $lien->prepare('INSERT INTO miel (nom_miel,type_miel,provenance_miel,description_miel,image,prix) values (:nom_miel,:type_miel,:provenance_miel,:description_miel,:image,:prix)');
    $stmt->bindValue(':nom_miel', $_POST['nom_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':type_miel', $_POST['type_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':provenance_miel', $_POST['provenance_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':description_miel', $_POST['description_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
    $stmt->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
    $stmt->execute();

    $erreur="";

    if (strlen($erreur) == 0) {
        echo ('<div class="alert alert-success" role="alert">Enregistrement avec succès !</div>');
    } else {
        echo ('<div class="col-12">' . $erreur . '</div>');
    }
}

?>



    <form action="./index.php?page=ajouter_produit" method="post">
        <div class="row" style="text-align: center;">
            <div class="col-12">
                <h3>Ajouter un produit:</h3>
            </div>

            <div class="row">
                <div class="col-12">
                    <label>Nom:</label>
                    <input type="text" name="nom_miel"/>
                </div>
                <div class="col-12">
                    <label>Type de miel:</label>
                    <input type="text" name="type_miel"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label>Provenance du miel:</label>
                    <input type="text" name="provenance_miel"/>
                </div>
                <div class="col-12">
                    <label for="description_miel">Description du miel:</label>
                </div>
                <div class="col-12">
                    <textarea type="text" id="description_miel" name="description_miel" rows="6" cols="50"></textarea>
                </div>
            </div>


            <!--------------à voir en cours pour recuperer une image à telecharger ----------------->
            <div class="row">
                <div class="col-12">
                    <label for="image" class="form-label">Image du produit:</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="col-12">
                    <label>Prix:</label>
                    <input type="text" name="prix"/>
                </div>
            </div>
            <!-------------------------------------------------------------------------------------->


            
            <div class="row">
                <div class="col-12">
                    <input class="btn btn-outline-primary" type="submit" name="ajouter" value="Ajouter">
                </div>
            </div>
        </div>
    </form>
