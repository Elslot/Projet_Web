<!DOCTYPE HTML>
<html>
	<head>
		<meta charset=\" utf-8\">
		<link rel="stylesheet" href="Recherche_Resultat.css">
 		<title>Recherche par Oeuvre</title>
	</head>
	<body><header>
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

<div id="bandeau"> <img src ="res/bandeau.jpg" alt="" width=100% height=98 /> </div>
</header>
		<div id="fondbody">
    		<form id="recherche_O" method="post" action="resultat_recherche_O.php">
        		<label id="l_nom_O">Nom de l'oeuvre</label><input name="nom_O" type="text"><br>
        		<input name="Rechercher" type="submit" value="Rechercher">
    		</form>
    	</div>
	</body>
</html>