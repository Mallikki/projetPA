<?php
$client = new ClientDB($cnx);
$info = new VueReservationDB($cnx);
    $texte=$info->VueReservSelonClient($_GET['id_client']);
if ($texte!=0)
{
    $c = $client->read($_GET['id_client']);
    $nbrT = count($texte);
    ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 bord">
			<div class="page-header">
				<h1>
					Réservations de <?php print $c[0]->nom." ".$c[0]->prenom." (".$c[0]->pseudo.")"?>
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
                                      Ce client n'a aucune réservation pour le moment
				</h4> 
			</div>
		</div>
	</div>
<?php }  ?>