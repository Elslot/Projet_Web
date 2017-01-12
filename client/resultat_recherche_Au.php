<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<link rel="stylesheet" href="Recherche_Resultat.css">
		<title>Auteurs trouvés</title>
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

<div id="bandeau"> <img src ="../bandeau.jpg" alt="" width=100% height=98 /> </div>
</header>
	<div id="fondbody">
		<form id="recherche_Au" method="post" action="resultat_recherche_Au.php">
        		<label id="l_nom_Au">Nom de l'auteur</label><input name="nom_Au" type="text"><br>
        		<input name="Rechercher" type="submit" value="Rechercher">
    	</form>
  		<?php
			$auteur = $_POST["nom_Au"];

			$driver = 'sqlsrv';
			$host = 'INFO-SIMPLET';
			$nomDB = 'Classique_Web';
			$user = 'ETD';
			$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDB";
			$pdo = new PDO($pdodsn, $user, $password);

			$requete = "Select DISTINCT Nom_Musicien, Composer.Code_Musicien From Musicien join Composer on Musicien.Code_Musicien = Composer.Code_Musicien Where Nom_Musicien Like '$auteur%'";
			echo "<div id=\"resultats\">";
			echo "<ul>";
			foreach ($pdo->query($requete) as $row)
			{
				echo "<li>";
        		echo $row['Nom_Musicien']. "<br>";
				echo "</li>";
				echo "<img src='image.php?Code=" .$row ['Code_Musicien']. "&Type="Musicien"'/>";
			}
			echo "</ul>";
			echo "</div>";

    		$pdo = null;
		?>
	</div>
  </body>
</html>