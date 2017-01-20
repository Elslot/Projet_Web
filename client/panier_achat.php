
<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])) 
    {
    $url = $_SERVER["REQUEST_URI"];
    header("Location: connexion.php?url=".$url);
    }
    else {
        $user = $_SESSION["NOM_USER"];
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=\" utf-8\">
    <link rel="stylesheet" href="panier_achat.css">
    <title>Accueil</title>
</head>
<body>
    <header>
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

        <div id="bandeau"> <img src ="res/bandeau.jpg" alt="" width=100% height=100/> </div>
    </header>

        <div id="fondbody">
            <h2> <img src ="res/carre_panier.png"/> Votre Panier </h2>  


        </div>
    <?php
    if (isset($_GET['CodeAlbum'])){
        
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDB = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    $pdodsn = "$driver:Server=$host;Database=$nomDB";
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "Select DISTINCT 
        Enregistrement.Code_Morceau, Enregistrement.Titre, Enregistrement.Prix
        From Enregistrement 
        join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
        join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque
        Where Code_Album = " .$_GET['CodeAlbum'];
    foreach ($pdo->query($requete) as $row)
    {
    echo 'Enregistrement '.$row['Code_Morceau'];
    echo '<tr>';
    echo'<td>'.$row['Code_Morceau'].'</td>';
    echo'<td>'.$row['Titre'].'</td>';
    echo'<td>'.$row['Prix'].'</td>';
    echo '</tr>';
    }
    echo '<tr>'.$_GET['CodeEnr'].'<td>';
}
?>

    </body>
</html>
