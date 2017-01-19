<?php
    $Password = $_REQUEST["Password"];
    $Login=$_REQUEST["Login"];
    // recherche si l'utilisateur est enregistré et possède le bon mot de passe

    $count = 'null';
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDB = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    $pdodsn = "$driver:Server=$host;Database=$nomDB";
    $pdo = new PDO($pdodsn, $user, $password);
    $requete = "Select  * from Abonné where Login ='".$Login."' and Password ='".$Password."'";
    foreach ($pdo->query($requete) as $row)
    {
        $count = 'notnull';
        session_start();
        $_SESSION["NOM_USER"]= $row['Login'] ;
        header("Location:../client/Page_accueil.php");
    }
    if ($count == 'null')
    {
        header("Location: ../client/connexion.php");
    }

$pdo = null;
    
?>