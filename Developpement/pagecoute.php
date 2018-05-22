<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
      <title>Page d'écoute</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="inc/css/ecoute.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
  <body>

    <nav class="navbar_navbar-default_navbar-fixed-top">
   <div class="container-fluid">
     <div class="navbar-header">
  <a class="navbar-brand">
    <img src="inc/img/Anysol.jpg" alt="Anysol" class="anysol">
  </a>
     </div>
     <ul class="nav navbar-nav">
		<li><a class="a" href="#">Matching</a></li>
		<li><a class="a" href="#">Ma biblio</a></li>
		<li><a class="a" href="#">Livres</a></li>
    <li class="dropdown"><a class="a" data-toggle="dropdown" href="#">Communauté <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="#">Suggestion de membre</a></li>
             <li><a href="#">Evénements</a></li>
             <li><a href="#">Nous contacter</a></li>
    		 <li><a href="#">Aide</a></li>
           </ul>
         </li>
       </ul>


        <form class="navbar-form navbar-left">
       <div class="input-group">
         <input type="text" class="form-control" placeholder="Rechercher">
         <div class="input-group-btn">
           <button class="btn btn-default" type="submit">
             <i class="glyphicon glyphicon-search"></i>
           </button>
         </div>
   </div>
   </form>
</div>
 </nav>


   <img src="inc/img/reso.png" alt="reso" class="reso">
   <span class="glyphicon glyphicon-chevron-down" id="fleche" ></span>

   <div class="pochette">
       <img src="inc/img/img.jpg" alt="img" class="img">
   </div>
   <span class="glyphicon glyphicon-heart" id="coeurr"></span>
    <span class="glyphicon glyphicon-heart"></span>
     <span class="glyphicon glyphicon-heart"></span>
     <span class="glyphicon glyphicon-heart-empty"></span>
     <span class="glyphicon glyphicon-heart-empty"></span>
   <br><br>
   <div class="boutons">
   <button type="button" name="button" class="button"><span class="glyphicon glyphicon-music"style="font-size:150%;color:#01C69D"></span></button>
   <button type="button" name="button" class="buttons"> <span class="glyphicon glyphicon-heart-empty" style="font-size:150%;color:#01C69D"></span></button>
   <button type="button" name="button" class="buttones"><span class="glyphicon glyphicon-repeat"style="font-size:150%;color:#01C69D"></span></button>
   </div>
   <h1>Titre</h1>
<br><br>
<div>
<h3 class="gauche">Time</h3>
<h3 class="droite">Time</h3>
</div>
<br><br><br><br><br>
<img src="inc/img/barre.jpg" alt="barre" class="barre">
<audio  controls>
  <source src="https://www.youtube.com/watch?v=C76yS0OtJNA&index=19&list=RDGMEMQ1dJ7wXfLlqCjwV0xfSNbAVM2Vv-BfVoq4g" type="audio/mpeg">
</audio>
<div class="musique">
  <span class="glyphicon glyphicon-retweet" id="retweet"></span>
  <span class="glyphicon glyphicon-backward" id="recule"></span>
  <span class="glyphicon glyphicon-stop" id="stop"></span>
  <span class="glyphicon glyphicon-forward" id="avance"></span>
  <span class="glyphicon glyphicon-random" id="random"></span>
</div>
 </body>
</html>