
<?php

    

    //$_POST['login'] = 'dylan98';
    //$_POST['password'] = '123456';


    if(isset($_POST['login']) && isset($_POST['password'])){


        include('../connexion_bdd.php');
        
        $lien = connect_to_db();
        
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $login = $_POST['login']; 
        $mdp = $_POST['password'];
    
    if($login !== "" && $mdp !== "")
    {
    
        $requete =$lien->prepare("SELECT count(*) FROM eleves where identifiant_eleve= :nom_utilisateur and mdp_eleve= :mdp_utilisateur");  
        $requete->bindValue(':nom_utilisateur', $login, PDO::PARAM_STR);
        $requete->bindValue(':mdp_utilisateur', $mdp, PDO::PARAM_STR);
        $requete->execute();
        $rows = $requete->fetchAll();

        foreach($rows as $enregistresement){
            $count=$enregistresement['count(*)'];
        }

        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
            $requete =$lien->prepare("SELECT * FROM eleves where identifiant_eleve= :nom_utilisateur and mdp_eleve= :mdp_utilisateur");  
            $requete->bindValue(':nom_utilisateur', $login, PDO::PARAM_STR);
            $requete->bindValue(':mdp_utilisateur', $mdp, PDO::PARAM_STR);
            $requete->execute();
            $rows = $requete->fetchAll();
            
            $a =array(); 

        foreach($rows as $enregistresement){
            $a['id_eleve'] = $enregistresement['id_eleve'];
            $a['nom_eleve'] =  $enregistresement['nom_eleve'];
            $a['prenom_eleve'] =  $enregistresement['prenom_eleve'];
            $a['classe_eleve'] = $enregistresement['classe_eleve'];
            $a['identifiant_eleve'] = $enregistresement['identifiant_eleve'];
            $a['mdp_eleve'] = $enregistresement['mdp_eleve'];
        }

        echo "SUCCESS%".json_encode($a);
        }
        else
        {
        echo "ECHEC% Identifiants incorrects";  // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
    echo "ECHEC% Tous les champs sont requis" ; // utilisateur ou mot de passe vide
    }
}
else
{
    echo "ECHEC% Echec de connexion à la base de données";
}




    echo '<br> Bonjour';




?>

