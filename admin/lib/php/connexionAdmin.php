<?php
if(isset($_POST['submit_login'])){
    $log = new ClientDB($cnx);
    $retour = $log->isAuthorizedAdmin($_POST['login'], $_POST['mdp']);
    if(!$retour==0){
        $_SESSION['admin']=$retour;
		header('Location: ./index.php?page=accueil');    
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
				</h4> Vos informations de connexion sont erronées! <a href="./index.php?page=accueil" class="alert-link">Retour</a>
			</div>
		</div>
	</div>
                <?php
    }    
}

 else {
    
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12"><br><br><br><br></div>
    </div>
	<div class="row ">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3">
				</div>
				<div class="col-md-4 col-sm-4 col-xs-6 bord">
					<h3>
						Connexion
					</h3>
					<form action="" method='post' id="form_auth">
						<div class="form-group">
							 
							<label>
								Login
							</label>
							<input type="text" id="login" name="login" class="form-control" />
						</div>
						<div class="form-group">
							 
							<label for="exampleInputPassword1">
								Mot de passe
							</label>
							<input type="password" id="mdp" name="mdp" class="form-control" />
						</div>
						<button type="submit" class="btn btn-primary" name="submit_login" id="submit_login_" value="Me connecter">
							Me connecter
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