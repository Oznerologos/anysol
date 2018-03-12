<?php

include('header.php');

if(!empty($_POST['inscription'])) {

    $login = $_POST['login'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $sexe = $_POST['sexe'];
    $confirmationPassword = $_POST['verifPass'];

    if($password == $confirmationPassword){
        $mysqli = new Mysqli("localhost", "root", "", "bibliotheque");

        $result=$mysqli->query("INSERT INTO utilisateurs ('login', 'pass', 'email', 'age', 'sexe')
        VALUES ('$login', '$password', '$email', '$age', '$sexe')");
    }
}

include('footer.php');

?>