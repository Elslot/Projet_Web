<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<title>Oeuvres trouvés</title>
	</head>
	<body>
  	<?php
			$oeuvre = $_POST["nom_O"];

			$driver = 'sqlsrv';
			$host = 'INFO-SIMPLET';
			$nomDB = 'Classique_Web';
			$user = 'ETD';
			$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDB";
			$pdo = new PDO($pdodsn, $user, $password);

			$requete = "Select Nom_Oeuvre From Oeuvre Where Titre_Oeuvre Like '$oeuvre%'";
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