<?php


if (isset($_POST['modifier'])) {

    /*
    echo('<pre>');
    print_r($_FILES);
    echo('</pre>');
    */

    $lien = connect_to_db();

    $stmt = $lien->prepare('UPDATE miel SET nom_miel = :nom_miel,type_miel = :type_miel,provenance_miel = :provenance_miel,description_miel = :description_miel,prix = :prix WHERE id_miel =:id_miel');
    $stmt->bindValue(':nom_miel', $_POST['nom_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':type_miel', $_POST['type_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':provenance_miel', $_POST['provenance_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':description_miel', $_POST['description_miel'], PDO::PARAM_STR);
    $stmt->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
    $stmt->bindValue(':id_miel', $_POST['id_miel'], PDO::PARAM_INT);
    $stmt->execute();
    close_db($lien);
    $id=$_POST['id_miel'];

    if ($_FILES['image']['error']== 0) {

        $info = pathinfo($_FILES['image']['name']) ;
        //$filename = $info['filename'];
        $ext = $info['extension'];
        $nameOfFile = "photo_".$id.".".$ext;
    

        /*
        echo('<pre>');
        print_r($info);
        echo('</pre>');
        */

        //$b="./images/photo_".$id.".".pathinfo($_FILES['image']['name']['extension']);
        //echo ('<div class="alert alert-success" role="alert">Enregistrement avec succès !</div>');
        move_uploaded_file($_FILES['image']['tmp_name'],"./images/".$nameOfFile);

        $lien = connect_to_db();

        $stmt = $lien->prepare('UPDATE miel SET image = :image WHERE id_miel = :id');
        $stmt->bindValue(':image', $nameOfFile, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        close_db($lien);


        header('Location: ./index.php?page=produit_admin');

    } else {
        //echo ('<div class="col-12">' . $_FILES['image']['error']. '</div>');
        header('Location: ./index.php?page=produit_admin');
    }
} else {
    

    $id_miel = $_GET['id'];
    $lien = connect_to_db();

    //requette pour recuperer les nom des client
    $stmt = $lien->prepare('SELECT * FROM miel WHERE id_miel = :id_miel');
    $stmt->bindValue(':id_miel', $id_miel, PDO::PARAM_INT);
    $stmt->execute();
    close_db($lien);
    $rows = $stmt->fetchAll();

    foreach ($rows as $enregistrement) {
        $nom_miel_select = $enregistrement['nom_miel'];
        $type_miel_select = $enregistrement['type_miel'];
        $provenance_miel_select = $enregistrement['provenance_miel'];
        $description_miel_select = $enregistrement['description_miel'];
        $prix_miel_select = $enregistrement['prix'];
    }

?>



    <form action="./index.php?page=modification_produit" enctype="multipart/form-data" method="post">
        <div class="row" style="text-align: center;">
            <div class="col-12">
                <h3>Modification du produit:</h3>
            </div>

            <div class="row">
                <div class="col-12">
                    <label>Nom:</label>
                    <input type="text" name="nom_miel" value="<?php echo $nom_miel_select; ?>" />
                </div>
                <div class="col-12">
                    <label>Type de miel:</label>
                    <input type="text" name="type_miel" value="<?php echo $type_miel_select; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label>Provenance du miel:</label>
                    <input type="text" name="provenance_miel" value="<?php echo $provenance_miel_select; ?>" />
                </div>
                <div class="col-12">
                    <label for="description_miel">Description du miel:</label>
                </div>
                <div class="col-12">
                    <textarea type="text" id="description_miel" name="description_miel" rows="6" cols="50"><?php echo $description_miel_select; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="image" class="form-label">Image du produit:</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <div class="col-12">
                    <label>Prix:</label>
                    <input type="number" name="prix" value="<?php echo $prix_miel_select; ?>"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <input type="hidden" name="id_miel" value="<?php echo $id_miel; ?>"/>
                    <input class="btn btn-outline-success" type="submit" name="modifier" value="Modifier">
                    <a class="btn btn-danger" type="button" href='./index.php?page=supprimer_produit&id=<?php echo $id_miel; ?>' name="supprimer" >supprimer</a>
                    <a class="btn btn-outline-danger" type="button" name="retour" href="./index.php?page=produit_admin">Retour</a>
                </div>
            </div>
        </div>
    </form>
<?php

}

?>