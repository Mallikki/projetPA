
<?php
$info = new VueReservationDB($cnx);
$texte=$info->VueReservSelonClient($_SESSION['client']);
if (isset($_GET['delete'])||isset($_GET['misaj']))
{
    if (isset($_GET['delete']))
    {
            $log = new ReservationDB($cnx);
            $retour = $log->delete($_GET['id_res']);
            if($retour==1){
                unset($_GET['delete']);
                        ?>

                    <div class="col-md-12">
                            <div class="alert alert-dismissable alert-success">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                     Bravo!
                                    </h4>Votre réservation à bien été supprimée<a href="./index.php?page=MesReservations" class="alert-link"> Voir vos réservations</a>
                            </div>
                    </div>
                    <?php
            }
            else {?>
                <div class="row">
                    <div class="col-md-12">
                            <div class="alert alert-dismissable alert-danger">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                    Oups
                                    </h4> Une erreur est survenue!
                            </div>
                    </div>
            </div>
    <?php
        } 
    }
    else
    {
    if (isset($_POST['modifier']))
    {
        $cli=new ClientDB($cnx);
        $client=$cli->read($_SESSION['client']);
        $log = new ReservationDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->maj($_POST['adulte'], $_POST['enfant'], $_POST['etudiant'], $_GET['id_res'], $client[0]->id_client);
        if($retour!=0){
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
        else {
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
        $info = new ReservationDB($cnx);
        $texte=$info->Read($_GET['id_res']);
        ?>
    
            <div class="container-fluid">
            <div class="row ">
                    <div class="col-md-12">
                            <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4 bord">
                                            <h3>
                                                   Modification de votre réservation
                                            </h3>
                                            <form method="post" id="form_auth_">
                                                    <div class="form-group">

                                                            <label>
                                                                    Enfants
                                                            </label>
                                                            <input type="number" id="enf_" value="<?php print $texte[0]->enfant?>" name="enfant"  min="0" max="20" class="form-control" />
                                                    </div>
                                                    <div class="form-group">

                                                            <label>
                                                                    Adultes
                                                            </label>
                                                            <input ttype="number" value="<?php print $texte[0]->adulte?>" id="adu_" name="adulte" min="0" max="20" class="form-control" />
                                                    </div>
                                                    <div class="form-group">

                                                            <label>
                                                                    Etudiants
                                                            </label>
                                                            <input type="number" id="etu_" value="<?php print $texte[0]->etudiant?>" name="etudiant" min="0" max="20" class="form-control" />
                                                    </div>
                                                   <input class="btn btn-primary" type="submit" name="modifier" id="modifier" value="Modifier ma réservation"/>
                                            </form>
                                        <br/>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                            </div>
                    </div>
            </div>
    </div> <?php
    }
    }
}
else {
    $info = new VueReservationDB($cnx);
    $texte=$info->VueReservSelonClient($_SESSION['client']);
if ($texte!=0)
{
    $nbrT = count($texte);
    ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 bord">
			<div class="page-header">
				<h1>
					Liste de vos réservations
				</h1>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th >Date</th>
                                                <th >Salle</th>
                                                <th >Heure</th>
                                                <th >Film</th>
                                                <th >Enfant</th>
                                                <th >Adulte</th>
                                                <th >Etudiant</th>
                                                <th >Prix</th>
                                                <th ></th>
                                                <th ></th>
					</tr>
				</thead>
				<tbody>
					<?php
                                    for ($i = 0; $i < $nbrT; $i++) {
                                        ?>                   
                                                <tr>
                                                    <td><?php $dat=$info->transform($texte[$i]->dat);print $dat ?></td>
                                                    <td><?php print $texte[$i]->num_salle?></td>
                                                    <td ><?php print $texte[$i]->heure?></td>
                                                    <td><?php print utf8_encode($texte[$i]->titre)?></td>
                                                    <td ><?php print $texte[$i]->enfant?></td>
                                                    <td><?php print $texte[$i]->adulte?></td>
                                                    <td><?php print $texte[$i]->etudiant?></td>
                                                    <td><?php print $texte[$i]->prix_total?></td>
                                                    
                                                    <td>
                                                        <a rel="tooltip2" > <form> <input rel="tooltip" type="image" src="./admin/images/modif.jpg" type="submit" name="misaj" id="misaj" value="Mettre à jour"/>
                                                                <input type="hidden" name="id_res" value="<?php print $texte[$i]->num_res;?>"/> </form></a></td>
                                                       
                                                      <td><a rel="tooltip" ><form><input type="image" src="./admin/images/supp.jpg" type="submit" name="delete" id="delete" value="Delete"/>
                                                              <input type="hidden" name="id_res" value="<?php print $texte[$i]->num_res;?>"/></form></a></td>
                                                     
                                                </tr>
                                    <?php } ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php }
else
{
    ?>
    <div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-info">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
                                      Vous n'avez aucune réservation pour le moment 
				</h4> <a href="./index.php?page=programme" class="alert-link">Voir le programme</a>
			</div>
		</div>
	</div>
<?php } } ?>
