<?php
$info = new SeanceDB($cnx);
$film = new FilmDB($cnx);
$texte=$info->getSeance();
$nbrT = count($texte);
if (isset($_GET['delete']))
{
       $log = new SeanceDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->delete($_GET["id_seance"]);
        if($retour==1){
            
             unset($_get);
            ?>
           <div class="col-md-12">
			<div class="alert alert-dismissable alert-success">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
				 Bravo!
				</h4>La séance a bien été supprimée!
                                
			</div>
		</div>


            
<?php
        }
        else {
        unset($_get);
            ?>
             <div class="row">
		<div class="col-md-12">
			<div class="alter alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Oups!
				</h4> Une erreur est survenue
			</div>
		</div>
	</div>
           <?php
        } 
}
else
{
?>
<div class="container-fluid">
         <?php
    for ($i = 0; $i < $nbrT; $i++) {
    $flim=$film->getFilmID($texte[$i]->id_film); 
    $seance = $info->RechSeance($texte[$i]->id_seance);
     ?> 
	<div class="row reser">
            <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
		<div class="col-md-12 bord"  >
			<div class="row" >
				<div class="col-md-6">
					<h3>
						<?php print utf8_encode($flim[0]->titre);?>
					</h3>
                                        <p>
						<?php print "Date de sortie: " .$flim[0]->sortie?>
					</p>
                                        <p>
						<?php print "Réalisateur: " .$flim[0]->realisateur?>
					</p>
                                        <p>
                                           Date :     <?php print $info->getDate($texte[$i]->id_seance)." "?>
					</p>
				</div>
				<div class="col-md-6">					
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
                                           if ($seance==0)
                                           {
                                           ?>
                                                             <button type="submit" name="delete" id="delete" value="Supprimer la séance" class="btn btn-warning">
                                                                 <input type="hidden" name="id_seance" value="<?php print $texte[$i]->id_seance;?>"/> 
                                                                    Supprimer la séance
                                                            </button>
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
<?php } ?>