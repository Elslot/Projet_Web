
<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])) 
    {
    $url = $_SERVER["REQUEST_URI"];
    header("Location: connexion.php?url=".$url);
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=\" utf-8\">
    <link rel="stylesheet" href="Page_accueil.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <h1>Quick Classic</h1>

        <div>
            <ul id="menu">
                <li>    <a href="Page_accueil.php">Accueil</a></li>
                <li>    <a>Album</a>
                    <ul>    
                        <li><a href="recherche_par_auteur.php">Recherche par Auteur</a></li>
                        <li><a href="recherche_par_album.php">Recherche par Album</a></li>
                        <li><a href="recherche_par_oeuvre.php">Recherche par Œuvre</a></li>
                    </ul>
                </li>
                <li>    <a href="panier_achat.php">Mon Panier</a></li>
                <li>    <a href="compte.php">Mon Compte</a></li>
                <li>    <a href="A_propos.php">A propos</a></li>
            </ul>
        </div>

        <div id="bandeau"> <img src ="bandeau.jpg" alt="" width=100% height=100/> </div>
    </header>

        <div id="fondbody">
            <h2> <img src ="res/carre_panier.png"/> Votre Panier </h2>  


        </div>

 
        <footer> <p> <a href="mentions_legales.html" title="" accesskey="">Mentions légales</a> </p> </footer> 
    </body>
</html>
