<?php
include("inc/header.inc.php");

if(!empty($_POST['rechercher'])) {
    $recherche = $_POST['recherche'];

    $requete_recherche = executeRequete("SELECT * FROM musique WHERE musiqueNom LIKE '%".$recherche."%'");
    $liste_recherche = $requete_recherche -> fetch_assoc();

    if(!empty($liste_recherche)){
        echo 'Voici des Musique dont le titre comprend votre recherche :<br><br>';
        foreach ($requete_recherche as $liste_recherche){
            echo '<br><a href="pagecoute.php?musiqueID='.$liste_recherche['MusiqueID'].'">
                <div class="pochette">
                    <img src="'.$liste_recherche['MusiqueImage'].'" alt="'.$liste_recherche['MusiqueNom'].'" class="img">
                </div><br><br>
                <h1>'.$liste_recherche['MusiqueNom'].'</h1>
              </a><br>
        ';
        }
    }
    else{
        echo 'Pas de musique correspondant à ce titre';
    }

}
else{
    echo 'Veuillez entrer quelque chose dans la barre de recherche';
}

include("inc/footer.inc.php");
?>
