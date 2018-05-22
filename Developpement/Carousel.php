<?php
include("fonction.php");require_once("inc/fonction.inc.php");
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
    <li class="list-group-item"><a href="<?php echo $_SERVER["PHP_SELF"].'?playlist=true'; ?>">Playlists</li>
      <?php

      if (isset($_GET['playlist'])) {
          $requete_musique = executeRequete("SELECT musiqueNom FROM musique");
          $liste_musique = $requete_musique -> fetch_assoc();

          echo " <form method=\"POST\" action=\"".$_SERVER["PHP_SELF"]."\"><br><table border=\"1\">";
          echo '<input type="text" name="nomPlaylist" placeholder="nom de la playlist"/>';
          foreach ($requete_musique as $liste_musique) {

              $curseur = current($liste_musique);

              echo '<tr><td>';
              echo $curseur;
              echo '<td><td>';
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
