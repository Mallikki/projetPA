<?php
if (isset($_GET['pdf']))
{
    $info = new VueReservationDB($cnx);
    $texte=$info->VueReservSelonClient($_SESSION['client']);
    $nbrT = count($texte);
    ob_start();
    ?>
    <link rel="icon" href="./admin/images/favicon.ico" />
       <link rel="stylesheet" type="text/css" href="./admin/lib/css/cinema.css"/> 
    <page class="fondpdf">
        <h1 class="titrepdf">Vos réservations</h1>
    <table class="tableaupdf">
        <tr>
            <th class="titrecellpdf" >Date</th>
            <th class="titrepasgros">Salle</th>
            <th class="titrepasgros">Heure</th>
            <th class="titrecellpdf">Film</th>
            <th class="titrepasgros">Enfant</th>
            <th class="titrepasgros">Adulte</th>
            <th class="titrepasgros">Etudiant</th>
            <th class="titrepasgros">Prix</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbrT; $i++) {
        ?>                   
        <tr>
            <td class="cellpdf"><?php $dat=$info->transform($texte[$i]->dat);print $dat ?></td>
            <td class="cellpdf"><?php print $texte[$i]->num_salle?></td>
            <td class="cellpdf"><?php print $texte[$i]->heure?></td>
            <td class="cellpdf"><?php print utf8_encode($texte[$i]->titre)?></td>
            <td class="cellpdf"><?php print $texte[$i]->enfant?></td>
            <td class="cellpdf"><?php print $texte[$i]->adulte?></td>
            <td class="cellpdf"><?php print $texte[$i]->etudiant?></td>
            <td class="cellpdf"><?php print $texte[$i]->prix_total?></td>
            </tr>
        <?php } ?>
    </table>
    </page>
    <?php
    $content=ob_get_clean();
    require_once('./admin/lib/php/html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P','A4','fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        ob_end_clean(); 
        $html2pdf->Output('réservations.pdf');
    } catch (Exception $ex) {
        die($ex);
    }
    
}
else 
{
$info = new VueReservationDB($cnx);
$texte=$info->VueReservSelonClient($_SESSION['client']);
if (isset($_GET['delete'])||isset($_GET['misaj'])||isset($_GET['ticket']))
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
    else if (isset($_GET['misaj']))
    {
    if (isset($_POST['modifier']))
    {
        $cli=new ClientDB($cnx);
        $client=$cli->read($_SESSION['client']);
        $log = new ReservationDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->maj($_POST['adulte'], $_POST['enfant'], $_POST['etudiant'], $_GET['id_res'], $client[0]->id_client);
        if($retour>0){
                    ?>
                    <div class="col-md-12">
			<div class="alert alert-dismissable alert-success">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
				 Bravo!
				</h4>Votre réservation a été modifée! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
			</div>
		</div>
                    <?php
        }
        else if ($retour=-1)
        {
            ?>
            <div class="row">
		<div class="col-md-12">
			<div class="alter alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
                                    Mais...
				</h4> Vous devez au moins réserver pour une personne!
			</div>
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
                    <div class="col-md-12 col-xs-12">
                            <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12 bord">
                                            <h3>
                                                   Modification de votre réservation
                                            </h3>
                                            <form method="post" id="form_res">
                                                    <div class="form-group">

                                                            <label>
                                                                    Enfants
                                                            </label>
                                                            <input type="text" id="enfant" value="<?php print $texte[0]->enfant?>" name="enfant"  class="form-control" />
                                                    </div>
                                                    <div class="form-group">

                                                            <label>
                                                                    Adultes
                                                            </label>
                                                            <input type="text" value="<?php print $texte[0]->adulte?>" id="adulte" name="adulte" class="form-control" />
                                                    </div>
                                                    <div class="form-group">

                                                            <label>
                                                                    Etudiants
                                                            </label>
                                                            <input type="text" id="etudiant" value="<?php print $texte[0]->etudiant?>" name="etudiant" class="form-control" />
                                                    </div>
                                                   <input class="btn btn-primary" type="submit" name="modifier" id="modifier" value="Modifier ma réservation"/>
                                            </form>
                                        <br/>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                    </div>
                            </div>
                    </div>
            </div>
    </div> <?php
    }
    }
    else
    {
        $info = new VueReservationDB($cnx);
        $texte=$info->read($_GET['id_res']);
        ob_start();
        ?>
        <link rel="icon" href="./admin/images/favicon.ico" />
           <link rel="stylesheet" type="text/css" href="./admin/lib/css/cinema.css"/> 
        <page class="fondpdf">
            <h1 class="titrepdf">Votre ticket pour "<?php print utf8_encode($texte[0]->titre)?>", le <?php $dat=$info->transform($texte[0]->dat);print $dat ?></h1>
        <table class="tableauticket">
            <tr class="rowticket">
                <td class="cllticket">Date : <?php $dat=$info->transform($texte[0]->dat);print $dat ?></td>
                <td class="cllticket">Adultes : <?php print $texte[0]->adulte?></td>
            </tr>
            <tr class="rowticket">
                <td class="cllticket">Salle : <?php print $texte[0]->num_salle?></td>
                <td class="cllticket">Enfants : <?php print $texte[0]->enfant?></td>
            </tr>
            <tr class="rowticket">
                <td class="cllticket">Heure: <?php print $texte[0]->heure?></td>
                <td class="cllticket">Etudiants: <?php print $texte[0]->etudiant?></td>
            </tr>
            <tr class="rowticket">
                <td class="cllticket">Film: <?php print utf8_encode($texte[0]->titre)?></td>
                <td class="cllticket">Prix: <?php print $texte[0]->prix_total?> </td>
            </tr>
        </table>
        </page>
        <?php
        $content=ob_get_clean();
        require_once('./admin/lib/php/html2pdf/html2pdf.class.php');
        try
        {
            $html2pdf = new HTML2PDF('P','A4','fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content);
            ob_end_clean(); 
            $html2pdf->Output('ticket.pdf');
        } catch (Exception $ex) {
            die($ex);
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
					Liste de vos réservations<a><form><input rel="tooltip" type="image" src="./admin/images/pdf.jpg" type="submit" name="pdf" id="pdf" value="Mettre à jour"/></form></a>
                                            
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
                                                              
                                                    <td><a rel="tooltip3"><form><input type="image" src="./admin/images/ticket.jpg" type="submit" name="ticket" id="ticket" value="ticket" />
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
<?php } } }
?>
