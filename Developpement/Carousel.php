<?php
include("inc/header.inc.php");

$requete_utilisateur = executeRequete("SELECT * FROM User_ WHERE UserID=".$_SESSION['UserID']);
$liste_utilisateur = $requete_utilisateur -> fetch_assoc();

if($_POST){
    debug($_POST);
    // on récupère les données

    $identifiant = replace($_POST['identifiant']);
    $mot_de_passe = replace($_POST['mot_de_passe']);
    $nom = replace($_POST['nom']);
    $prenom = replace($_POST['prenom']);
    $date_de_naissance = $_POST['date_de_naissance'];
    $civilite = replace($_POST['civilite']);
    $telephone = replace($_POST['telephone']);
    $mail = replace($_POST['mail']);
    $adresse = replace($_POST['adresse']);
    $ville = strtoupper(replace($_POST['ville']));
    $code_postal = replace($_POST['code_postal']);

    $requete_verification = executeRequete("SELECT UserID, UserMail, UserPassword FROM logininfo");  // on recupere les donnes de connexion
    $liste_verification = $requete_verification -> fetch_assoc();  // on stock chaque colonne dans une case de tableau

    $inscription = TRUE;
    $erreur = FALSE;

    foreach ($requete_verification as $liste_verification){ // on compare les donnes de l'utilisateur avec les données de la bdd
        if ($identifiant == $liste_verification['UserMail']){
            if ($liste_verification['UserID']!= $_SESSION['UserID']){
                $inscription = FALSE;
            }
        }
    }

    if ($inscription == TRUE){ // Si l'identifiant saisi par l'utilisateur n'existe pas


        $requete_user = executeRequete("UPDATE User_ SET UserNom='" . $UserNom . "', UserPrenom='" . $UserPrenom . "', UserBirthdate='" . $UserBirthdate . "', UserTel='" . $UserTel . "', UserSex='" . $UserSex . "' WHERE UserID='" . $_SESSION['UserID'] . "'");

        if (!$requete_utilisateur){
            $erreur = TRUE;
        }

        header('Location: Carousel.php'); // on redirige l'utilisateur

    }
}

echo '
            
                <section class="row" id="content">
                    <form method="post" action="'.$_SERVER["PHP_SELF"].'?info=utilisateur" enctype="multipart/form-data" class="inscrip">
                        <table class="tableinscrip">
                            <tr>
                                <td>
                                    <label for="identifiant">Identifiant</label>
                                </td>
                                <td>
                                    <input type="text" id="identifiant" name="identifiant" required="required" value="'.$liste_utilisateur['identifiant'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="mot_de_passe">Mot de passe</label>
                                </td>
                                <td>
                                    <input type="password" id="mot_de_passe" name="mot_de_passe" required="required" value="'.$liste_utilisateur['mot_de_passe'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="nom">Nom</label>
                                </td>
                                <td>
                                    <input type="text" id="nom" name="nom" value="'.$liste_utilisateur['nom'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="prenom">Prenom</label>
                                </td>
                                <td>
                                    <input type="text" id="prenom" name="prenom" value="'.$liste_utilisateur['prenom'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date_de_naissance">Date de naissance</label>
                                </td>
                                <td>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" value="'.$liste_utilisateur['date_de_naissance'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="civilite">Civilité</label>
                                </td>
                                <td>
                            ';

if($liste_utilisateur['civilite']== 'm'){
    echo ' <input type="radio" id="civilite" name="civilite" value="m" checked="checked"/>Homme
                                    <input type="radio" id="civilite" name="civilite" value="f"/>Femme<br><br>';
}
else{
    echo ' <input type="radio" id="civilite" name="civilite" value="m"/>Homme
                                    <input type="radio" id="civilite" name="civilite" value="f" checked="checked"/>Femme<br><br>';
}

