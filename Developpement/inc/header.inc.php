<?php
require_once("inc/init.inc.php");
echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <title>Page d'accueil</title>
    <link rel=\"stylesheet\" href=\"inc/css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"inc/css/abeezecss.css\">
    <link rel=\"stylesheet\" href=\"inc/css/footer.css\">
    <link href=\"inc/css/carousel.css\" rel=\"stylesheet\" type=\"text/css\"/>
  </head>
  <body>
    <header>
      <div class=\"container\">
        <div class=\"row align-items-center\">
          <div class=\"col-7\">
            <img class=\"logo\" src=\"inc/img/logo.png\" alt=\"Logo anysol\">
          </div>
          <div class=\"col-2\">
          </div>
          <div class=\"col-2\">
            <form class=\"cherche\" method=\"post\">
              <input type=\"text\" name=\"recherche\" value=\"Rechercher\">
             </form>
             <div class=\"break\"></div>
             <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
					";

if(!isset($_SESSION['UserID'])){
    echo "
						<form method=\"POST\" action=\"connexion.php\">
						<input type=\"email\" name=\"UserMail\" placeholder=\"adresse mail\"/>
						<input type=\"password\" name=\"UserPassword\" placeholder=\"mot de passe\"/>
						<input type=\"submit\" class=\"btn btn-outline-primary btn-sm\" value=\"Connexion\" name='connexion'/>
                        </form><br>
                        <a href=\"inscription.php\">Inscription</a>";
}
else {
    $requete_utilisateur = executeRequete("SELECT UserNom, UserPrenom FROM User_ WHERE UserID=".$_SESSION['UserID']);
    $liste_utilisateur = $requete_utilisateur -> fetch_assoc();

    echo "nom : ".$liste_utilisateur['UserNom']."<br>prenom : ".$liste_utilisateur['UserPrenom']."<br>
           <form method=\"POST\" action=\"".$_SERVER["PHP_SELF"]."\">
           <input type=\"submit\" value=\"Se déconnecter\" name='deconnexion'/>
           </form><br>";
}
echo "        </div>
            </div>
           </div>
        <div class=\"row\">
            <div class=\"col-md-10 offset-md-1\">
              <nav class=\"nav nav-fill\">
              <a class=\"nav-item nav-link bg-info text-white\" href=\"#\">Accueil</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"nouveaute.php\">Nouveaut&eacute;</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"#\">Cat&eacute;gories</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"pagecoute.php\">Albums</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"#\">Auteurs</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"Carousel.php\">Mon compte</a>
              </nav>
            </div>
        </div>
        </div>
    </header><br><br>";


// Déconnexion

if(!empty($_POST['deconnexion'])) {

    $_SESSION = array();  // on détruit les variables de session

    session_destroy(); // on détruit la session

    header('Location: index.php');  // on redirige l'utilisateur vers la page d'accueil
}

?>
