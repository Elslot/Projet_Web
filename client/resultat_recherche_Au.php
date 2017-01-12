<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<title>Auteurs trouvés</title>
	</head>
	<body>
  	<?php
			$auteur = $_POST["nom_Au"];

			$driver = 'sqlsrv';
			$host = 'INFO-SIMPLET';
			$nomDB = 'Classique_Web';
			$user = 'ETD';
			$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDB";
			$pdo = new PDO($pdodsn, $user, $password);

			$requete = "Select Nom_Musicien From Musicien join Composer on Musicien.Code_Musicien = Composer.Code_Musicien Where Nom_Musicien Like '$auteur%'";
			echo "<ul>";
			foreach ($pdo->query($requete) as $row)
			{
				echo "<li>";
        		echo 'Titre : ' . $row['Titre_Album']. "<br>";
				echo "</li>";
			}
			echo "</ul>";

    		$pdo = null;
		?>
  </body>
</html>