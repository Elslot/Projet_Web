<?php
session_start();
    if (!isset($_SESSION["NOM_USER"])) {
        header("Location: ../client/connexion.php");
    }
    else
    {
    $user = $_SESSION["NOM_USER"];
    // recherche si l'utilisateur est enregistré et possède le bon mot de passe

    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDB = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    $pdodsn = "$driver:Server=$host;Database=$nomDB";
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "Select DISTINCT 
        Enregistrement.Code_Morceau From Enregistrement 
        join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
        join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque
        Where Code_Album = " .$_GET['CodeAlbum'];
    foreach ($pdo->query($requete) as $row)
    {
        $requete2 = "INSERT INTO Achat (Code_Engistrement, Code_Abonné) VALUES (".row['Code_Morceau'].",
        SELECT Code_Abonné FROM Abonné WHERE Nom_Abonné=".$_GET['NomAbonné'].")";
        header("Location:../client/panier_achat.php");
    }

$pdo = null;
    }
   
?>