<?php
if (isset($_GET['ajout']))
{
    $seance= new SeanceDB($cnx);
    $s=$seance->getSeance();
    $nbre=count($s);
    $cpt=0;
    if ($_GET['datefilm']<date("Y-m-d"))
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
				</h4> La date sélectionnée ne doit pas être antérieure à celle d'aujourd'hui <a href="./index.php?page=programme" class="alert-link">   Retour</a>
			</div>
		</div>
	</div>
        <?php
        
    }
    else 
    {
        for ($i=0;$i<$nbre;$i++)
        {
            
            if ($s[$i]->heure==$_GET['chxheure'] && $s[$i]->num_salle==$_GET['chxsalle'] && $s[$i]->dat==$_GET['datefilm'])
            {
                $cpt++;
            }
        }
        if ($cpt>0)
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
                                    </h4> Une séance dans cette salle, cette heure et ce jour existe déjà! <a href="./index.php?page=creaSeance" class="alert-link">   Retour</a>
                            </div>
                    </div>
            </div>
            <?php
        }
        else
        {
            $creaS=$seance->create($_GET['chxfilm'], $_GET['chxsalle'], $_GET['chxheure'], $_GET['datefilm']);
            if ($creaS=!0)
            {
                ?>
                    <div class="col-md-12">
			<div class="alert alert-dismissable alert-success">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
				 Bravo!
				</h4>Votre séance a bien été crée! <a href="./index.php?page=creaSeance" class="alert-link">  Retour</a>
			</div>
		</div>
                <?php
            }
            else
            {
                ?>
            <div class="row">
                    <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                            Oups
                                    </h4>  Il semble y avoir une erreur quelque part...<a href="./index.php?page=creaSeance" class="alert-link">   Retour</a>
                            </div>
                    </div>
            </div>
                <?php
            }
        }
    }
    
}
 else {
    
$film= new FilmDB($cnx);
$f=$film->getAllFilm();
$nbreT=count($f);
?>
<div class="container-fluid">
	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 bord">
					<h3>
						Nouvelle séance
					</h3>
					<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
						<div class="form-group">
							 
							<label>
								Film
							</label>
                                                    <select name="chxfilm" id="chxfilm" class="form-control">
                                                        <?php
							for ($i = 0; $i < $nbreT; $i++) {
                                                        ?>                    
                                                        <option value="<?php print $f[$i]->id_film; ?>">
                                                            <?php print utf8_encode($f[$i]->titre)." - ".$f[$i]->note; ?>
                                                        </option>
                                                        <?php
                                                         }
                                                         ?>
                                                        </select>
						</div>
						<div class="form-group">
							 
							<label>
								Salle
							</label>
                                                        <select name="chxsalle" id="chxsalle" class="form-control">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
						</div>
                                                <div class="form-group">
							 
							<label>
								Heure
							</label>
                                                        <select name="chxheure" id="chxheure" class="form-control">
                                                            <option value="11:30">11:30</option>
                                                            <option value="14:30">14:30</option>
                                                            <option value="17:30">17:30</option>
                                                        </select>
                                                    </input>
						</div>
                                                <div class="form-group">
							 
							<label>
								Date
							</label>
							<input type="date" name="datefilm" id="datefilm" class="form-control" />
						</div>
						<button class="btn btn-primary" type="submit" name="ajout" id="ajout" value="Ajout">
							Ajouter
						</button> 
					</form>
                                    <br/>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } ?>