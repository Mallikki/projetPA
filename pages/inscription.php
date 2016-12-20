<?php
if(isset($_POST['submit_create'])){
    $log = new ClientDB($cnx);
    //function create($nom, $prenom,$pseudo,$email,$mdp)
    $retour = $log->create($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'], $_POST['mdp']);
    if($retour!=0){
        $_SESSION['client']=$retour;
                echo "Votre compte a bien été créé!";?>
		
		<?php
    }
    else {
        $message = "Données incorrectes";
        echo $message;
    }    
}
else
{  

?>
<section id="message">
    <?php if (isset($message)) print $message; ?></section>
<div class="container" id="inline">
    <form action="" method='post' id="">    
        <div class="row">
            <div class="log-sm-12"><h1 class="titreInfo">Inscription</h1><br/><br/></div>
        </div>
        <div class="row">
            <div class="col-sm-2">Nom : </div>
            <div class="col-sm-4"><input type="text" id="nom_" name="nom" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Prenom : </div>
            <div class="col-sm-4"><input type="text" id="orenom_" name="prenom" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Pseudo : </div>
            <div class="col-sm-4"><input type="text" id="pseudo_" name="pseudo" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Email : </div>
            <div class="col-sm-4"><input type="email" id="mail_" name="email" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Mot de passe : </div>
            <div class="col-sm-4"><input type="password" id="pass_" name="mdp" /></div><br/><br/>
        </div>
        
        <div class="row">
            <div class="col-sm-4"><br/>
                <input type="submit" name="submit_create" id="submit_create" value="M'inscrire" />&nbsp;&nbsp;&nbsp;
                <input type="reset" id="annuler" value="Réinitialiser" />
            </div>
        </div>       
        
    </form>
</div>
<?php } ?>