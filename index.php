<!doctype html>
<?php
include ('./admin/lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <title>L'Objectif</title>
        <link rel="icon" href="./admin/images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="./admin/lib/css/bootstrap-3.3.7/dist/css/bootstrap.css" />
       <link rel="stylesheet" type="text/css" href="./admin/lib/css/cinema.css"/> 
        <script src="./admin/lib/js/jquery-3.1.1.js"></script>
        <script src="admin/lib/js/jquery-validation-1.15.0/dist/jquery.validate.min.js" type="text/javascript"></script>
        <script src="./admin/lib/js/fonctionsJQUERY.js" type="text/javascript"></script>
        <script src="./admin/lib/js/messages.js" type="text/javascript"></script>
        <script src="./admin/lib/js/valeurs.js" type="text/javascript"></script>
        <script src="./admin/lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        
        <meta charset='UTF-8'/>
    </head>

    <body>
        <header >
            <div class="container">
                <div class="col-sm-12 col-lg-12 col-xs-3">
                <?php
                      if (!isset($_SESSION['client']))
                      {
                        if (file_exists('./lib/php/menuPasConnecte.php')) {
                          include ('./lib/php/menuPasConnecte.php');
                        }
                      }
                      else
                      {
                         if (file_exists('./lib/php/menuConnecte.php')) {
                          include ('./lib/php/menuConnecte.php');
                        } 
                      }


                    ?>   
                </div>
            </div>
        </header>
        <div class="container">
            
            <div class="col-sm-12 col-lg-12 col-xs-3">
                <?php 
                if (isset($_SESSION['client']))
                {
                $cli=new ClientDB($cnx);
                $pseudo=$cli->read($_SESSION['client']);
                print "<span class=\"blanc\">Bienvenue, </span><a href=\"./index.php?page=MesReservations\">" .$pseudo[0]->pseudo. "</a><br><br>";
                }
            ?>
            </div>
        </div>
        <div class="container">
            <div class="col-sm-12">
            
              
               </div>
            <div class="row">
                <div class="col-sm-12">
                    <section id="main">
                        <?php
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil";
                        }
                        if (isset($_GET['page'])) {
                          $_SESSION['page'] = $_GET['page'];
                        }
                        $path = './pages/' . $_SESSION['page'] . '.php';
                        if (file_exists($path)) {
                            include ($path);
                        }
                        else {
                            ?>
                            <span >La page demandée n'existe pas</span>
                            <meta http-refresh: Content="1;url=index.php?page=accueil"/>
                            <?php
                        }
                        ?>  
                    </section>
                </div>
            </div>
        </div>
                <div class="container">
            <div class="row">
            <footer class="footer">
                <?php
                if (file_exists('./lib/php/footer.php')) {
                    include ('./lib/php/footer.php');
                } 
                ?>  
            </footer>
            </div>
        </div>

    </body>
</html>