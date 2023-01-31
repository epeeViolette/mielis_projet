

<form action="./index.php?page=verification" method="post" name="login">



    <main class="form-signin">
            <!--Envoie vers la page formulaire_recap_final une fois connecter-->
            <div class="col-12 ConnexElement" style="text-align: left;">                      
                    <h2><u>Connexion:</u></h2>  
            </div>   
            <!--Form renvoyant une fois la connexion effectuer vers le formulaire_recap-->
            <div class="LoginInput floatingInput">
                <label for="exampleInputEmail1">Email:</label>
                <input type="email" name="identifiant"  class="form-control" id="identifiant" aria-describedby="emailHelp" placeholder="exemple@xyz.fr">
            </div>
            <div class="LoginInput floatingInput">
                <label for="exampleInputEmail1">Mot de passe:</label>
                <input type="password" name="mdp" class="form-control" id="mdp" aria-describedby="emailHelp" placeholder="6 caractères minimum">
            </div>
            <div class="col-12">
                <input type="checkbox" class="far fa-eye-slash" onclick="Afficher()"> Afficher mot de passe</input>
            </div>
    </main>
                <div class="col-12 floatingInput" style="text-align:center;">
                    <button type="submit" class="btn btn-warning">Se connecter</button>
                </div>
                
</form>
<!-------------------------------------------------Debut du script pour afficherou cacher un mot de passe------------------------------------------------------------------------------>
                <script>
                function Afficher()
                { 
                var input = document.getElementById("mdp"); 
                if (input.type === "password")
                { 
                input.type = "text"; 
                } 
                else
                { 
                input.type = "password"; 
                } 
                } 
                </script>
                    
                    



