<?php
$info = new SeanceDB($cnx);
$film = new FilmDB($cnx);
$texte=$info->getSeance();
$nbrT = count($texte);
if (isset($_GET['reserver'])&&(!isset($_SESSION['client'])))
{
        ?>
                <div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Attention
				</h4> Vous devez être connecté avant de pouvoir réserver vos places
			</div>
		</div>
	</div>
                <?php
}
?>
<div class="container-fluid">
         <?php
    for ($i = 0; $i < $nbrT; $i++) {
    $flim=$film->getFilmID($texte[$i]->id_film); 
     ?> 
	<div class="row bord reser">
            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
		<div class="col-md-12"  >
			<div class="row" >
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
                                        <p>
						<?php print "Réalisateur: " .$flim[0]->realisateur?>
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
                                        <p>
						Places restantes : <?php print $texte[$i]->nbre_places_dispo;?>
					</p>
                                        <p>
                                            <?php
                                            if (isset($_SESSION['client']))
                                            { ?>
                                            <a class="btn btn-primary" href ="./index.php?id_seance=<?php print $texte[$i]->id_seance;?>&page=FormulaireReservation">Reserver</a>
                                            <?php
                                            }
                                                    ?>
                                        </p>
				</div>
			</div>
		</div>
        
    </form>
        </div>
    <?php } ?>
</div>