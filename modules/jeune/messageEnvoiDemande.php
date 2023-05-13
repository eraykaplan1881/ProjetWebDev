<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ./connexion.php");
    exit();
}

$bdd = new PDO('mysql:host=localhost;dbname=comptes_jeune;charset=utf8;', 'root', '');
if(isset($_POST['envoi'])){
    $engagement = htmlspecialchars($_POST['engagement']);
    $dureeEngagement = htmlspecialchars($_POST['dureeEngagement']);
    $milieuEngagement = htmlspecialchars($_POST['milieuEngagement']);
    $nomReferent = htmlspecialchars($_POST['nomReferent']);
    $prenomReferent = htmlspecialchars($_POST['prenomReferent']);
    $emailReferent = htmlspecialchars($_POST['emailReferent']);
    $checkbox1 = isset($_POST['checkbox1']) ? 1 : 0;
    $checkbox2 = isset($_POST['checkbox2']) ? 1 : 0;
    $checkbox3 = isset($_POST['checkbox3']) ? 1 : 0;
    $checkbox4 = isset($_POST['checkbox4']) ? 1 : 0;
    $checkbox5 = isset($_POST['checkbox5']) ? 1 : 0;
    $checkbox6 = isset($_POST['checkbox6']) ? 1 : 0;
    $checkbox7 = isset($_POST['checkbox7']) ? 1 : 0;
    $checkbox8 = isset($_POST['checkbox8']) ? 1 : 0;
    $checkbox9 = isset($_POST['checkbox9']) ? 1 : 0;
    $checkbox10 = isset($_POST['checkbox10']) ? 1 : 0;
    $checkbox11 = isset($_POST['checkbox11']) ? 1 : 0;
    $checkbox12 = isset($_POST['checkbox12']) ? 1 : 0;


    $insertUser = $bdd->prepare('INSERT INTO reference(engagement, dureeEngagement, milieuEngagement, nomReferent, prenomReferent, emailReferent, checkbox1, checkbox2, checkbox3, checkbox4, checkbox5, checkbox6, checkbox7, checkbox8, checkbox9, checkbox10, checkbox11, checkbox12) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $insertUser->execute(array($engagement, $dureeEngagement, $milieuEngagement, $nomReferent, $prenomReferent, $emailReferent, $checkbox1, $checkbox2, $checkbox3, $checkbox4, $checkbox5, $checkbox6, $checkbox7, $checkbox8, $checkbox9, $checkbox10, $checkbox11, $checkbox12));

    $recupUser = $bdd->prepare('SELECT * FROM reference WHERE engagement = ? AND dureeEngagement = ? AND milieuEngagement = ? AND nomReferent = ? AND prenomReferent = ? AND emailReferent = ? AND checkbox1 = ? AND checkbox2 = ? AND checkbox3 = ? AND checkbox4 = ? AND checkbox5 = ? AND checkbox6 = ? AND checkbox7 = ? AND checkbox8 = ? AND checkbox9 = ? AND checkbox10 = ? AND checkbox11 = ? AND checkbox12 = ?');
    $recupUser->execute(array($engagement, $dureeEngagement, $milieuEngagement, $nomReferent, $prenomReferent, $emailReferent, $checkbox1, $checkbox2, $checkbox3, $checkbox4, $checkbox5, $checkbox6, $checkbox7, $checkbox8, $checkbox9, $checkbox10, $checkbox11, $checkbox12));
    if($recupUser->rowCount() > 0) {
        $_SESSION['engagement'] = $engagement;
        $_SESSION['dureeEngagement'] = $dureeEngagement;
        $_SESSION['milieuEngagement'] = $milieuEngagement;
        $_SESSION['nomReferent'] = $nomReferent;
        $_SESSION['prenomReferent'] = $prenomReferent;
        $_SESSION['emailReferent'] = $emailReferent;
        $_SESSION['checkbox1'] = $checkbox1;
        $_SESSION['checkbox2'] = $checkbox2;
        $_SESSION['checkbox3'] = $checkbox3;
        $_SESSION['checkbox4'] = $checkbox4;
        $_SESSION['checkbox5'] = $checkbox5;
        $_SESSION['checkbox6'] = $checkbox6;
        $_SESSION['checkbox7'] = $checkbox7;
        $_SESSION['checkbox8'] = $checkbox8;
        $_SESSION['checkbox9'] = $checkbox9;
        $_SESSION['checkbox10'] = $checkbox10;
        $_SESSION['checkbox11'] = $checkbox11;
        $_SESSION['checkbox12'] = $checkbox12;
        $_SESSION['id2'] = $recupUser->fetch()['id2'];
    }
    header("Location: ./messageEnvoiDemande.php ");
}

echo "<form action='' method='POST' style='position: absolute; top: 215px; left: 2%;'>
        <button type='submit' name='centreDeControle' style='
            background-color: #E6007E;
            color: white;
            border: none;
            font-size: 25px;
            padding: 7px 36px 5px;
            cursor: pointer;
        '>CENTRE DE CONTRÔLE</button>
    </form>";

if(isset($_POST['centreDeControle'])){
    header("Location: ./centreDeControle.php");
    exit();
}

echo "<form action='' method='POST' style='position: absolute; top: 215px; right: 2%;'>
        <button type='submit' name='seDeconnecter' style='
            background-color: red;
            color: white;
            border: none;
            font-size: 25px;
            padding: 7px 36px 5px;
            cursor: pointer;
        '>SE DÉCONNECTER</button>
    </form>";

if(isset($_POST['seDeconnecter'])){
    session_destroy();
    header("Location: ./connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial Arabic", Arial, sans-serif;
            background: 
                radial-gradient(circle at 0% 100%, grey -7.5%, #ffffff 12.5%) top left / 50% 100% no-repeat,
                radial-gradient(circle at 100% 100%, grey -7.5%, #ffffff 12.5%) top right / 50% 100% no-repeat;
            height: 100vh;
        }
        
        header {
            padding: 0;
            background: radial-gradient(circle at 25% 100%, #ffffff 0%, #C6C6C6 30%);
            height: 200px;
        }

        .logo {
            position: relative;
            margin: -25px 0 0 0;
            scale: 0.7;
        }

        .choiceTitle {
            margin: -185px 40px 0 0;
            color: #E6007E;
            font-size: 120px;
            text-align: right;
            letter-spacing: -8px;
        }

        .title {
            margin: -115px 40px 0 0;
            color: white;
            font-size: 60px;
            letter-spacing: 2px;
            text-align: right;
        }

        .navbar {
            margin: 0 26%;
            height: 70px;
            background: radial-gradient(circle at 25% -100%, #ffffff 0%, #CCCCCC 30%);
            text-align: center;
            line-height: 75px;
        }

        a {
            cursor: pointer;
            margin: 0 20px;
            padding-top: 50px;
            text-decoration: none;
            font-size: 30px;
            letter-spacing: -3px;
		}

        .formTitle {
            margin-top: 100px;
            font-size: 31px;
            color: #E6007E;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
        }

        .jeuneBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 448px 0 0 -660px;
        }

        footer {
            margin: 0;
        }


    </style>
    </head>

    <body>
        <header>
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je donne de la valeur à mon engagement</p>
            <p class="choiceTitle">JEUNE</p>
        </header>
        <div>
            <div class="navbar">
            <a href="" style="color: white; background-color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/pasAccesReferent.php" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="../consultant/pasAccesConsultant.php" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="jeuneBG" src="../../includes/img/jeuneBG.png">
            </div>
            <div>
                <p class="formTitle">Votre demande de référence a été envoyé avec succès.</p>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
