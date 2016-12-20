<?php
if(isset($_POST['submit_create'])){
    $log = new ClientDB($cnx);
    //function create($nom, $prenom,$pseudo,$email,$mdp)
    $retour = $log->create($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['mdp']);
    if($retour!=0){
        $_SESSION['client']=$retour;
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
<section id="message">
    <?php if (isset($message)) {print $message;} ?></section>
<div class="container-fluid">
	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4 bord">
					<h3>
						Inscription
					</h3>
					<form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth_">
						<div class="form-group">
							 
							<label>
								Nom
							</label>
							<input type="text" id="nom_" name="nom" class="form-control" />
						</div>
						<div class="form-group">
							 
							<label>
								Prenom
							</label>
							<input ttype="text" id="orenom_" name="prenom" class="form-control" />
						</div>
                                                <div class="form-group">
							 
							<label>
								Pseudo
							</label>
							<input type="text" id="pseudo_" name="pseudo" class="form-control" />
						</div>
                                                <div class="form-group">
							 
							<label>
								Email
							</label>
							<input type="email" id="mail_" name="email" class="form-control" />
						</div>
                                                <div class="form-group">
							 
							<label>
								Mot de passe
							</label>
							<input type="password" id="pass_" name="mdp" class="form-control" />
						</div>
						<button type="submit" name="submit_create" id="submit_create_" value="Minscrire">
							M'inscrire
						</button> 
					</form>
                                    <br/>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>