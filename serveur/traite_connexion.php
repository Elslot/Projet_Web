<?php
    $Password = $_REQUEST["Password"];
    $Login=$_REQUEST["Login"];
    // recherche si l'utilisateur est enregistré et possède le bon mot de passe
    $conn = odbc_connect("Bibli", "ETD", "ETD", SQL_CUR_USE_ODBC) or die ("raté");
    $query = "Select * from Lecteur where Login ='".$Login."' and Password ='".$Password."'";
    $result = odbc_exec($conn,$query);
    if ($row = odbc_result($result,1)) {//utilisateur enregistré avec mot de passe correct
        session_start();
        $_SESSION["NOM_USER"]= odbc_result($result,3);
        odbc_close($conn);
        header("Location:../client/Page_accueil.php");
    }
    else
    {//Mot de passe (et/ou login) incorrect : rejet de l'utilisateur
        header("Location: ../client/connexion.php");
    }
?>