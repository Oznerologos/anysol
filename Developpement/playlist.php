<?php
include("inc/header.inc.php");

echo '<h1>Mes playlist</h1>';

if(isset($_SESSION['UserID'])){

    $requete_playlist = executeRequete("SELECT * FROM playlist WHERE UserID = ".$_SESSION['UserID']);
    $liste_playlist = $requete_playlist -> fetch_assoc();

    foreach ($requete_playlist as $liste_playlist){
        echo '<div class="ecoute"><br><a href="pagecoute.php?playlistID='.$liste_playlist['PlaylistID'].'">
        Nom : '.$liste_playlist['PlaylistNom'].'<br><br>
        Description : '.$liste_playlist['PlaylistDesc'].'
        </a><br></div>';
    }
}
else{
    echo '<div class="ecoute">Vous devez être connecté pour pouvoir accéder à vos playlist</div>';
}
include("inc/footer.inc.php");
?>
