<?php

if (isset($_POST['oui'])) {

    
    $lien = connect_to_db();

    $stmt = $lien->prepare('DELETE FROM miel WHERE id_miel =:id_miel');
    $stmt->bindValue(':id_miel', $_POST['id_miel'], PDO::PARAM_INT);
    $stmt->execute();
    echo ('<div class="alert alert-success" role="alert">Suppression avec succès !</div>');

}else{
    $id_miel = $_GET['id'];
?>

<form action='./index.php?page=supprimer_produit' method="post">
<div class="row" style="text-align: center;">
    <div class="col-12">
        <h3><strong>Etes-vous sûr de vouloir supprimer ce produit?</strong></h3>
    </div>
    <div class="col-12">
        <input type="hidden" name="id_miel" value="<?php echo $id_miel; ?>"/>
        <input class="btn btn-danger" type="submit" name="oui" value="oui">
        <a class="btn btn-outline-success" type="button" href="./index.php?page=produit_admin" name="non">non</a>
    </div>
</div>
</form>

<?php
}
?>