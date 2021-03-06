<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
	<head>
		<link rel="stylesheet" href="Recherche_Resultat.css">
		<title>Albums trouvés</title>
	</head>
	<body><header>
    <h1>Quick Classic</h1>
<div>
    <ul id="menu">
        <li>    <a href="Page_accueil.php">Accueil</a></li>
        <li>    <a>Albums semblables</a>
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
            echo "<h2> Albums semblables à <i>\"" .$_GET['Nom']. "\"</i></h2>";

            $i = 1;

            $driver = 'sqlsrv';
            $host = 'INFO-SIMPLET';
            $nomDB = 'Classique_Web';
            $user = 'ETD';
            $password = 'ETD';
            $pdodsn = "$driver:Server=$host;Database=$nomDB";
            $pdo = new PDO($pdodsn, $user, $password);

            $requete = "Select DISTINCT Album.Titre_Album, Album.Code_Album, ASIN From Album 
                join Disque on Album.Code_Album = Disque.Code_Album
                join Composition_Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
                join Enregistrement on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                join Composition on Composition.Code_Composition = Enregistrement.Code_Composition
                join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
                join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
                join Composer on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
                Where Composer.Code_Musicien = (Select distinct Composer.Code_Musicien From Album 
                    join Disque on Album.Code_Album = Disque.Code_Album
                    join Composition_Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
                    join Enregistrement on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                    join Composition on Composition.Code_Composition = Enregistrement.Code_Composition
                    join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
                    join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
                    join Composer on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
                    Where Album.Code_Album = ".$_GET['Code'].")";
            echo "<div id=\"resultats\">";
            echo "<ul>";
            foreach ($pdo->query($requete) as $row)
            {
                echo "<li>";
                echo "<a href=\"enregistrements_par_album.php?Code=".$row ['Code_Album']."&Nom=".$row['Titre_Album']."&ASIN=".$row['ASIN']."\"> 
                Album n°" .$i. " : <i>" .$row['Titre_Album']."</i></a><br>";
                echo "<img src='image.php?Code=" .$row ['Code_Album']. "&Type=Album&Type_photo=Pochette'/>";
                echo "</li>";
                $i++;
            }
            echo "</ul>";
            echo "</div>";

            if ($i==1)
            {
                echo "Pas d'albums";
            }

            $pdo = null;
        ?>
    </div>
  </body>
</html>