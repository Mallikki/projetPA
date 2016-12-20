<?php
$info = new PrixDB($cnx);
?>
        <div class="container2">
            <div class="row">
                <div class="col-sm-12">
                 <h1 class="titreInfo">Infos pratiques</h1>
                </div>
                
            </div>
            <div class="row">
            <div class="col-sm-9">
                
               
                <h3 class="sstitre">Localisation</h3>
                <br/>Notre cinéma se trouve à deux pas du parc du Cinquantenaire!<br/><br/>
		Pour nous rejoindre en métro à partir de la gare centrale, prenez la ligne 1, direction Stockel et descendez à l'arrêt Mongtomery.
            </div>
                    <div class="col-sm-3">
                 <img class="img-responsive center-block devanture" src="./admin/images/devanture.jpg" alt="Devanture" />
                    </div> 
                </div>
            <div class="row">
            <div class="col-sm-12">
                <br/>
                <h3 class="sstitre">Adresse</h3>
                Rue du projecteur 8 <br/><br/>1000 Bruxelles
                
            </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <br/>
                <h3 class="sstitre">Tarifs</h3>
                Enfant: <?php $info->getPrixEnfant()?> <br/>
                Adulte: 
                <?php $info->getPrixAdulte() ?> <br/>
                Etudiant:
                <?php $info->getPrixEtudiant() ?> <br/>
            </div>
            </div>
             <div class="row">
            <div class="col-sm-12">
                <br/>
                <h3 class="sstitre">Heures d'ouverture</h3>
                De 11h30 à  20h30 
                
            </div>
            </div>
             <div class="row">
            <div class="col-sm-12">
               <br/> 
                <h3 class="sstitre">Contact</h3>
               +32 441/23.62.38<br/><br/>
               Une question? Une suggestion? Envoyez nous un mail <a href="mailto:lobjectif@gmail.com">ici !
                
            </div>
            </div>
            
        </div>

