<?php
include("inc/header.inc.php");
 ?>
 <section class="content">
             <div class="container">
 <div class="row">
 <div class="col-sm-4">
 <h3>Anysol contact </h3>
 <hr>
 <address>
 <strong>Adresse:</strong> Aix-en-Provence,<br>
 <strong>Téléphone:</strong> 06 06 06 06 06
 </address>

 <address>
     <strong>E-mail:</strong> administrateur@gmail.com , <br>
 <strong>Réseaux sociaux:</strong>
 <a class="color" href="https://www.facebook.com/">
             <i class="fa fa-facebook-square icon"style="font-size:20px; color:#17a2b8"></i>
             </a>

             <a class="colores" href="https://twitter.com/?lang=fr">
               <i class="fa fa-twitter-square" style="font-size:20px; color:#17a2b8"></i>
             </a>

             <a class="colores" href="https://www.instagram.com/?hl=fr">
               <i class="fa fa-instagram" style="font-size:20px; color:#17a2b8"></i>
             </a>

             <a class="colores" href="https://www.youtube.com/">
               <i class="fa fa-youtube" style="font-size:20px; color:#17a2b8"></i>
             </a>

             <a class="colores" href="https://plus.google.com/u/0/discover">
               <i class="fa fa-google-plus" style="font-size:20px; color:#17a2b8"></i>
             </a>

 </address>
 </div>
 </form>
 <div class="col-sm-8 contact-form" id="droite">
 <form id="contact" method="post" class="form" role="form">
 <div class="row">
 <div class="col-xs-6 col-md-6 form-group">
 <input class="form-control" id="name" name="name" placeholder="Nom" type="text" required autofocus />
 </div>
 <div class="col-xs-6 col-md-6 form-group">
 <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required />
 </div>
 </div>
 <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"></textarea>
 <br />
 <div class="row">
   <div class="col-xs-12 col-md-12 form-group">
     <button class="btn btn-primary pull-right" type="submit" id="bouton">Envoyer</button>
     </form>
   </div>
 </div>
 </section>

 <?php
include("inc/footer.inc.php");
  ?>
