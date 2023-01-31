
<?php


if(isset($_POST['identifiant']) && isset($_POST['mdp']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'mielis';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['identifiant'])); 
    $mdp = mysqli_real_escape_string($db,htmlspecialchars($_POST['mdp']));
    
    if($email !== "" && $mdp !== "")
    {
        $requete = "SELECT count(*) FROM directeur where identifiant= '".$email."' and mdp= '".$mdp."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
        $_SESSION['identifiant'] = $email;
        header('Location: ./index.php?page=accueil');
        }
        else
        {
        header('Location: ./index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        echo('utilisateur ou mot de passe incorrect !');
        }
    }
    else
    {
    header('Location: ./index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
    header('Location: ./index.php?page=accueil');
}





?>