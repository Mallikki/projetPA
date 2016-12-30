<?php  
if(isset($_POST['modifier'])||isset($_POST['maj']))
{ 
    $cli=new ClientDB($cnx);
    $client=$cli->read($_SESSION['client']);
    if (isset($_POST['maj'])){
        $cli=new ClientDB($cnx);
        $client=$cli->read($_SESSION['client']);
        $log = new ClientDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->maj($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'],$_SESSION['client']);
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
    else if (!isset($_POST['maj']))
    {       
    ?>
        <div class="container-fluid">
	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3">
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6 bord">
					<h3>
						Inscription
					</h3>
					<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_modifInfo">
						<div class="form-group">
							 
							<label>
								Nom
							</label>
							<input type="text" id="nom" name="nom" class="form-control" value="<?php echo $client[0]->nom?>" />
						</div>
						<div class="form-group">
							 
							<label>
								Prenom
							</label>
							<input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo $client[0]->prenom?>" />
						</div>
                                                <div class="form-group">
							 
							<label>
								Pseudo
							</label>
							<input type="text" id="pseudo" name="pseudo" class="form-control" value="<?php echo $client[0]->pseudo?>"/>
						</div>
                                                <div class="form-group">
							 
							<label>
								Email
							</label>
							<input type="email" id="email" name="email" class="form-control" value="<?php echo $client[0]->email?>" />
						</div>
						<button class="btn btn-primary" type="submit" name="maj" id="maj" value="Mettre à jour" value="Mettre à jour">
							Mettre à jour
						</button> 
					</form>
                                    <br/>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-3">
				</div>
			</div>
		</div>
	</div>
</div>
        
        <?php
    }
}
else if (isset($_POST['supprimer']))
{
    if (!isset($_POST['oui']))
    {
    ?><div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="blanc centre">Etes-vous sûr de vouloir supprimer votre compte?</h3>
            </div>
        </div>
        <div class="row">
                                   <div class="col-md-4 col-sm-4 col-xs-3">
                                   </div>
                                   <div>
                                       <div class="col-md-2 col-sm-4 col-xs-6">
                                           <form id="modifier" name="oui" method="post">
                                               <input type="hidden" name="supprimer"/>
                                                               <button  type="submit" name="oui" id="oui" value="Oui" class="btn btn-warning"">
                                                                       Oui
                                                               </button>
                                                                   </form>
                                       </div>
                                       <div class="col-md-2 col-sm-4 col-xs-6">
                                           <form id="supprimer" name="non" method="post">
                                                                <button type="submit" name="non" id="non" value="Non" class="btn btn-primary">
                                                                       Non
                                                               </button>
                                                                   </form>
                                       </div>
                   ²               </div>
                                   <div class="col-md-4 col-sm-4 col-xs-3">
                                   </div>
           </div>
    </div>
<?php
    }
    else
    {
        $log = new ClientDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->delete($_SESSION['client']);
        if($retour==1){
                    print "<meta http-equiv=\"refresh\": Content=\"0;URL=./pages/deconnexion.php\">";
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
}
else {
            $cli=new ClientDB($cnx);
        $client=$cli->read($_SESSION['client']);
        ?>
        <div class="container-fluid ">
                <div class="row ">
                        <div class="col-md-4 col-sm-4 col-xs-1">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-8 bord">
                                <h3>
                                        Vos informations
                                </h3>
                            
                            <dl>
						<dt>
							Nom
						</dt>
						<dd>
							<?php echo $client[0]->nom?>
						</dd>
						<dt>
							Prénom
						</dt>
						<dd>
							<?php echo $client[0]->prenom?>
						</dd>
					
						<dt>
							Pseudo
						</dt>
						<dd>
							<?php echo $client[0]->pseudo?>
						</dd>
						<dt>
							Email
						</dt>
						<dd>
							<?php echo $client[0]->email?>
						</dd>
					</dl>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-3">
                        </div>
                </div>
                <div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3">
				</div>
                                <div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <form id="modifier" name="modifier" method="post">
                                                            <button  type="submit" name="modifier" id="modifier" value="Modifier mes informations" class="btn btn-primary"">
                                                                    Modifier mes infos
                                                            </button>
                                                                </form>
                                    </div>
                                    <div class="col-md-2 col-sm-4 col-xs-6">
                                        <form id="supprimer" name="supprimer" method="post">
                                                             <button type="submit" name="supprimer" id="supprimer" value="Supprimer mon compte" class="btn btn-warning">
                                                                    Supprimer mon compte
                                                            </button>
                                                                </form>
                                    </div>
                ²               </div>
				<div class="col-md-4 col-sm-4 col-xs-3">
				</div>
			</div>
        </div>
        <?php } ?>