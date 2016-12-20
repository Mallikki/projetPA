<?php
$info = new PrixDB($cnx);
?>
<div class="container-fluid bord">
	<div class="row ">
		<div class="col-md-4">
			<h2 class="centre">
				Localisation
			</h2>
			<p class="centre">
                            Notre cinéma se trouve à deux pas du parc du Cinquantenaire!<br/><br/>
                            Pour nous rejoindre en métro à partir de la gare centrale, prenez la ligne 1, direction Stockel et descendez à l'arrêt Mongtomery.
			</p>
		</div>
		<div class="col-md-4">
			<h2 class="centre">
				Adresse
			</h2>
			<p class="centre">
                            Adresse</h3>
                Rue du projecteur 8 <br/><br/>1000 Bruxelles
			</p>
		</div>
		<div class="col-md-4">
			<h2 class="centre">
				Tarifs
			</h2>
			<p class="centre">
                            Enfant: <?php $info->getPrixEnfant()?> €<br/>
                            Adulte: 
                            <?php $info->getPrixAdulte() ?> €<br/>
                            Etudiant:
                            <?php $info->getPrixEtudiant() ?> €<br/>
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-3">
			<h2 class="centre">
				Heures d'ouverture
			</h2>
			<p class="centre">
                            De 11h30 à  20h30 
			</p>
		</div>
		<div class="col-md-3">
			<h2 class="centre">
				Contact
			</h2>
			<p class="centre">
                            +32 441/23.62.38<br/><br/>
               Une question? Une suggestion? Envoyez nous un mail <a href="mailto:lobjectif@gmail.com">ici !
			</p>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>
