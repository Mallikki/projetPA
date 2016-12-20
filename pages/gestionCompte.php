<?php  
if(isset($_POST['modifier'])||isset($_POST['maj'])){ 
    $cli=new ClientDB($cnx);
    $client=$cli->read($_SESSION['client']);
    if (isset($_POST['maj'])){
        $cli=new ClientDB($cnx);
        $client=$cli->read($_SESSION['client']);
        $log = new ClientDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->maj($_POST['nom'], $_POST['prenom'], $_POST['pseudo'], $_POST['email'],$_SESSION['client']);
        if($retour!=0){
                    echo "Votre compte a bien été mis à jour!";?>
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
    <div class="container" id="inline">
    <form action="" method='post' id="">    
        <div class="row">
            <div class="log-sm-12"><h1 class="titreInfo">Mise à jour</h1><br/><br/></div>
        </div>
        <div class="row">
            <div class="col-sm-2">Nom : </div>
            <div class="col-sm-4"><input type="text" id="nom_" name="nom" value="<?php echo $client[0]->nom?>" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Prenom : </div>
            <div class="col-sm-4"><input type="text" id="orenom_" name="prenom" value="<?php echo $client[0]->prenom ?>" /></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Pseudo : </div>
            <div class="col-sm-4"><input type="text" id="pseudo_" name="pseudo" value="<?php echo $client[0]->pseudo ?>"/></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-2">Email : </div>
            <div class="col-sm-4"><input type="email" id="mail_" name="email" value="<?php echo $client[0]->email?>"/></div><br/><br/>
        </div>
        <div class="row">
            <div class="col-sm-4"><br/>
                <input type="submit" name="maj" id="maj" value="Mettre à jour" />&nbsp;&nbsp;&nbsp;
                <input type="reset" id="annuler" value="Réinitialiser" />
            </div>
        </div>       
        
    </form>
        
        <?php
    }
}
else if (isset($_POST['supprimer']))
{
        $log = new ClientDB($cnx);
        //function create($nom, $prenom,$pseudo,$email,$mdp)
        $retour = $log->delete($_SESSION['client']);
        if($retour==1){
                    echo "Votre compte a bien été supprimé!";
                    print "<meta http-equiv=\"refresh\": Content=\"0;URL=./pages/deconnexion.php\">";
        }
        else {
            $message = "Oups! Une erreur est survenue!";
            
            echo $message;
        } 
    }
else {
    $cli=new ClientDB($cnx);
$client=$cli->read($_SESSION['client']);
?>
<div class="container2">
            <div class="row">
                <div class="col-sm-12">
                 <h1 class="titreInfo">Gestion de votre compte</h1>
                </div>
                
            </div>
            <div class="row">
            <div class="col-sm-12">
                <h3 class="sstitre">Informations de votre compte</h3>
                <table class="table-responsive col-sm-6 col-lg-6">
                    <tr>
                        <td>Nom</td>
                        <td><?php echo $client[0]->nom?></td>
                    </tr>
                    <tr>
                        <td>Prenom</td>
                        <td><?php echo $client[0]->prenom?></td>
                    </tr>
                    <tr>
                        <td>Pseudo</td>
                        <td><?php echo $client[0]->pseudo?></td>
                    </tr>
                    <tr>
                        <td>Adresse Email</td>
                        <td><?php echo $client[0]->email?></td>
                    </tr>
                </table>
            </div>
  
            </div>
    <div class="row">
            <div class="col-sm-8"><br/>
           <form id="modifier" name="modifier" method="post"> 
                <input type="submit" name="modifier" value="Modifier mes informations" />&nbsp;&nbsp;&nbsp;
            </form>
                <form id="supprimer" name="supprimer" method="post">
                <input type="submit" name="supprimer" value="Supprimer mon compte" />
                </form>
            </div>
        </div> 
    </div>
<?php
}
