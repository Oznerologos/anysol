<?php

require_once("inc/init.inc.php");

if(!empty($_POST['connexion'])) {

    $connexion = FALSE;

    // on récupère les données

    $UserMail = $_POST['UserMail'];
    $UserPassword = $_POST['UserPassword'];

    $bdd = new mysqli("localhost", "root", "", "anysol");  // on accède à la bdd

    $requete_verification = $bdd->query("SELECT UserID, UserNom, UserPrenom FROM User_");    // on recupere les donnes de connexion
    $liste_verification = $requete_verification -> fetch_assoc();  // on stock chaque colonne dans une case de tableau

    foreach ($requete_verification as $liste_verification){    // on compare les donnes de l'utilisateur avec les données de la bdd

        if ($UserMail == $liste_verification['UserMail'] and $UserPassword == $liste_verification['UserPassword']){  // si les données de l'utilisateur correspondent à celles de la bdd
            $connexion = TRUE;
            break;
        }
    }
    if($connexion == TRUE){
        if(!isset($_SESSION)){
            session_start(); // on ouvre une session
        }
        $_SESSION['UserID'] = $liste_verification['UserID'];    // on récupère l'id de l'utilisateur
        header('Location: accueil.php'); // on redirige l'utilisateur vers la page d'accueil
    }
    else{
        header('Location: accueil.php'); // on redirige l'utilisateur vers la page d'accueil
    }
}

?>
