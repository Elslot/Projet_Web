<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<link rel="stylesheet" href="Recherche_Resultat.css">
		<title>Enregistrements trouvés</title>
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
        <?php
            echo "<h2> Contenu de l'album <i>\"" .$_GET['Nom']. "\"</i></h2>";

            $i = 1;

            $driver = 'sqlsrv';
            $host = 'INFO-SIMPLET';
            $nomDB = 'Classique_Web';
            $user = 'ETD';
            $password = 'ETD';
            $pdodsn = "$driver:Server=$host;Database=$nomDB";
            $pdo = new PDO($pdodsn, $user, $password);

            $requete = "Select DISTINCT Enregistrement.Titre, Enregistrement.Code_Morceau From Enregistrement 
                join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
                join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque
                Where Code_Album = " .$_GET['Code'];

            if($_GET['ASIN'] != null)
            {
                echo "<a href=\"DescAmazon.php?ASIN=".$_GET['ASIN']."\">Détails</a>";
            }
            else
            {
                echo "Les détails ne sont pas renseignés";
            }
            echo "<div id=\"resultats\">";
            echo "<ul>";
            foreach ($pdo->query($requete) as $row)
            {
                echo "<li>";
                echo "Enregistrement n°" .$i. " : <i>" .$row['Titre']."</i><br>";
                echo "<audio preload=auto src='enregistrement.php?Code=" .$row['Code_Morceau']. "' controls></audio>"; 
                echo "</li>";
                $i++;
            }
            echo "</ul>";
            echo "</div>";

            if ($i==1)
            {
                echo "Pas d'enregistrements";
            }

            $pdo = null;
        ?>
    </div>
  </body>
</html>