<?php
require_once("inc/init.inc.php");
// Inscription
$_SESSION = array();  // on détruit les variables de session

session_destroy(); // on détruit la session

if($_POST){
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
    $UserAdhesion = date("Y-m-d");
    $AbonnementID = $_POST['AbonnementID'];

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

        $requete_utilisateur = executeRequete("INSERT INTO User_(UserNom, UserPrenom, UserBirthdate, UserSex, UserTel, UserAdhesion, AbonnementID) VALUES('".$UserNom."', '".$UserPrenom."', '".$UserBirthdate."', '".$UserSex."', '".$UserTel."', '".$UserAdhesion."', '".$AbonnementID."')"); // on ajoute les données de l'utilisateur dans la bdd
        $requete_UserID = executeRequete("SELECT max(UserID) FROM User_");
        $liste_UserID = $requete_UserID -> fetch_assoc(); // on stock chaque colonne dans une case de tableau
        $UserID = $liste_UserID['max(UserID)'];
        $requete_utilisateur = executeRequete("INSERT INTO LoginInfo(UserMail, UserPassword, UserID) VALUES('".$UserMail."', '".$UserPassword."', '".$UserID."')"); // on ajoute les données de l'utilisateur dans la bdd
        $requete_utilisateur = executeRequete("INSERT INTO Adresse(AdrPostal, AdrVille, AdrRue, AdrRueNum, AdrComplement, UserID) VALUES('".$AdrPostal."', '".$AdrVille."', '".$AdrRue."', '".$AdrRueNum."', '".$AdrComplement."', '".$UserID."')"); // on ajoute les données de l'utilisateur dans la bdd
        if (!$requete_utilisateur){
            $erreur = TRUE;
        }

        if ($erreur == FALSE){ // si tout c'est bien passé

            $requete_verification = executeRequete("SELECT UserMail, UserPassword, UserID FROM LoginInfo");    // on recupere les donnes de connexion
            $liste_verification = $requete_verification -> fetch_assoc();  // on stock chaque colonne dans une case de tableau

            foreach ($requete_verification as $liste_verification){    // on compare les donnes de l'utilisateur avec les données de la bdd

                if ($UserMail == $liste_verification['UserMail'] and $UserPassword == $liste_verification['UserPassword']){  // si les données de l'utilisateur correspondent à celles de la bdd

                    //  on connecte l'utilisateur

                    session_start();  // on ouvre une session
                    $_SESSION['UserID'] = $liste_verification['UserID'];    // on récupère l'id de l'utilisateur
                }
            }
            header('Location: accueil.php'); // on redirige l'utilisateur vers la page d'accueil
        }
    }
}

?>

<?php
include ("inc/header.inc.php");
?>

<br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">

    <label for="UserMail">E-mail</label>
    <input type="email" name="UserMail" placeholder="votre e-mail" required="required"/><br><br>

    <label for="UserPassword">Mot de passe</label>
    <input type="password" name="UserPassword" required="required"/><br><br>

    <label for="UserNom">Nom</label>
    <input type="text" name="UserNom" placeholder="votre nom" required="required"/><br><br>

    <label for="UserPrenom">Prenom</label>
    <input type="text" name="UserPrenom" placeholder="votre prenom" required="required"/><br><br>

    <label for="UserBirthdate">date de naissance</label>
    <input type="date" name="UserBirthdate" placeholder="votre date de naissance" required="required"/><br><br>

    <label for="UserSex">Civilité</label>
    <input type="radio" name="UserSex" value="m" checked="checked"/>Homme
    <input type="radio" name="UserSex" value="f"/>Femme<br><br>

    <label for="UserTel">Téléphone</label>
    <input type="text" name="UserTel" placeholder="votre numéro de téléphone" required="required"/><br><br>

    <label for="AdrPostal">Code postal</label>
    <input type="text" name="AdrPostal" placeholder="votre code postal" required="required"/><br><br>

    <label for="AdrVille">Ville</label>
    <input type="text" name="AdrVille" placeholder="votre ville" required="required"/><br><br>

    <label for="AdrRue">Rue</label>
    <input type="text" name="AdrRue" placeholder="votre rue" required="required"/>

    <label for="AdrRueNum">Numéro</label>
    <input type="text" name="AdrRueNum" placeholder="votre numéro d'adresse" required="required"/>

    <label for="AdrComplement">Complément d'adresse</label>
    <input type="text" name="AdrComplement" placeholder="complément" /><br><br>

    <label for="AbonnementID">Abonnement</label>
    <input type="radio" name="AbonnementID" value="1" checked="checked"/>Gratuit
    <input type="radio" name="AbonnementID" value="2"/>Premium<br><br>

    <input type="submit" value="s'inscrire" name="inscription"/>
</form><br>

<?php
include ("inc/footer.inc.php");
?>
