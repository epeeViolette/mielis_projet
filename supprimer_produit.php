<?php

if (isset($_POST['oui'])) {

    $fileName = $_POST['filename']; 
    $id = $_POST['id_miel'];
    /*
    echo $fileName;
    echo '<br><br>';
    echo $id;
    */
    $lien = connect_to_db();

    $stmt = $lien->prepare('DELETE FROM miel WHERE id_miel =:id_miel');
    $stmt->bindValue(':id_miel', $id, PDO::PARAM_INT);
    $stmt->execute();
    close_db($lien);
    //echo ('<div class="alert alert-success" role="alert">Suppression avec succès !</div>');

    

    if (file_exists('./images/'.$fileName)) {
        //echo "Le fichier $fileName existe.";
        unlink('./images/'.$fileName);
        header('Location: ./index.php?page=produit_admin');

    } else {
        //echo "Le fichier $fileName n'existe pas.";
        header('Location: ./index.php?page=produit_admin');
    }

}else{
    $id_miel = $_GET['id'];

    $lien = connect_to_db();

    $stmt = $lien->prepare('SELECT image FROM miel WHERE id_miel =:id_miel');
    $stmt->bindValue(':id_miel', $id_miel, PDO::PARAM_INT);
    $stmt->execute();
    close_db($lien);

    $rows = $stmt->fetchAll();

    foreach ($rows as $enregistrement) {
        $fileName = $enregistrement['image'];
    }
    //echo $fileName;
    

    
?>

<form action='./index.php?page=supprimer_produit' method="post">
<div class="row" style="text-align: center;margin-top:100px;">
    <div class="col-12">
        <h3><strong>Etes-vous sûr de vouloir supprimer ce produit?</strong></h3>
    </div>
    <div class="col-12">
        <input type="hidden" name="id_miel" value="<?php echo $id_miel; ?>"/>
        <input type="hidden" name="filename" value="<?php echo $fileName; ?>"/>
        <input class="btn btn-danger" type="submit" name="oui" value="oui">
        <a class="btn btn-outline-success" type="button" href="./index.php?page=produit_admin" name="non">non</a>
    </div>
</div>
</form>

<?php
}
?>