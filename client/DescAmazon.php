require('AmazonECS.php'); //nom de la classe téléchargée
    const Aws_ID = "AAAAAAAAAAAAA"; // Identifiant
    const Aws_SECRET = "bbbbbbbb/dddddddddddddddd"; //Secret
    const associateTag="eeeeeeeee"; // AssociateTag
    $client = new AmazonECS(Aws_ID, Aws_SECRET, 'FR', associateTag);
    $category = $_POST["Category"];
    $title = $_POST['Titre'];
    $mode = $_POST['Mode'];
    if($mode == 'ASIN')
    {
        $response = $client->responseGroup('Large')->lookup($title);
        $items = $response["Items"];
        $it = $items["Item"];
        displayItem($it);
    }