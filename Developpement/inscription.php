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
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['date_de_naissance'];
    $civilite = $_POST['civilite'];
    $telephone = $_POST['telephone'];
    $mail = $_POST['mail'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $date_adhesion = date("Y-m-d");

    $requete_verification = executeRequete("SELECT identifiant, mot_de_passe FROM utilisateur"); // on recupere les donnes de connexion
    $liste_verification = $requete_verification -> fetch_assoc(); // on stock chaque colonne dans une case de tableau

    $inscription = TRUE;
    $erreur = FALSE;

    foreach ($requete_verification as $liste_verification){ // on compare les donnes de l'utilisateur avec les données de la bdd
        if ($identifiant == $liste_verification['identifiant']){
            $inscription = FALSE;
        }
    }

    if ($inscription == TRUE){ // Si l'identifiant saisi par l'utilisateur n'existe pas

        $requete_utilisateur = executeRequete("INSERT INTO utilisateur(identifiant, mot_de_passe, nom, prenom, date_de_naissance, civilite, telephone, mail, adresse, ville, code_postal, date_adhesion) VALUES('".$identifiant."', '".$mot_de_passe."', '".$nom."', '".$prenom."', '".$date_de_naissance."', '".$civilite."', '".$telephone."', '".$mail."', '".$adresse."', '".$ville."', '".$code_postal."', '".$date_adhesion."')"); // on ajoute les données de l'utilisateur dans la bdd
        if (!$requete_utilisateur){
            $erreur = TRUE;
        }

        if ($erreur == FALSE){ // si tout c'est bien passé

            $requete_verification = executeRequete("SELECT identifiant, mot_de_passe, id_utilisateur FROM utilisateur");    // on recupere les donnes de connexion
            $liste_verification = $requete_verification -> fetch_assoc();  // on stock chaque colonne dans une case de tableau

            foreach ($requete_verification as $liste_verification){    // on compare les donnes de l'utilisateur avec les données de la bdd

                if ($identifiant == $liste_verification['identifiant'] and $mot_de_passe == $liste_verification['mot_de_passe']){  // si les données de l'utilisateur correspondent à celles de la bdd

                    //  on connecte l'utilisateur

                    session_start();  // on ouvre une session
                    $_SESSION['id_utilisateur'] = $liste_verification['id_utilisateur'];    // on récupère l'id de l'utilisateur
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

    <label for="UserPassword">Nom</label>
    <input type="text" name="UserPassword" placeholder="votre nom" required="required"/><br><br>

    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" placeholder="votre prenom" required="required"/><br><br>

    <label for="date_de_naissance">date de naissance</label>
    <input type="date" name="date_de_naissance" placeholder="votre date de naissance" required="required"/><br><br>

    <label for="civilite">Civilité</label>
    <input type="radio" name="civilite" value="m" checked="checked"/>Homme
    <input type="radio" name="civilite" value="f"/>Femme<br><br>

    <label for="telephone">Téléphone</label>
    <input type="text" name="telephone" placeholder="votre numéro de téléphone" required="required"/><br><br>

    <label for="cp">Code postal</label>
    <input type="text" name="code_postal" placeholder="votre code postal" required="required"/><br><br>

    <label for="ville">Ville</label>
    <input type="text" name="ville" placeholder="votre ville" required="required"/><br><br>

    <label for="adrRue">Rue</label>
    <input type="text" name="adresse" placeholder="votre rue" required="required"/>

    <label for="AdrRueNum">Numéro</label>
    <input type="text" name="AdrRueNum" placeholder="votre numéro d'adresse" required="required"/>

    <label for="AdrComplement">Complément d'adresse</label>
    <input type="text" name="AdrComplement" placeholder="complément" /><br><br>

    <label for="abonnement">Abonnement</label>
    <input type="radio" name="abonnement" value="1" checked="checked"/>Gratuit
    <input type="radio" name="abonnement" value="2"/>Premium<br><br>

    <input type="submit" value="s'inscrire" name="inscription"/>
</form><br>

<?php
include ("inc/footer.inc.php");
?>
