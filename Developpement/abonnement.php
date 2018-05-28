<?php
include("inc/header.inc.php");

echo '<div class="ecoute"><h1>Abonnement</h1></div>';


echo '           <div class="conteneurAbonnement">
                    <form method="post" action="'.$_SERVER["PHP_SELF"].'">
                        <table class="compteinfo">
                            <tr>
                                <td>
                                    <label for="AbonnementDuree">Choisissez la durée d\'abonnement qui vous convient</label>
                                </td>
                                <td>
                                    <input type="number" name="AbonnementHeure" value="1"/>Heure<br>
                                    <input type="number" name="AbonnementJour" value="0"/>Jour<br>
                                    <input type="number" name="AbonnementMois" value="0"/>Mois<br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="S\'abonner" name="abonnement"/>
                                </td>
                            </tr>
                        </table>
                    </form>
                 </div>
            ';

if(isset($_POST['abonnement'])){

    $heure = abs($_POST['AbonnementHeure']);
    $jour = abs($_POST['AbonnementJour']);
    $mois = abs($_POST['AbonnementMois']);

    $prix = (0.5*$heure)+(2*$jour)+(10*$mois);

    echo '                   <div class="conteneurAbonnement"><br><h4>Vous allez acheter '.$heure.' heure, '.$jour.' jour et '.$mois.' mois d\'abonnement pour la valeur de '.$prix.'€<br></h4>
                                <form method="post" action="'.$_SERVER["PHP_SELF"].'">
                                    <input type="hidden" name="AbonnementHeure" value="'.$heure.'"/>
                                    <input type="hidden" name="AbonnementJour" value="'.$jour.'"/>
                                    <input type="hidden" name="AbonnementMois" value="'.$mois.'"/>
                                    <input type="submit" value="Valider et Payer" name="validation"/>
                                </form>
                              </div>
                                
                    ';
}

if(isset($_POST['validation'])){
    if(isset($_SESSION['UserID'])){

        $UserID = $_SESSION['UserID'];

        $heure = abs($_POST['AbonnementHeure']);
        $jour = abs($_POST['AbonnementJour']);
        $mois = abs($_POST['AbonnementMois']);

        date_default_timezone_set('Europe/Paris');

        $date = date('Y-m-d H:i:s');

        $requete_abonnement = executeRequete("SELECT * FROM Abonnement WHERE AbonnementID=(SELECT max(AbonnementID) FROM Abonnement WHERE UserID=".$UserID.")");
        if(!empty($requete_abonnement)){
            $liste_abonnement = $requete_abonnement -> fetch_assoc();

            $date = $liste_abonnement['AbonnementFin'];

            if($date <= date('Y-m-d H:i:s')){
                $date = date('Y-m-d H:i:s');
            }
        }
        else{
            $date = date('Y-m-d H:i:s');
        }

        $AbonnementDebut = $date;

        $AbonnementFin = date('Y-m-d H:i:s', strtotime("+".$mois." month +".$jour." day +".$heure." hour", strtotime($AbonnementDebut)));

        $prix = (0.5*$heure)+(2*$jour)+(10*$mois);

        $requete_abonnement = executeRequete("INSERT INTO Abonnement (AbonnementFin,AbonnementPrix,AbonnementDebut,UserID) VALUES('".$AbonnementFin."','".$prix."','".$AbonnementDebut."','".$UserID."')");

        header('Location: index.php');
    }
    else{
        echo '<h4>Connectez-vous pour pouvoir vous abonner !</h4>';
    }
}
echo '<fieldset class="pub"><legend>Publicité</legend></fieldset>';

include("inc/footer.inc.php");
?>
