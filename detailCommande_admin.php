<h1 style="margin-bottom: 60px;margin-left:20px;"><u>Ici se trouve le detail des commandes :</u></h1>


<div class="row">
    <div class="col-12 capt_DO" style="margin-left: 0px;">
        <caption><h3><strong>Liste des Commandes :</strong></h3></caption><br><br>
        <table class="col-12 table_parent" id="table">
            <thead class='thead_parent'>
                <tr class='tr_parent'>
                    <th scope="col" class='th_parent'>idCommande</th>
                    <th scope="col" class='th_parent'>Nom Eleve</th>
                    <th scope="col" class='th_parent'>Nom client</th>
                    <th scope="col" class='th_parent'>Nom miel</th>
                    <th scope="col" class='th_parent'>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <?php include('./creation_tableau_commande.php'); ?>
                    
                
                
            </tbody>
        </table>
    </div>
</div>