<?php
$info = new SeanceDB($cnx);
$titre = new FilmDB($cnx);
$texte=$info->getSeance();
$nbrT = count($texte);
?>
        <div class="container2">
            <div class="row">
                <div class="col-sm-12">
                 <h1 class="titreInfo">Programme</h1>
                </div>
            <div id="list_de_trucs" class="table-responsive col-sm-12 col-lg-12">
                            <table>
                                <tr>
                                    <th class="titre_tableau_recap">Titre</th>
                                    <th class="titre_tableau_recap">Date</th>
                                    <th class="titre_tableau_recap">Heure</th>
                                </tr>

                                    <?php
                                    for ($i = 0; $i < $nbrT; $i++) {
                                        ?>                    

                                                <tr>
                                                    <td class="liste_tableau_recap"><?php print $titre->getFilmID($texte[$i]->id_film);?></td>
                                                    <td class="liste_tableau_recap"><?php print $info->getDate($texte[$i]->id_seance);?></td>
                                                    <td class="liste_tableau_recap"><?php print $texte[$i]->heure?></td>
                                                </tr>

                                    <?php } ?>
                               
                           </table>
                        </div>    
                    </div>
        </div>
