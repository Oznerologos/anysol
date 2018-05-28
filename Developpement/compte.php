<?php
include("inc/header.inc.php");

if(isset($_SESSION['UserID'])){

    $requete_verif = executeRequete("SHOW FULL TABLES IN anysol WHERE TABLE_TYPE LIKE 'VIEW'"); // on regarde si il y a une view
    $liste_verif = $requete_verif -> fetch_assoc();

    if(empty($liste_verif)){ // si il n'y en a pas on en crée une
        $requete_view = executeRequete("CREATE VIEW info(UserID,UserMail,UserPassword,UserNom,UserPrenom,UserBirthdate,UserSex,UserTel,AdrPostal,AdrVille,AdrRue,AdrRueNum,AdrComplement) AS SELECT l.UserID,l.UserMail,l.UserPassword,u.UserNom,u.UserPrenom,u.UserBirthdate,u.UserSex,u.UserTel,a.AdrPostal,a.AdrVille,a.AdrRue,a.AdrRueNum,a.AdrComplement FROM loginInfo l, User_ u, adresse a");
    }

    $requete_info = executeRequete("SELECT * FROM info WHERE UserID=".$_SESSION['UserID']);
    $liste_info = $requete_info -> fetch_assoc();

    if(isset($_POST['modifier'])){
        debug($_POST);
        // on récupère les données

        $UserMail = $_POST['UserMail'];
        $UserPassword = $_POST['UserPassword'];

        $UserNom = $_POST['UserNom'];
        $UserPrenom = $_POST['UserPrenom'];
        $UserBirthdate = $_POST['UserBirthdate'];
        $UserSex = $_POST['UserSex'];
        $UserTel = $_POST['UserTel'];

        $AdrPostal = $_POST['AdrPostal'];
        $AdrVille = $_POST['AdrVille'];
        $AdrRue = $_POST['AdrRue'];
        $AdrRueNum = $_POST['AdrRueNum'];
        $AdrComplement = $_POST['AdrComplement'];

        $requete_verification = executeRequete("SELECT UserMail FROM LoginInfo"); // on recupere les donnes de connexion
        $liste_verification = $requete_verification -> fetch_assoc(); // on stock chaque colonne dans une case de tableau

        $inscription = TRUE;
        $erreur = FALSE;

        foreach ($requete_verification as $liste_verification){ // on compare les donnes de l'utilisateur avec les données de la bdd
            if ($UserMail == $liste_verification['UserMail']){
                $inscription = FALSE;
            }
        }

        if ($inscription == TRUE){ // Si l'identifiant saisi par l'utilisateur n'existe pas


            $requete_update = executeRequete("UPDATE User_ SET UserNom='" . $UserNom . "', UserPrenom='" . $UserPrenom . "', UserBirthdate='" . $UserBirthdate . "', UserTel='" . $UserTel . "', UserSex='" . $UserSex . "' WHERE UserID='" . $_SESSION['UserID'] . "'");
            if (!$requete_update){
                $erreur = TRUE;
            }
            $requete_update = executeRequete("UPDATE loginInfo SET UserMail='" . $UserMail . "', UserPassword='" . $UserPassword . "' WHERE UserID='" . $_SESSION['UserID'] . "'");
            if (!$requete_update){
                $erreur = TRUE;
            }
            $requete_update = executeRequete("UPDATE adresse SET AdrPostal='" . $AdrPostal . "', AdrVille='" . $AdrVille . "', AdrRue='" . $AdrRue . "', AdrRueNum='" . $AdrRueNum . "', AdrComplement='" . $AdrComplement . "' WHERE UserID='" . $_SESSION['UserID'] . "'");
            if (!$requete_update){
                $erreur = TRUE;
            }

            header('Location: compte.php'); // on redirige l'utilisateur

        }
    }
    if(isset($_POST['ajouter'])){

        $nomPlaylist = $_POST['nomPlaylist'];
        $descPlaylist = $_POST['descPlaylist'];

        $requete_playlist = executeRequete("INSERT INTO Playlist(PlaylistNom,PlaylistDesc,UserID) VALUES('".$nomPlaylist."','".$descPlaylist."','".$_SESSION['UserID']."')");

        $requete_PlaylistID = executeRequete("SELECT max(PlaylistID) FROM playlist");
        $liste_PlaylistID = $requete_PlaylistID -> fetch_assoc();
        $PlaylistID = $liste_PlaylistID['max(PlaylistID)'];

        $requete_musique = executeRequete("SELECT musiqueID FROM musique");
        $liste_musique = $requete_musique -> fetch_assoc();

        foreach ($requete_musique as $liste_musique) {

            $musiqueID = $liste_musique['musiqueID'];

            if(isset($_POST[$musiqueID])){

                $requete_playlist = executeRequete("INSERT INTO link_musique_playlist(PlaylistID,MusiqueID) VALUES('".$PlaylistID."','".$musiqueID."')");

            }

        }


    }

    ?>


    <div class="container comptediv">
      <h2 class="moncomptetitre">Mon compte :</h2><br>
                <?php
                echo '


                    <form method="post" action="'.$_SERVER["PHP_SELF"].'" enctype="multipart/form-data">
                        <table class="compteinfo">
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserMail">E-mail</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="email" name="UserMail" placeholder="votre e-mail" value="'.$liste_info['UserMail'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserPassword">Mot de passe</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="password" name="UserPassword" value="'.$liste_info['UserPassword'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserNom">Nom</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="UserNom" placeholder="votre nom" value="'.$liste_info['UserNom'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserPrenom">Prenom</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="UserPrenom" placeholder="votre prenom" value="'.$liste_info['UserPrenom'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserBirthdate">date de naissance</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="date" name="UserBirthdate" value="'.$liste_info['UserBirthdate'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserSex">Civilité</label>
                                </td>
                                <td class="tdinfo">
                            ';

                if($liste_info['UserSex']== 'm'){
                    echo ' <input type="radio" name="UserSex" value="m" checked="checked"/>Homme
           <input type="radio" name="UserSex" value="f"/>Femme<br><br>';
                }
                else{
                    echo ' <input type="radio" name="UserSex" value="m"/>Homme
           <input type="radio" name="UserSex" value="f" checked="checked"/>Femme<br><br>';
                }

                echo '
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="UserTel">Téléphone</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="UserTel" placeholder="votre téléphone" value="'.$liste_info['UserTel'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="AdrPostal">Code postal</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="AdrPostal" placeholder="code postal" value="'.$liste_info['AdrPostal'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="AdrVille">Ville</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="AdrVille" placeholder="votre ville" value="'.$liste_info['AdrVille'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="AdrRue">Rue</label>
                                </td">
                                <td class="tdinfo">
                                    <input type="text" name="AdrRue" placeholder="votre rue" value="'.$liste_info['AdrRue'].'"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="AdrRueNum">Numéro</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="AdrRueNum" placeholder="Numéro d\'adresse" value="'.$liste_info['AdrRueNum'].'"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">
                                    <label for="AdrComplement">Complément d\'adresse</label>
                                </td>
                                <td class="tdinfo">
                                    <input type="text" name="AdrComplement" placeholder="complément"  value="'.$liste_info['AdrComplement'].'"/><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdinfo">

                                </td>
                                <td class="tdinfo">
                                    <input type="submit" value="Modifier" name="modifier"/>
                                </td>
                            </tr>
                        </table>
                    </form><br>


        <br>
    </div>
    <br>

    <div class="container containerliste">
        <h2>Mes listes</h2>
        <ul class="list-group liste">
            <li class="list-group-item"><a href="'.$_SERVER["PHP_SELF"].'?recent=true">Récemment écouté</a></li>
            <!--  <li class="list-group-item"><a href="#">Coups de coeur</a></li> -->
            <li class="list-group-item"><a href="'.$_SERVER["PHP_SELF"].'?musique=true">Ma musique</a></li>
            <li class="list-group-item"><a href="'.$_SERVER["PHP_SELF"].'?playlist=true">Créer une Playlist</a></li>
            ';

            if (isset($_GET['playlist'])) {
                $requete_musique = executeRequete("SELECT musiqueNom,musiqueID FROM musique");
                $liste_musique = $requete_musique -> fetch_assoc();

                echo " <form method=\"POST\" action=\"".$_SERVER["PHP_SELF"]."\"><br><table>";
                echo '<input type="text" name="nomPlaylist" placeholder="nom de la playlist"/><br>';
                echo '<textarea name="descPlaylist" placeholder="description"></textarea>';
                foreach ($requete_musique as $liste_musique) {

                    $musiqueID = $liste_musique['musiqueID'];
                    $musiqueNom = $liste_musique['musiqueNom'];

                    echo '<tr><td>';
                    echo $musiqueNom;
                    echo '</td><td>';
                    echo '<input type="checkbox" name="'.$musiqueID.'"/>';
                    echo '</td></tr>';

                }
                echo '</table><br><input type="submit" name="ajouter" value="créer la playlist"/></form><br>';

            }

            echo'
            <li class="list-group-item"><a href="'.$_SERVER["PHP_SELF"].'?album=true">Albums</a></li>
            <li class="list-group-item"><a href="'.$_SERVER["PHP_SELF"].'?artiste=true">Artistes</a></li>
            <!--<li class="list-group-item"><a href="#">Mix</a></li> -->
            <!--<li class="list-group-item"><a href="#">Podcats</a></li>-->
        </ul>
    </div>
    ';


}
else{
    echo '<div class="ecoute">Vous devez être connecté pour pouvoir accéder à votre compte</div>';
}
    ?>

    <?php
    include("inc/footer.inc.php");
    ?>
