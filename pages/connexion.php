<section id="message">
    <?php if (isset($message)) print $message; ?></section>
<div class="container" id="inline">
    <form action="" method='post' id="">    
        <div class="row">
            <div class="log-sm-12"><h1 class="titreInfo">Connexion</h1><br/><br/></div>
        </div>
        <div class="row">
            <div class="col-sm-2">Login : </div>
            <div class="col-sm-4"><input type="text" id="nom_" name="nom" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Mot de passe : </div>
            <div class="col-sm-4"><input type="password" id="pass_" name="mdp" /></div><br/><br/>
        </div>
        
        <div class="row">
            <div class="col-sm-4"><br/>
                <input type="submit" name="submit_login" id="submit_login_" value="Me connecter" />&nbsp;&nbsp;&nbsp;
                <input type="reset" id="annuler" value="Réinitialiser" />
            </div>
        </div>       
        
    </form>
</div>