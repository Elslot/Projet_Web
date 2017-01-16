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
        <?php
            echo "<h2> Albums contenant les oeuvres de " .$_GET['Nom']. "</h2>";

            $i = 1;

            $driver = 'sqlsrv';
            $host = 'INFO-SIMPLET';
            $nomDB = 'Classique_Web';
            $user = 'ETD';
            $password = 'ETD';
            $pdodsn = "$driver:Server=$host;Database=$nomDB";
            $pdo = new PDO($pdodsn, $user, $password);

            $requete = "Select Album.Titre_Album From Album 
                join Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
                join Enregistrement on Composition.Code_Composition = Enregistrement.Code_Composition
                join Composition on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
                join Composition_Disque on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                join Composition_Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
                join Oeuvre on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
                join Composer on Musicien.Code_Musicien = Composer.Code_Musicien 
                join Musicien on 
                Where Code_Musicien = ".$_GET['Code'];
            echo "<div id=\"resultats\">";
            echo "<ul>";
            foreach ($pdo->query($requete) as $row)
            {
                echo "<li>";
                echo "Album n°" .$i. " : " .$row['Titre_Album']."<br>";
                echo "<img src='image.php?Code=" .$row ['Code_Album']. "&Type=Album&Type_photo=Pochette'/>";
                echo "</li>";
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
