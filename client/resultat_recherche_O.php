<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<title>Oeuvres trouvés</title>
	</head>
	<body>
  	<?php
			$prenom = $_POST["prenom"];
			$nom = $_POST["nom"];
			$login = $_POST["login"];
			$mdp = $_POST["password"];

			$driver = 'sqlsrv';
			$host = 'INFO-SIMPLET';
			$nomDB = 'Classique_Web';
			$user = 'ETD';
			$password = 'ETD';
			$pdodsn = "$driver:Server=$host;Database=$nomDB";
			$pdo = new PDO($pdodsn, $user, $password);

			$requete = "Insert INTO Abonné (Nom_Abonné, Prénom_Abonné, Login, Password) VALUES (:nom, :prenom, :login, :mdp)";
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