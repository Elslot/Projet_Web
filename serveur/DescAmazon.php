<?php
require('../AmazonECS.php'); //nom de la classe téléchargée
    const Aws_ID = "AKIAIWL4MYIROQ36VBRQ"; // Identifiant
    const Aws_SECRET = "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"; //Secret
    const associateTag="quicclas-21"; // AssociateTag
    $client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
    $category = $_GET["Category"];
    $title = $_GET['Titre'];
    $mode = $_GET['Mode'];
    if($mode == 'ASIN')
    {
        $response = $client->responseGroup('Large')->lookup($title);
        $items = $response["Items"];
        $it = $items["Item"];
        displayItem($it);
    }
?>