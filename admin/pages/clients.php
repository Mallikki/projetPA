<?php
$info = new ClientDB($cnx);
    $texte=$info->readAll();
if ($texte!=0)
{
    $nbrT = count($texte);
    ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 bord">
			<div class="page-header">
				<h1>
					Liste de vos clients
				</h1>
                            <h4> Cliquez sur l'un d'entre eux pour voir ses réservations</h4>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th >Nom</th>
                                                <th >Prenom</th>
                                                <th >Email</th>
                                                <th >Pseudo</th>
					</tr>
				</thead>
				<tbody>
					<?php
                                    for ($i = 0; $i < $nbrT; $i++) {
                                        ?>           
                                                <tr>
             
                                                    <td><a href="./index.php?id_client=<?php print $texte[$i]->id_client;?>&page=ResParCli"><?php print $texte[$i]->nom ?></a></td>
                                                    <td><?php print $texte[$i]->prenom?></td>
                                                    <td ><?php print $texte[$i]->email?></td>
                                                    <td ><?php print $texte[$i]->pseudo?></td>
                              
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
                                      Dommage mais...
				</h4> Vous n'avez pas de client pour le moment<a href="./index.php?page=accueil" class="alert-link">Voir le programme</a>
			</div>
		</div>
	</div>
<?php } ?>