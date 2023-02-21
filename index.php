    <?php

        /*****  voir l'info php et afficher les erreurs   *****/


        
        //phpinfo();
        //error_reporting(E_ALL);


        /*****************************************************/
        session_start();

        //variable stockant la page par defaut
        $page_a_afficher="accueil";

        //une condition permettant de définir la page par défaut à afficher à l'entrée sur le site
        if( isset($_GET['page']))
        {
                $page_a_afficher = $_GET['page'];

        }
    
        echo("5");
            
    include_once('./connexion_bdd.php');
        echo("6");
    ?>

<html>
    <head>
        <title> MIELIS</title>
        <!-- ce lien vers le css local necessaire pour bootstrap  -->
        <link rel="stylesheet" href="./bootstrap/5.1.2/css/bootstrap.min.css">
        <!-- ce lien vers le JS local necessaire pour bootstrap  -->
        <script src="./bootstrap/5.1.2/js/bootstrap.bundle.min.js"></script>
        <!-- mon css perso pour inclure les polices de caracteres -->
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/index.css" class="css">
    
    </head>
    <!-- le script(div=calque) -->
     <body>  
            <div id="header">
                <nav class="navbar navbar-expand-sm navbar-light ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php?page=accueil" style="font-size: 30px;"><img src="./images/titre.png"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <?php
                                        if(isset($_SESSION['identifiant'])){
                                            echo('<li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="index.php?page=produit_admin">Nos miels</a>
                                                </li>');
                                        }else{
                                            echo('<li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="index.php?page=produit">Nos miels</a>
                                                </li>');
                                        }
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="index.php?page=a_propos">A propos de nous</a></li>
                                    </li> 

                                    <?php
                                        if(isset($_SESSION['identifiant'])){
                                            echo('<li class="nav-item">
                                                    <a class="nav-link active btn btn-danger" aria-current="page" href="index.php?page=deconnexion">Se déconnecter</a>
                                                </li>');
                                        }
                                    ?>
                                </ul>
                            </div>
                    </div>
                </nav>
            </div>
            

            <!-- "content" va servir à parametrer le corps de la page-->
            <div id="content" class="row" style="margin-right: 0px;margin-left: 0px;">

            <?php
            //ici dans le body sera la page par defaut à afficher
                include ( $page_a_afficher.".php");
            ?>
                
            </div>

            <!-- "footer" va servir à parametrer le bas de la page-->
            <div id="footer">
                <div class="gauche"><strong>Projet "Mielis" BTS SIO</strong></div>
                <a href="./mentions_legales/mensions_legales.pdf" target="blank">Mentions légales du site</a>
                <div class="droite">Copyright © 2023 <br> DYLAN OIKNINE -- SIMEON FRIEDRICH</div>
            </div>

            </div>  
            
    </body>
</html> 
