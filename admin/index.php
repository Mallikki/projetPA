<!doctype html>
<?php
include ('./lib/php/adm_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <title>L'Objectif</title>
        <link rel="icon" href="./images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.7/dist/css/bootstrap.css" />
       <link rel="stylesheet" type="text/css" href="./lib/css/cinemaAdmin.css"/> 
        <script src="./lib/js/jquery-3.1.1.js"></script>
        <script src="./lib/css/bootstrap-3.3.7/dist/js/bootstrap.js"></script>
        <script src="./lib/js/functionsBtJquery.js"></script>
        <meta charset='UTF-8'/>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
               <?php
               if (isset($_SESSION['admin']))
               {
                if (file_exists('./lib/php/MenuAdmin.php')) {
                      include ('./lib/php/MenuAdmin.php');
                    }
               }
               else
               {
                   if (file_exists('./lib/php/connexionAdmin.php')) {
                      include ('./lib/php/connexionAdmin.php');
                    }
               }
                ?>   
               </div>
                <div class="col-sm-3"></div>
                <div class="row">
                <div class="col-sm-12">
                    
                    <section id="main">
                        <?php
                        if (isset($_SESSION['admin']))
                        {
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
                        }
                        ?>  
                    </section>
                </div>
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