echo '
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="telephone">Téléphone</label>
                                </td>
                                <td>
                                    <input type="text" id="telephone" name="telephone" value="'.$liste_utilisateur['telephone'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="mail">E-mail</label>
                                </td>
                                <td>
                                    <input type="email" id="mail" name="mail" value="'.$liste_utilisateur['mail'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="adresse">Adresse</label>
                                </td>
                                <td>
                                    <input type="text" id="adresse" name="adresse" value="'.$liste_utilisateur['adresse'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="ville">Ville</label>
                                </td>
                                <td>
                                    <input type="text" id="ville" name="ville" value="'.$liste_utilisateur['ville'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="cp">Code postal</label>
                                </td>
                                <td>
                                    <input type="text" id="cp" name="code_postal" value="'.$liste_utilisateur['code_postal'].'" required="required"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                
                                </td>
                                <td>
                                    <input type="submit" value="Modifier" name="modifier"/>
                                </td>
                            </tr>
                        </table>
                    </form><br>
                </section>
            ';
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Nouveautés</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link href="inc/css/carousel.css" rel="stylesheet" type="text/css"/>
	</head>

<body>
	<div class="container">
	<div class="row">
	<div class="profil">
						<img class="photo_user" src="inc/img/photo_user.png" alt="photo_user"/>
	</div>
<div class="information">
	<p>Pseudo:_______________________</p>
	<p>Nom:_______________________</p>
	<p>Adresse:_______________________</p>
	<p>Parametres:_______________________</p>
</div>
</div>
<br><br>
<div class="row TEST">
<div class="abc">
	<p class="p">Suggestion personnalisées</p>
</div>
</div>
</div>
<br>
	<div id="carouselExampleIndicators" class="carousel" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
     <img class="d-blocks" src="inc/img/riri.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="inc/img/un.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block" src="inc/img/deux.jpg" alt="Third slide">
    </div>
	<div class="carousel-item">
      <img class="d-block" src="inc/img/placeholder.jpg" alt="Second slide">
    </div>
	<div class="carousel-item">
      <img class="d-block" src="inc/img/adele.jpg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="container">
  <h2>Mes listes</h2>
  <ul class="list-group"> 	<a href="#"></a>
    <li class="list-group-item"><a href="<?php echo $_SERVER["PHP_SELF"].'?recent=true'; ?>">Récemment écouté</a></li>
  <!--  <li class="list-group-item"><a href="#">Coups de coeur</a></li> -->
    <li class="list-group-item"><a href="<?php echo $_SERVER["PHP_SELF"].'?musique=true'; ?>">Ma musique</a></li>
      <li class="list-group-item"><a href="<?php echo $_SERVER["PHP_SELF"].'?playlist=true'; ?>">Playlists</a></li>
      <?php

      if (isset($_GET['playlist'])) {
          $requete_musique = executeRequete("SELECT musiqueNom FROM musique");
          $liste_musique = $requete_musique -> fetch_assoc();

          echo " <form method=\"POST\" action=\"".$_SERVER["PHP_SELF"]."\"><br><table border=\"1\">";
          echo '<input type="text" name="nomPlaylist" placeholder="nom de la playlist"/><br>';
          echo '<textarea name="descPlaylist" placeholder="description"></textarea>';
          foreach ($requete_musique as $liste_musique) {

              $curseur = current($liste_musique);

              echo '<tr><td>';
              echo $curseur;
              echo '</td><td>';
              echo '<input type="checkbox" name="'.$curseur.'"/>';
              echo '</td></tr>';

              $curseur = next($liste_musique);
          }
          echo '</table><input type="submit" name="ajouter" value="créer la playlist"/></form>';

      }

      ?>
    <li class="list-group-item"><a href="<?php echo $_SERVER["PHP_SELF"].'?album=true'; ?>">Albums</a></li>
    <li class="list-group-item"><a href="<?php echo $_SERVER["PHP_SELF"].'?artiste=true'; ?>">Artistes</a></li>
    <!--<li class="list-group-item"><a href="#">Mix</a></li> -->
    <!--<li class="list-group-item"><a href="#">Podcats</a></li>-->
  </ul>
</div>
<br><br><br><br><br><br><br><br><br>

    <?php
    include("inc/footer.inc.php");
    ?>