<?php
include ("inc/header.inc.php");

if(isset($_GET['musiqueID'])){

    $musiqueID = $_GET['musiqueID'];

    $requete_musique = executeRequete("SELECT * FROM musique WHERE MusiqueID = " . $musiqueID);
    $liste_musique = $requete_musique -> fetch_assoc();

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
        
        <div class="audio">
        <audio  controls>
            <source src="'.$liste_musique['MusiqueChemin'].'" type="audio/mpeg">
        </audio>
        </div>
    </div>
       
    ';

}
elseif(isset($_GET['playlistID'])){

    $playlistID = $_GET['playlistID'];

    $requete_playlist = executeRequete("SELECT playlistNom FROM playlist WHERE  playlistID=".$playlistID);
    $liste_playlist = $requete_playlist -> fetch_assoc();

    $requete_musique = executeRequete("SELECT * FROM musique WHERE MusiqueID IN (SELECT musiqueID FROM link_musique_playlist WHERE playlistID=".$playlistID.")");
    $liste_musique = $requete_musique -> fetch_assoc();

    echo '<div class="ecoute">Voici les musique qui sont dans la playlist '.$liste_playlist['playlistNom'].' :</div><br><br>';

    echo'<div class="conteneurEcoute">';

    foreach ($requete_musique as $liste_musique){
        echo '<div class="divEcoute"><a href="pagecoute.php?musiqueID='.$liste_musique['MusiqueID'].'">
                    <img src="'.$liste_musique['MusiqueImage'].'" alt="'.$liste_musique['MusiqueNom'].'" class="img">
                <br><br>
                <h2>'.$liste_musique['MusiqueNom'].'</h2>
              </a></div>
        ';
    }
    echo'</div>';
}
else{
    $requete_musique = executeRequete("SELECT * FROM musique");
    $liste_musique = $requete_musique -> fetch_assoc();
    echo'<div class="conteneurEcoute">';
    foreach ($requete_musique as $liste_musique){
        echo '<div class="divEcoute"><br>
                    <a href="pagecoute.php?musiqueID='.$liste_musique['MusiqueID'].'">
                        <img src="'.$liste_musique['MusiqueImage'].'" alt="'.$liste_musique['MusiqueNom'].'" class="img"><br>
                        <br><h2>'.$liste_musique['MusiqueNom'].'</h2>
                    </a>
              </div>
        ';
    }
    echo'</div>';

}


?>

<?php
include ("inc/footer.inc.php");
?>
