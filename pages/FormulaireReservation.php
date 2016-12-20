<?php
//traitement php formulaire
if(isset($_GET['reserver'])){
        $res=new ReservationDB($cnx);
        $reservation=$res->RechRes($_GET['id_seance'], $_SESSION['client']);
        if ($reservation==0)
        {
            $reservation2=$res->create($_GET['adulte'], $_GET['enfant'], $_GET['etudiant'], $_GET['id_seance'], $_SESSION['client']);
            if($reservation2!=0){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-dismissable alert-success">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                     Bravo!
                                    </h4>Vos données ont été modifiées! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
                            </div>
                    </div>
                        <?php
            }
            else
            {
                ?>
                    <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                            Oups!
                                    </h4> Une erreur a été rencontrée! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
                            </div>
                    </div>
                <?php
            }
        }
        else
        {
            ?>
                    <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                            Mais...
                                    </h4> Vous avez déjà reservé des places pour cette séance! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
                            </div>
                    </div>
                <?php
        }
}

if(!isset($_GET['id_seance'])){
    ?>
    <div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Mais...
                                    </h4> Vous n'avez choisi aucun film! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
			</div>
		</div>
<?php }

else {
$info = new SeanceDB($cnx);
$texte=$info->Read($_GET['id_seance']);
$film = new FilmDB($cnx);
$flim=$film->getFilmID($texte[0]->id_film); 
   ?>
<div class="container-fluid">
	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4 bord">
					<h3>
						<?php echo utf8_encode($flim[0]->titre);?>, le <?php print $info->getDate($texte[0]->id_seance)." "?> à <?php print $texte[0]->heure;?> 
					</h3>
					<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='get' id="form_auth_">
						<div class="form-group">
							 
							<label>
								Enfants
							</label>
							<input type="number" id="enf_" name="enfant"  min="0" max="20" class="form-control" />
						</div>
						<div class="form-group">
							 
							<label>
								Adultes
							</label>
							<input ttype="number" id="adu_" name="adulte" min="0" max="20" class="form-control" />
						</div>
                                                <div class="form-group">
							 
							<label>
								Etudiants
							</label>
							<input type="number" id="etu_" name="etudiant" min="0" max="20" class="form-control" />
						</div>
                                                <input type="hidden" name="id_seance" value="<?php print $_GET['id_seance'];?>"/>
						<input class="btn btn-primary" type="submit" name="reserver" id="reserver" value="Réserver mes places"/>
							
					</form>
                                    <br/>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

    <?php
    }
?>