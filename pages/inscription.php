<?php
if(isset($_POST['submit_create'])){
    $log = new ClientDB($cnx);
    
    $retour=$log->RechCli($_POST['pseudo'],  $_POST['mdp']);
    if ($retour==0)
    {
        
        $retour2 = $log->create($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['mdp']);
        if($retour2!=0){
            $_SESSION['client']=$retour2;
                    ?>
                    <div class="col-md-12">
                            <div class="alert alert-dismissable alert-success">

                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            ×
                                    </button>
                                    <h4>
                                     Bravo!
                                    </h4>Votre compte a bien été créé! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
                            </div>
                    </div>
                    <?php
        }
        else {
        ?>
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Attention
				</h4> Votre compte n'a pas été créé, une erreur a été rencontrée! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
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
					Attention
				</h4> Un compte possédant ce pseudo et ce mot de passe a déjà été créé! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
			</div>
		</div>
                <?php
    }
}
else
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
					<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_inscription">
						<div class="form-group">
							 
							<label for="nom">
								Nom
							</label>
							<input type="text" id="nom" name="nom" class="form-control" />
						</div>
						<div class="form-group">
							 
							<label for="prenom">
								Prenom
							</label>
							<input ttype="text" id="prenom" name="prenom" class="form-control" />
						</div>
                                                <div class="form-group">
							 
							<label for="pseudo">
								Pseudo
							</label>
							<input type="text" id="pseudo" name="pseudo" class="form-control" />
						</div>
                                                <div class="form-group">
							 
							<label for="email">
								Email
							</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="aaa@aaa.aa" />
						</div>
                                                <div class="form-group">
							 
							<label for="mdp">
								Mot de passe
							</label>
							<input type="password" id="mdp" name="mdp" class="form-control" />
						</div>
						<button type="submit" name="submit_create" id="submit_create_" value="Minscrire">
							M'inscrire
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
<?php } ?>