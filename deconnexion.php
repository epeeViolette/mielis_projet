

<?php


    //detruit la session en cours
    session_destroy();

    //redirection
    header("Location: ./index.php?page=accueil");
    exit;

?>
