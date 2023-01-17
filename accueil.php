


<div class="row">
    <div class="col-12 accueil_titre">
        <h2>Bonjour et bienvenue sur notre site !</h2><br>
        <img src="./images/logo.png" style="width: 700px;">
    </div>
</div>


<?php
    if(isset($_SESSION['identifiant'])){
    
        echo('<div class="row">
                <div class="col-12">
                    <h2 style="text-align:center;">Vous êtes désormais connecter !<h2>
                </div>
            </div>');
    }else{
        echo('<div class="row">
                <div class="col-12" style="text-align: center;">
                    <a class="btn btn-warning" href="./index.php?page=connexion">Se connecter</a>
                </div>
            </div>');
    }
?>

