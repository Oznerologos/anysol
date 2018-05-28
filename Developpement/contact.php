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
 <div class="col-sm-8 contact-form" id="droite">
 <form id="contact" method="post" class="form" role="form" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
 <div class="row">
   <!-- Nom-->
 <div class="col-xs-6 col-md-6 form-group">
   <input type="text" id="nom" name="nom" placeholder="Nom" value=<?php if (isset($_POST['nom'])) { echo "'".$_POST['nom']."'";
   	      }?>>
 </div>
 <!-- prénom -->
 <div class="col-xs-6 col-md-6 form-group">
   <input type="text" id="prenoms" name="prenoms" placeholder="Prénom" value=<?php if (isset($_POST['prenoms'])) { echo "'".$_POST['prenoms']."'";
      }?>>
</div>
<!--Objet-->
<div class="col-xs-6 col-md-6 form-group">
  <input type="text" id="objet" name="objet" placeholder="Objet du mail" value=<?php if (isset($_POST["objet"])) { echo "'".addslashes($_POST["objet"])."'";
  }?>>
</div>
<!--mail-->
<div class="col-xs-6 col-md-6 form-group">
<input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required value=<?php if (isset($_POST['email'])) { echo "'".$_POST['email']."'";
   }?>>
</div>

 </div>
	<textarea class='contenuMessage' name="contenuMessage" form="contact" placeholder="Tapez votre message"></textarea>
   <br />
 <div class="row">
   <div class="col-xs-12 col-md-12 form-group">
         <p class="btnAlign"><input class="btnCouleur" type="submit" name="envoyer" value="Envoyer"></p>
     </form>
   </div>
 </div>
 </section>


 <?php

 	if (isset($_POST['envoyer'])) {
 		if (isset($_POST['nom']) && isset($_POST['prenoms']) && isset($_POST['email']) && isset($_POST['contenuMessage']) && isset($_POST['objet']) && $_POST['nom']!== '' && $_POST['prenoms']!== '' && $_POST['email']!== '' && $_POST['contenuMessage']!== '' ) {
 			$message = wordwrap($_POST['contenuMessage'], 70, "\r\n");
 			$mailContact= 'stacy.perales@ynov.com';
 			$objetContact= $_POST['nom'].' '. $_POST['prenoms'].' : '. $_POST['objet'];
 			mail("stacy.perales@ynov.com", $objetContact, $message);
 			echo "<p class='confirmation'>Le mail a été envoyé !</p>";
 		}
 		else {echo "<p class='erreur'>Veuillez remplir tous les formulaires</p>";
 		}
 	}
  ?>
 <?php
include("inc/footer.inc.php");
  ?>
