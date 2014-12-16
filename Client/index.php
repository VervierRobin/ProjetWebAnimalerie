<!doctype html>
<?php
    //INDEX CLIENT
    include ('./lib/php/liste_include.php');
    $db = Connexion::getInstance($dsn, $user, $pass);
    session_start();
    $scripts = array();
    $i = 0;
    foreach (glob('../Admin/lib/js/jquery/*.js') as $js) {
        $scripts[$i] = $js;
        $i++;
    }
?>

<html>
    <head>
        <title>Client</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../Admin/lib/css/style_pc.css" />
        <link rel="stylesheet" type="text/css" href="../Admin/lib/css/style_jquery.css"/>
        <link rel="stylesheet" type="text/css" href="../Admin/lib/css/mediaqueries.css" />
        <?php
        foreach ($scripts as $js) {
            ?>
            <script type="text/javascript" src="<?php print $js; ?>">
            </script>
            <?php
        }
        ?>

            <!--<script src="../Admin/lib/js/fonctionsJqueryClient.js"></script>-->
    </head>
    <body>
        <section id="page">
            <header>
                <img src="../Admin/images/banniere_Projet.jpg" alt="banniere animalerie" />
                <br />
                <section id="deconnexion">
                    <?php
                    if (isset($_SESSION['client'])) {
                        ?>
                        <a href="./lib/php/disconnect.php">Déconnexion</a>
                        <?php
                    }
                    ?>
                </section>
            </header>
            <?php
            //$_SESSION['admin']="accueil";
            if (!isset($_SESSION['client'])) {
                ?>
                <section id="login_form">
                    <?php
                        require './pages/authentification.php';
                    ?>
                </section>
                <?php
            } else {
                ?>
                <section id="colGauche">
                    <nav>
                        <?php
                        if (file_exists('./lib/php/Cmenu.php')) {
                            include ('./lib/php/Cmenu.php');
                        }
                        ?>
                    </nav>
                </section>
                <section id="contenu">
                    <div id="main">
                        <?php
                        //quand on arrive sur le site 
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil";
                        }  //si on a cliqué sur un lien du menu
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                        $_SESSION['page'] = $_SESSION['page'];
                        if (file_exists('./pages/' . $_SESSION['page'] . '.php')) {
                            include ('./pages/' . $_SESSION['page'] . '.php');
                        }
                        ?>
                    </div>
                </section>

            </section> 
            <footer>
               Editeurs responsables : robin.vervier@condorcet.be - julien.lefevree@condorcet.be
            </footer>
            <?php
        } //fin session existe
        ?>
    </body>
</html>