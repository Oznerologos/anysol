<?php
include("inc/header.inc.php");

echo '<h1>Mes playlist</h1>';

$requete_playlist = executeRequete("SELECT * FROM playlist WHERE UserID = ".$_SESSION['UserID']);
$liste_playlist = $requete_playlist -> fetch_assoc();

foreach ($requete_playlist as $liste_playlist){
    echo '<br><a href="pagecoute.php?playlistID='.$liste_playlist['PlaylistID'].'">
    '.$liste_playlist['PlaylistNom'].'<br><br>
    '.$liste_playlist['PlaylistDesc'].'
    </a><br>';
}

include("inc/footer.inc.php");
?>
