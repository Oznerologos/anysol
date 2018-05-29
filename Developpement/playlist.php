<?php
include("inc/header.inc.php");

echo '<div class="ConteneurPlaylist"><div class="ecoute"><h1>Mes playlists</h1></div>';

if(isset($_SESSION['UserID'])){

    $requete_playlist = executeRequete("SELECT * FROM playlist WHERE UserID = ".$_SESSION['UserID']);
    $liste_playlist = $requete_playlist -> fetch_assoc();
    echo'<div class="conteneurEcoute">';
    foreach ($requete_playlist as $liste_playlist){
        echo '<div class="divEcoute"><br><a href="pagecoute.php?playlistID='.$liste_playlist['PlaylistID'].'">
        Nom : '.$liste_playlist['PlaylistNom'].'<br><br>
        Description : '.$liste_playlist['PlaylistDesc'].'
        </a><br>
        <form method="POST" action="'.$_SERVER["PHP_SELF"].'"><br><br>
            <input type="hidden" name="PlaylistID" value="'.$liste_playlist['PlaylistID'].'"/>
            <input type="submit" name="supprimer" value="Supprimer la playlist"/>
        </form><br></div>';
    }
    echo'</div>';

    if(isset($_POST['supprimer'])){

        $playlistID = $_POST['PlaylistID'];

        $requete_verification_hidden = executeRequete("SELECT UserID FROM Playlist WHERE PlaylistID = ". $playlistID);
        $liste_verification_hidden = $requete_verification_hidden -> fetch_assoc();

        if ($liste_verification_hidden['UserID'] == $_SESSION['UserID']) { // on vérifie que l'utilisateur n'ait pas changé le champ hidden

            $requete_PlaylistID = executeRequete("DELETE FROM link_musique_playlist WHERE PlaylistID = " . $playlistID);
            $requete_PlaylistID = executeRequete("DELETE FROM playlist WHERE PlaylistID = " . $playlistID);
        }

        header('Location: '.$_SERVER["PHP_SELF"]);
    }
}
else{
    echo '<div class="ecoute">Vous devez être connecté pour pouvoir accéder à vos playlist</div>';
}
echo '</div>';

echo '<fieldset class="pub"><legend>Publicité</legend></fieldset>';

include("inc/footer.inc.php");
?>
