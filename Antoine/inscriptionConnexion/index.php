<?php

$mysqli = new Mysqli("localhost", "root", "", "bibliotheque");

session_start();

if(!empty($_POST['connexion'])) {
    $login = $_POST['login'];
    $password = $_POST['pass'];
    $verif=$mysqli->query("select login,password from utilisateurs where login='".$login."' and password='".$password."'")
    or 'erreur';
    if($verif != 'erreur'){
        $_SESSION['connexion'] = 'OK';
    }
}

if($_SESSION['connexion'] == 'OK'){

    include("header.php");

    if(!empty($_POST['deconnexion'])) {
        session_unset ();
        session_destroy();
        echo '<a href="index.html">Retour à la page de connexion</a>';
    }
    else{
        if(isset($_GET['page'])) {
            $lienPage = $_GET['page'];
            if($_GET['page'] == $lienPage){
                include("$lienPage.php");
            }
        }

        include("footer.php");

    }
}

// SI Déconnecté

else {
    $_SESSION['connexion'] = '';
}
?>
