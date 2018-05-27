<?php
require_once("inc/init.inc.php");
echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <title>AnYsol</title>

    <link rel=\"stylesheet\" href=\"inc/css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"inc/css/footer.css\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"inc/css/global.css\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">
      <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
      <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
  </head>
  <body class=\"bg-light\">
    <header>
      <div class=\"container-fluid bg-light\">
        <div class=\"row align-items-center\">
          <div class=\"col-3\">
            <img class=\"logo\" src=\"inc/img/logo.png\" alt=\"Logo anysol\">
          </div>
          <div class=\"col-6\">
          <form method=\"post\">
            <input type=\"text\" class=\"cherche\" name=\"recherche\" value=\"Rechercher\">
            <input class=\"boutoncherche bg-info\" type=\"button\" value=\"&#128269;\" />
           </form>
          </div>
          <div class=\"col-3\">
             <div class=\"break\"></div>
             <div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">
					";

if(!isset($_SESSION['UserID'])){
    echo "
						<form method=\"POST\" action=\"connexion.php\">
						<input type=\"email\" name=\"UserMail\" placeholder=\"adresse mail\"/>
						<input type=\"password\" name=\"UserPassword\" placeholder=\"mot de passe\"/><br>
						<input type=\"submit\" class=\"btn btn-outline-primary\" value=\"Connexion\" name='connexion'/>
            <a href=\"inscription.php\" class=\"insc btn btn-outline-primary\">Inscription</a>
                        </form><br>";
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
            <div class=\"col-md-12\">
              <nav class=\"nav nav-fill\">
              <a class=\"nav-item nav-link bg-info text-white\" href=\"index.php\">Accueil</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"nouveaute.php\">Nouveaut&eacute;</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"pagecoute.php\">Lecteur audio</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"#\">Albums</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"#\">Auteurs</a>
              <a class=\"nav-item nav-link bg-info text-white\" href=\"compte.php\">Mon compte</a>
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

include("fonction.php");
?>
