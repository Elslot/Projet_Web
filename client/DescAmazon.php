<!DOCTYPE html>
<html lang="fr">
<meta charset="utf-8"/>
    <head>
        <link rel="stylesheet" href="Recherche_Resultat.css">
        <title>Détails</title>
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
            require('../serveur/Amazon/lib/AmazonECS.class.php'); //nom de la classe téléchargée
            const Aws_ID = "AKIAIWL4MYIROQ36VBRQ"; // Identifiant
            const Aws_SECRET = "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"; //Secret
            const associateTag="quicclas-21"; // AssociateTag
            $client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
            $ASIN = $_GET['ASIN'];
            $response = $client->responseGroup('Large')->lookup($ASIN);

            if(isset($response->Items->Item->MediumImage->URL))
            {
                echo "<img src=\"" .$response->Items->Item->MediumImage->URL. "\"/><br>";
            } 
            if(isset($response->Items->Item->DetailPageURL))
            {
                echo "<u><a href=\"".$response->Items->Item->DetailPageURL."\">Page Amazon de l'album</a></u><br>";
            } 
            if(isset($response->Items->Item->ASIN))
            {
                echo "<b>ASIN : </b>".$response->Items->Item->ASIN. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->Title))
            {
                echo "<b>Titre : </b>".$response->Items->Item->ItemAttributes->Title. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->Binding))
            {
                echo "<b>Format : </b>" .$response->Items->Item->ItemAttributes->Binding. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->Brand))
            {
                echo "<b>Marque : </b>" .$response->Items->Item->ItemAttributes->Brand. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->Label))
            {
                echo "<b>Label : </b>" .$response->Items->Item->ItemAttributes->Label. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->ReleaseDate))
            {
                echo "<b>Date de sortie : </b>" .$response->Items->Item->ItemAttributes->ReleaseDate. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->ListPrice->FormattedPrice))
            {
                echo "<b>Prix : </b>" .$response->Items->Item->ItemAttributes->ListPrice->FormattedPrice. "<br>";
            } 
            if(isset($response->Items->Item->ItemAttributes->SalesRank))
            {
                echo "<b>Rang : </b>" .$response->Items->Item->ItemAttributes->SalesRank. "<br>";
            }
            if(isset($response->Items->Item->Tracks))
            {
                echo "<b>Titres : </b>";
                echo"<ol>";
                for($i = 0; $i < count($response->Items->Item->Tracks->Disc->Track); $i++)
                {
                    echo "<li>" .$response->Items->Item->Tracks->Disc->Track[$i]->_. "</li>";
                }
                echo "</ol>";
            } 
        ?>
    </div>
  </body>
</html>