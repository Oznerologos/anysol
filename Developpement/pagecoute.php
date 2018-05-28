<?php
include ("inc/header.inc.php");

if(isset($_GET['musiqueID'])){

    $musiqueID = $_GET['musiqueID'];

    $requete_musique = executeRequete("SELECT * FROM musique WHERE MusiqueID = " . $musiqueID);
    $liste_musique = $requete_musique -> fetch_assoc();

    /*$requete_artiste = executeRequete("SELECT * FROM artiste WHERE artisteID = (select artisteID from link_musique_artiste where MusiqueID = " . $musiqueID . ")");
    $liste_artiste = $requete_artiste -> fetch_assoc();

    $requete_album = executeRequete("SELECT * FROM album WHERE albumID = (select albumID from link_musique_album where musiqueID = " . $musiqueID . ")");
    $liste_album = $requete_album -> fetch_assoc();

    $requete_playlist = executeRequete("SELECT * FROM playlist WHERE playlistID = (select playlistID from link_musique_playlist where musiqueID = " . $musiqueID . ")");
    $liste_playlist = $requete_playlist -> fetch_assoc();

    $requete_genre = executeRequete("SELECT * FROM genre WHERE genreID = (select genreID from link_musique_genre where musiqueID = " . $musiqueID . ")");
    $liste_genre = $requete_genre -> fetch_assoc();*/


    echo '
    <div class="ecoute">
        <div class="pochette">
            <img src="'.$liste_musique['MusiqueImage'].'" alt="'.$liste_musique['MusiqueNom'].'" class="img">
        </div>
       
        <br>
        <br>
        
        <h1>'.$liste_musique['MusiqueNom'].'</h1>
        
        <br>
        <br>
        
        <audio  controls>
            <source src="'.$liste_musique['MusiqueChemin'].'" type="audio/mpeg">
        </audio>
    </div>
       
    ';

}
elseif(isset($_GET['playlistID'])){

    $playlistID = $_GET['playlistID'];

    $requete_playlist = executeRequete("SELECT playlistNom FROM playlist WHERE  playlistID=".$playlistID);
    $liste_playlist = $requete_playlist -> fetch_assoc();

    $requete_musique = executeRequete("SELECT * FROM musique WHERE MusiqueID IN (SELECT musiqueID FROM link_musique_playlist WHERE playlistID=".$playlistID.")");
    $liste_musique = $requete_musique -> fetch_assoc();

    echo '<div class="ecoute">Voici les musique qui sont dans la playlist '.$liste_playlist['playlistNom'].' :<br><br>';

    foreach ($requete_musique as $liste_musique){
        echo '<br><a href="pagecoute.php?musiqueID='.$liste_musique['MusiqueID'].'">
                <div class="pochette">
                    <img src="'.$liste_musique['MusiqueImage'].'" alt="'.$liste_musique['MusiqueNom'].'" class="img">
                </div><br><br>
                <h1>'.$liste_musique['MusiqueNom'].'</h1>
              </a><br></div>
        ';
    }
}
else{
    $requete_musique = executeRequete("SELECT * FROM musique");
    $liste_musique = $requete_musique -> fetch_assoc();

    foreach ($requete_musique as $liste_musique){
        echo '<div class="ecoute"><br><a href="pagecoute.php?musiqueID='.$liste_musique['MusiqueID'].'">
                <div class="pochette">
                    <img src="'.$liste_musique['MusiqueImage'].'" alt="'.$liste_musique['MusiqueNom'].'" class="img">
                </div><br><br>
                <h1>'.$liste_musique['MusiqueNom'].'</h1>
              </a><br></div>
        ';
    }
}

?>

<?php
include ("inc/footer.inc.php");
?>
