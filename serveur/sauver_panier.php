<?php

	$_SESSION['ListeAchat'] = array('a'=>1);
    array_push($_SERVEUR['ListeAchat'],$_GET["CodeEnr"]);
    header("Location:".$_GET["url"]);
    
    
?>