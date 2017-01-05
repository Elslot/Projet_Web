<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<title>Albums trouvés</title>
	</head>
	<body>
  	<?php
			$album = $_POST["nom_Al"];

			$driver = 'sqlsrv';
			$host = 'INFO-SIMPLET';
			$nomDB = 'Classique_Web';
			$user = 'ETD';
			$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDB";
			$pdo = new PDO($pdodsn, $user, $password);

			$requete = "Select Titre_Album From Albums Where Titre_Album Like '$album%'";
			echo "<ul>";
			foreach ($pdo->query($requete) as $row)
			{
				echo "<li>";
        		echo 'Titre : ' . $row['Titre_Album']. "<br>";
				echo "</li>";
			}
			echo "</ul>".

    		$pdo = null;
		?>
  </body>
</html>