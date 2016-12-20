<?php
$info = new SeanceDB($cnx);
$film = new FilmDB($cnx);
$texte=$info->getSeance();
$nbrT = count($texte);
?>
        <div class="container2">
            <div class="row">
                <div class="col-sm-12">
                 <h1 class="titreInfo">Programme</h1>
                </div>
            <div class="col-sm-12 col-lg-12">
                            <table>
                                    <?php
                                    for ($i = 0; $i < $nbrT; $i++) {
                                        $flim=$film->getFilmID($texte[$i]->id_film); 
                                        ?>     
                                            <?php
                                    print $flim[0]->titre;
                                             
                                             ?><img class="affiche" alt="affiche" src='./admin/images/affiches/<?php echo $flim[0]->affiche;?>'/>
                                             <?php
                                             
                                            print $info->getDate($texte[$i]->id_seance);?>
                                            <?php print $texte[$i]->heure?>
                                    <?php } ?>
                               
                           </table>
            </div>    
        </div>
