<?php
$info = new VueReservationDB($cnx);
$texte=$info->VueReservSelonClient($_SESSION['client']);
if ($texte!=0)
{
    $nbrT = count($texte);
?>

        <div class="container2">
            <div class="row">
                <div class="col-sm-12">
                 <h1 class="titreInfo">Vos réservations</h1>
                </div>
            <div id="list_de_trucs" class="table-responsive col-sm-12 col-lg-12">
                            <table>
                                <tr>
                                    <th class="titre_tableau_recap">Date</th>
                                    <th class="titre_tableau_recap">Salle</th>
                                    <th class="titre_tableau_recap">Heure</th>
                                    <th class="titre_tableau_recap">Film</th>
                                    <th class="titre_tableau_recap">Enfant</th>
                                    <th class="titre_tableau_recap">Adulte</th>
                                    <th class="titre_tableau_recap">Etudiant</th>
                                    <th class="titre_tableau_recap">Prix</th>
                                </tr>

                                    <?php
                                    for ($i = 0; $i < $nbrT; $i++) {
                                        ?>                    

                                                <tr>
                                                    
                                                    <td class="liste_tableau_recap"><?php $dat=$info->transform($texte[$i]->dat);
                                                                                            print $dat ?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->num_salle?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->heure?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->titre?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->enfant?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->adulte?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->etudiant?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->prix_total?></td>
                                                </tr>

                                    <?php } ?>
                               
                           </table>
                        </div>    
                    </div>
        </div>
<?php }
else
{
    ?>
    <div class="container2">
            <div class="row">
                <div class="col-sm-12">
                 <h1 class="titreInfo">Vous n'avez aucune réservation pour le moment</h1>
                </div>
            </div>
    </div>
<?php } ?>