<?php
if(isset($_POST['submit_login'])){
    $log = new ClientDB($cnx);
    $retour = $log->isAuthorizedAdmin($_POST['nom'], $_POST['mdp']);
    if(!$retour==0){
        $_SESSION['admin']=$retour;
		?>
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-success">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
				 Bravo!
				</h4>Vous êtes bien connecté(e)! <a href="./index.php?page=accueil" class="alert-link">Retour à l'accueil</a>
			</div>
		</div>
		<?php
    }
    else {
        ?>
                <div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					Attention
				</h4> Vos informations de connexion sont erronées!
			</div>
		</div>
	</div>
                <?php
    }    
}

 else {
    
?>

<section id="message"><?php if (isset($message)) //print $message; ?></section>
<section id="message">
    <?php if (isset($message)) print $message; ?></section>
<div class="container-fluid">
	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4 bord">
					<h3>
						Connexion
					</h3>
					<form action="" method='post' id="">
						<div class="form-group">
							 
							<label>
								Login
							</label>
							<input type="text" id="nom_" name="nom" class="form-control" />
						</div>
						<div class="form-group">
							 
							<label for="exampleInputPassword1">
								Mot de passe
							</label>
							<input type="password" id="pass_" name="mdp" class="form-control" />
						</div>
						<button type="submit" class="btn btn-primary" name="submit_login" id="submit_login_" value="Me connecter">
							Me connecter
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