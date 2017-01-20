

<!DOCTYPE HTML>
<html>
<head>
    <meta charset=\" utf-8\">
    <link rel="stylesheet" href="Page_accueil.css">
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
            <h2> <img src ="res/carre_compte.png"/> A propos </h2>  
 
<p> Le site à été réalisé par ARNAUDEAU Kilian et BEURIER Corentin dans le cadre du Projet de Programmation Web qui a eu lieu durant le semestre 3 du DUT Informatique.</p>
    <p> Dans le dossier client sont ranger l'essentiel du front-office du site, au contraire du dossier serveur qui ne compte que les opérations de traitement et de requêtes de la base de données.
        Le panier d'achat n'est actuellement pas totalement fonctionnel. Tout le reste est fini malgré quelques erreurs persistantes lorsqu'un Album n'a pas de code ASIN. Il n'y a pas de redirection vers du contenu semblable dans ce cas là. Les recherches avec filtres (par auteur, oeuvre, album) sont terminées. L'affichage et l'écoute des enregistrement est lui aussi fait ainsi que l'affichage des détails Amazon.
        </p>
        </div>

 
        <footer> <p> <a href="mentions_legales.html" title="" accesskey="">Mentions légales</a> </p> </footer> 
    </body>
</html>
