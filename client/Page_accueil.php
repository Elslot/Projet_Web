

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
            <h2> <img src ="carre_accueil.png"/> Accueil </h2>  
 <?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])) 
    {
        echo "<div id=\"connection\"><p> Bonjour Visiteur, vous pouvez vous connecter en cliquant sur \" Compte \" dans le menu ci-dessus.</br>
        Pour essayer de vous connecter, utilisez le nom de compte Dupont, et le mot de passe dupont qui sont déjà enregistré dans la base. </p> </div>" ;
    }
    else 
    {
        echo "<div id=\"connection\"> Bonjour, vous êtes connecté sous l'identifiant de: M.".$_SESSION["NOM_USER"];
        echo "</div>";
    }
?>
<p> Bienvenue sur le nouveau site de vente en ligne de musique classique Quick Classic! </br> Retrouvez des exemplaires de toutes les musiques
 que vous préférez, simplement et rapidement en quelques clics <p>
        </div>

 
        <footer> <p> <a href="mentions_legales.html" title="" accesskey="">Mentions légales</a> </p> </footer> 
    </body>
</html>
