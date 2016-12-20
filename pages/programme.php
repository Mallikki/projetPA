<?php
$info = new SeanceDB($cnx);
$film = new FilmDB($cnx);
$texte=$info->getSeance();
$nbrT = count($texte);
?>
<div class="container-fluid">
         <?php
    for ($i = 0; $i < $nbrT; $i++) {
    $flim=$film->getFilmID($texte[$i]->id_film); 
     ?>  
	<div class="row bord">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<img class="affiche" alt="affiche" src='./admin/images/affiches/<?php echo $flim[0]->affiche;?>'/>
				</div>
				<div class="col-md-5">
					<h3>
						<?php print utf8_encode($flim[0]->titre);?>
					</h3>
					<p>
						<?php print utf8_encode($flim[0]->resume); ?>
					</p>
                                        <p>
						<?php print "Note: " .$flim[0]->note."/10"?>
					</p>
                                        <p>
						<?php print "Date de sortie: " .$flim[0]->sortie?>
					</p>
				</div>
				<div class="col-md-4">
					<h2>
						Séance
					</h2>
					<p>
                                           Date :     <?php print $info->getDate($texte[$i]->id_seance)." "?>
					</p>
					<p>
                                            Salle : <?php print $texte[$i]->num_salle;?>
					</p>
                                        <p>
						Heure : <?php print $texte[$i]->heure;?>
					</p>
				</div>
			</div>
		</div>
	</div>
    <?php } ?>
</div>