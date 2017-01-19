<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<link rel="stylesheet" href="Recherche_Resultat.css">
		<title>Oeuvres trouvées</title>
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
		<form id="recherche_O" method="post" action="resultat_recherche_O.php">
        		<label id="l_nom_O">Nom de l'oeuvre</label><input name="nom_O" type="text"><br>
        		<input name="Rechercher" type="submit" value="Rechercher">
    	</form>
  		<?php
			$oeuvre = $_POST["nom_O"];

			$driver = 'sqlsrv';
			$host = 'INFO-SIMPLET';
			$nomDB = 'Classique_Web';
			$user = 'ETD';
			$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDB";
			$pdo = new PDO($pdodsn, $user, $password);

			$requete = "Select Titre_Oeuvre, Code_Oeuvre From Oeuvre Where Titre_Oeuvre Like '$oeuvre%'";
			echo "<div id=\"resultats\">";
			echo "<ul>";
			foreach ($pdo->query($requete) as $row)
			{
				echo "<li>";
        		echo "<a href=\"albums_par_oeuvre.php?Code=".$row ['Code_Oeuvre']."&Nom=".$row['Titre_Oeuvre']."\">".$row['Titre_Oeuvre']. "</a><br>";
				echo "</li>";
			}
			echo "</ul>";
			echo "</div>";

    		$pdo = null;
		?>
	</div>
  </body>
</html>