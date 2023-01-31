
<?php
    
    if(isset($_GET['erreur']))
    {
        $err = $_GET['erreur'];
        if($err==1)
        {
            echo ("<div class='row'>
                    <div class='col-12' style='text-align:center;'>
                        <h2 style='color:red'>Email ou mot de passe incorrect</h2>
                    </div>
                </div>");
        }elseif($err==2)
        {
            echo ("<div class='row'>
                    <div class='col-12' style='text-align:center;'>
                        <h2 style='color:red'>Veuillez remplir les champs: <br> Email et mot de passe</h2>
                    </div>
                </div>");
        }
    }
?>

<div class="row">
    <div class="col-12 accueil_titre">
        <h2>Bonjour et bienvenue sur notre site !</h2><br>
        <img src="./images/logo.png" style="width: 100%;height:100%;">
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

