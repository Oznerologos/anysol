<?php
echo '
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Compte</title>
		<link rel="stylesheet" href="bootstrap.css">
		<link rel="stylesheet" href="css_anysol.css">
	</head>
	<body>
	    <div class="container">
				<header>
					<div class="header_gauche">
						<img class="logo" src="logo.png" alt="logo AnySol"/>
					</div>
					<div class="onglets">
						<div class="btn btn-outline-success vertanysol"><strong>Accueil</strong></div>
						<a href="nouveautes.html"><div class="btn btn-outline-success vertanysol">Nouveautés</div></a>
						<a href="categories.html"><div class="btn btn-outline-success vertanysol">Catégories</div></a>
						<a href="albums.html"><div class="btn btn-outline-success vertanysol">Albums</div></a>
						<a href="auteurs.html"><div class="btn btn-outline-success vertanysol">Auteurs</div></a>
					</div>
					<div class="header_droite">
					    <button type="button" class="btn btn-outline-success vertanysol">Paramètres</button>
					    <button type="button" class="btn btn-outline-success vertanysol">S\'abonner</button>
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
				</header>
				<div class="clear"></div>

';
?>