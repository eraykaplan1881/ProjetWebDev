<?php
session_start();

require "./vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

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

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "team.jeunes64@gmail.com";
    $mail->Password = "sdnqmodjdrlmemhv";

    $mail->setFrom("team.jeunes64@gmail.com", $nom);
    $mail->addAddress($emailReferent);

    $mail->Subject = "Demande de reference par " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "";
    $mail->Body = 
"Cher " . $_SESSION['prenomReferent'] . " " . $_SESSION['nomReferent'] . ", vous venez de recevoir une demande de confirmation d'une demande de référence émise par " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " dans le cadre du projet Jeunes 6.4.
    
Ce dernier est un dispositif de valorisation de l'engagement des jeunes en Pyrénées-Atlantiques. Il est soutenu par l'État, le Conseil Général, le Conseil Régional, les CAF Béarn Soule et Pays Basque, la MSA (Mutualité Sociale Agricole) et la CPAM (Caisse Primaire d'Assurance Maladie).

Ce dispositif vise à encourager et reconnaître l'engagement des jeunes dans des actions citoyennes, solidaires, culturelles, sportives ou environnementales. Il offre aux jeunes des opportunités de s'impliquer dans des projets concrets et bénéfiques pour la société, tout en valorisant leurs compétences et en favorisant leur insertion sociale et professionnelle.
    
Le soutien financier et institutionnel apporté par ces différentes entités permet la mise en place d'actions concrètes et la reconnaissance de l'engagement des jeunes dans le département des Pyrénées-Atlantiques.
    
Veuillez cliquer sur le lien suivant pour confirmer la demande de référence : eray-kaplan.com

Cordialement,
L'équipe Jeunes 6.4.";

    $mail->send();

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

        .form1Center {
            display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
        }

        .formTitle {
            margin-top: 40px;
            font-size: 31px;
            color: #E6007E;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
        }

        @font-face {
            font-family: 'brush-script-mt-italic';
            src: url('../../font/BRUSHSCI.ttf') format('TrueType');
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }

        .form1 {
            position: relative;
            z-index: 2;
            border: 1px solid #E6007E;
            border-top-color: #d6a1be;
            border-left-color: #d6a1be;
            color: #E6007E;
            background-color: white;
            margin-top: 20px;
            padding: 40px 0px 0 95px;
            height: 300px;
            width: 35%;
            line-height: 2px;
            font-size: 25px;
        }

        .jeuneBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 448px 0 0 -660px;
        }

        .form2Title {
            margin: -375px 55px 0 0;
            font-size: 29px;
            font-weight: bold;
            text-align: right;
            color: #E6007E;
            letter-spacing: -5px;
        }

        .form2 {
            position: relative;
            width: 280px;
            height: 410px;
            background: radial-gradient(circle at 0% 50%, #ffffff 0%, #FCE5F0 70%);
            float: right;
            margin: 0px 35px 0 0;
            font-size: 25px;
        }

        .form2Text1 {
            margin: 0;
            padding-right: 30px;
            font-size: 34px;
            text-align: right;
            color: white;
            background: linear-gradient(to right ,#ffffff -5%, #E6007E 35%);
        }

        input[type="checkbox"] {
            width: 23px;
            height: 23px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border: 1px solid black;
            background-color: white;
        }

        .checkbox1::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 55%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox2::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 152%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox3::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 249%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox4::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 346%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox5::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 443%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox6::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 540%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox7::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 637%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox8::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 734%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox9::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 831%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox10::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 928%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox11::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 1025%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .checkbox12::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-90%, 1122%) scale(0.3);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .form2Text2 {
            margin: 430px 95px 0 0;
            font-size: 17px;
            text-align: right;
            color: #E6007E;
        }

        .submitRight {
            text-align: right;
        }

        input[type="submit"] {
            background-color: #E6007E;
            color: white;
            border: none;
            font-size: 28px;
            margin: 15px 90px 0 0;
            padding: 7px 36px 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            color: #E6007E;
            background-color: #FCE5F0;
            transition: 0.2s ease-in;
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
                <p class="formTitle">Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</p>
                <form action="#" method="post" style="margin-top: 40px;">
                    <div class="form1Center">
                        <div class="form1">
                            <label for="engagement" style="margin-left: -65px;">MON ENGAGEMENT :</label>
                            <input type="text" id="engagement" name="engagement" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: -20px 0 0 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 192px; padding: 0; width: 415px;"></p>
                            <br>
                            <label for="dureeEngagement" style="margin-left: -65px;">DUREE DE L'ENGAGEMENT :</label>
                            <input type="text" id="dureeEngagement" name="dureeEngagement" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-10%); margin: 0 0 0 -30px; padding: 0 0 0 30px; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 282px; padding: 0; width: 325px;"></p>
                            <br>
                            <label for="milieuEngagement" style="margin-left: -65px;">MILIEU DE L'ENGAGEMENT :</label>
                            <input type="text" id="milieuEngagement" name="milieuEngagement" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0 0 0 -30px; padding: 0 0 0 30px; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 278px; padding: 0; width: 329px;"></p>
                            <br>
                            <label for="nomReferent" style="margin-left: -65px;">NOM DU RÉFÉRENT :</label>
                            <input type="text" id="nomReferent" name="nomReferent" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: 50px 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -67px 0 0 192px; padding: 0; width: 415px;"></p>
                            <br>
                            <label for="prenomReferent" style="margin-left: -65px;">PRENOM DU RÉFÉRENT :</label>
                            <input type="text" id="prenomReferent" name="prenomReferent" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 243px; padding: 0; width: 365px;"></p>
                            <br>
                            <label for="emailReferent" style="margin-left: -65px;">E-MAIL DU RÉFÉRENT :</label>
                            <input type="email" id="emailReferent" name="emailReferent" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 217px; padding: 0; width: 392px;"></p>
                            <br>
                        </div>
                    </div>
                    <p class="form2Title">MES SAVOIRS ETRE</p>
                    <div class="form2">
                        <p class="form2Text1">Je suis*</p>
                        <label><input type="checkbox" class="checkbox1" name="checkbox1" value="autonome" style="margin: 8px 12px 0 15px;">Autonome</label>
                        <br>
                        <label><input type="checkbox" class="checkbox2" name="checkbox2" value="passionné" style="margin: 0px 12px 0 15px;">Passionné</label>
                        <br>
                        <label><input type="checkbox" class="checkbox3" name="checkbox3" value="réfléchi" style="margin: 0px 12px 0 15px;">Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox4" name="checkbox4" value="a l'écoute" style="margin: 0px 12px 0 15px;">A l'écoute</label>
                        <br>
                        <label><input type="checkbox" class="checkbox5" name="checkbox5" value="organisé" style="margin: 0px 12px 0 15px;">Organisé</label>
                        <br>
                        <label><input type="checkbox" class="checkbox6" name="checkbox6" value="passionné" style="margin: 0px 12px 0 15px;">Passionné</label>
                        <br>
                        <label><input type="checkbox" class="checkbox7" name="checkbox7" value="fiable" style="margin: 0px 12px 0 15px;">Fiable</label>
                        <br>
                        <label><input type="checkbox" class="checkbox8" name="checkbox8" value="patient" style="margin: 0px 12px 0 15px;">Patient</label>
                        <br>
                        <label><input type="checkbox" class="checkbox9" name="checkbox9" value="réfléchi" style="margin: 0px 12px 0 15px;">Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox10" name="checkbox10" value="responsable" style="margin: 0px 12px 0 15px;">Responsable</label>
                        <br>
                        <label><input type="checkbox" class="checkbox11" name="checkbox11" value="sociable" style="margin: 0px 12px 0 15px;">Sociable</label>
                        <br>
                        <label><input type="checkbox" class="checkbox12" name="checkbox12" value="optimiste" style="margin: 0px 12px 0 15px;">Optimiste</label>
                    </div>
                    <p class="form2Text2">*Faire 4 choix maximum</p>
                    <div class="submitRight">
                        <input type="submit" name="envoi" value="Valider">
                    </div>
                </form>
                <script>
                    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    var maxLimit = 4;

                    for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].addEventListener('click', function() {
                        var checkedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
                        if (checkedCount >= maxLimit) {
                        for (var j = 0; j < checkboxes.length; j++) {
                            if (!checkboxes[j].checked) {
                            checkboxes[j].disabled = true;
                            }
                        }
                        } else {
                        for (var j = 0; j < checkboxes.length; j++) {
                            checkboxes[j].disabled = false;
                        }
                        }
                    });
                    }
                </script>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
