<?php
include("inc/header.inc.php");
 ?>
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
    <li class="list-group-item"><a href="#">Récemment écouté</a></li>
  <!--  <li class="list-group-item"><a href="#">Coups de coeur</a></li> -->
    <li class="list-group-item"><a href="#">Ma musique</a></li>
    <li class="list-group-item"><a href="#">Playlists</li>
    <li class="list-group-item"><a href="#">Albums</a></li>
    <li class="list-group-item"><a href="#">Artistes</a></li>
    <!--<li class="list-group-item"><a href="#">Mix</a></li> -->
    <!--<li class="list-group-item"><a href="#">Podcats</a></li>-->
  </ul>
</div>
<br><br><br><br><br><br><br><br><br>
<?php
include("inc/footer.inc.php");
  ?>