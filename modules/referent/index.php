<?php
session_start();

if(isset($_POST['modifierMonProfil'])){
    echo '<script>window.location.href = "./modifierMonProfil.php";</script>';
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../includes/vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer as PHPMailerBis;
    use PHPMailer\PHPMailer\SMTP as SMTPBis;

$bdd = new PDO('mysql:host=localhost;dbname=id20895683_comptes_jeune;charset=utf8;', 'id20895683_root', 'DevWeb0795%');
if(isset($_POST['envoi2'])){
    $commentaires = htmlspecialchars($_POST['commentaires']);
    $secondCheckbox1 = isset($_POST['secondCheckbox1']) ? 1 : 0;
    $secondCheckbox2 = isset($_POST['secondCheckbox2']) ? 1 : 0;
    $secondCheckbox3 = isset($_POST['secondCheckbox3']) ? 1 : 0;
    $secondCheckbox4 = isset($_POST['secondCheckbox4']) ? 1 : 0;
    $secondCheckbox5 = isset($_POST['secondCheckbox5']) ? 1 : 0;
    $secondCheckbox6 = isset($_POST['secondCheckbox6']) ? 1 : 0;
    $secondCheckbox7 = isset($_POST['secondCheckbox7']) ? 1 : 0;
    $secondCheckbox8 = isset($_POST['secondCheckbox8']) ? 1 : 0;
    $secondCheckbox9 = isset($_POST['secondCheckbox9']) ? 1 : 0;
    $secondCheckbox10 = isset($_POST['secondCheckbox10']) ? 1 : 0;


    $insertUser = $bdd->prepare('INSERT INTO confirmationreferent(commentaires, secondCheckbox1, secondCheckbox2, secondCheckbox3, secondCheckbox4, secondCheckbox5, secondCheckbox6, secondCheckbox7, secondCheckbox8, secondCheckbox9, secondCheckbox10) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    
    $insertUser->execute(array($commentaires, $secondCheckbox1, $secondCheckbox2, $secondCheckbox3, $secondCheckbox4, $secondCheckbox5, $secondCheckbox6, $secondCheckbox7, $secondCheckbox8, $secondCheckbox9, $secondCheckbox10));

    $recupUser = $bdd->prepare('SELECT * FROM confirmationreferent WHERE commentaires = ? AND secondCheckbox1 = ? AND secondCheckbox2 = ? AND secondCheckbox3 = ? AND secondCheckbox4 = ? AND secondCheckbox5 = ? AND secondCheckbox6 = ? AND secondCheckbox7 = ? AND secondCheckbox8 = ? AND secondCheckbox9 = ? AND secondCheckbox10 = ?');
    
    $recupUser->execute(array($commentaires, $secondCheckbox1, $secondCheckbox2, $secondCheckbox3, $secondCheckbox4, $secondCheckbox5, $secondCheckbox6, $secondCheckbox7, $secondCheckbox8, $secondCheckbox9, $secondCheckbox10));
    
    if($recupUser->rowCount() > 0) {
        $_SESSION['commentaires'] = $commentaires;
        $_SESSION['secondCheckbox1'] = $secondCheckbox1;
        $_SESSION['secondCheckbox2'] = $secondCheckbox2;
        $_SESSION['secondCheckbox3'] = $secondCheckbox3;
        $_SESSION['secondCheckbox4'] = $secondCheckbox4;
        $_SESSION['secondCheckbox5'] = $secondCheckbox5;
        $_SESSION['secondCheckbox6'] = $secondCheckbox6;
        $_SESSION['secondCheckbox7'] = $secondCheckbox7;
        $_SESSION['secondCheckbox8'] = $secondCheckbox8;
        $_SESSION['secondCheckbox9'] = $secondCheckbox9;
        $_SESSION['secondCheckbox10'] = $secondCheckbox10;
        $_SESSION['id3'] = $recupUser->fetch()['id3'];
    }

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "contact.jeunes64@gmail.com";
    $mail->Password = "mztzesisluowpolt";

    $mail->setFrom("contact.jeunes64@gmail.com");
    $email = $_SESSION['email'];
    $mail->addAddress($email);

    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = "Demande de reference confirme par " . $_SESSION['prenomReferent'] . " " . $_SESSION['nomReferent'];
    $mail->Body = "
    <p>Cher " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . ",</p>
    <p>Votre demande de référence vient d'être confirmé par " . $_SESSION['prenomReferent'] . " " . $_SESSION['nomReferent']. ".</p>
    
    <p>Cordialement,<br>L'équipe Jeunes 6.4.</p>
    ";

    $mail->send();

    echo '<script>window.location.href = "./messageEnvoiDemande.php";</script>';
    
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
            margin: -175px 40px 0 0;
            color: #C1D100;
            font-size: 113px;
            text-align: right;
            letter-spacing: -8px;
        }

        .title {
            margin: -115px 40px 0 0;
            color: white;
            font-size: 60px;
            letter-spacing: 2.25px;
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
            margin-top: 20px;
            font-size: 15px;
            color: #13A538;
            letter-spacing: 1px;
            display: flex;
            text-align: center;
            justify-content: center;
        }

        @font-face {
            font-family: 'brush-script-mt-italic';
            src: url('../../font/BRUSHSCI.ttf') format('TrueType');
        }

        .form0 {
            position: relative;
            width: 240px;
            height: 425px;
            background: radial-gradient(circle at 0% 25%, #ffffff -25%, #D3E052 110%);
            float: left;
            margin: -38px -300px 0 60px;
            font-size: 28px;
            line-height: 34px;
        }

        .form0Text1 {
            margin: 0;
            padding: 0px -260px 0px 0px;
            font-size: 28px;
            letter-spacing: -3px;
            text-align: center;
            color: white;
            background: radial-gradient(circle at 0% -200%, #ffffff -25%, #D3E052 110%);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }

        .form1 {
            position: relative;
            z-index: 2;
            border: 1px solid #BFD464;
            border-top-color: #E0E880;
            border-left-color: #E0E880;
            color: #BFD464;
            background-color: white;
            margin-top: 5px;
            padding: 40px 0px 0 95px;
            height: 350px;
            width: 35%;
            line-height: 2px;
            font-size: 25px;
        }

        .referentBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 469px 0 0 -660px;
        }

        .form2Title {
            margin: -420px 70px 0 0;
            font-size: 29px;
            font-weight: bold;
            text-align: right;
            color: #C1D100;
            letter-spacing: -5px;
        }

        .form2 {
            position: relative;
            width: 240px;
            height: 410px;
            background: radial-gradient(circle at 0% 50%, #ffffff -15%, #D3E052 70%);
            float: right;
            margin: -38px 45px 0 0;
            font-size: 28px;
            line-height: 34px;
        }

        .form2Text1 {
            margin: 0;
            padding: 10px 25px 10px 0px;
            font-size: 22px;
            text-align: right;
            color: white;
            background: linear-gradient(to right ,#CCDA31 5%, #13A538 35%);
        }

        input[type="checkbox"] {
            width: 25px;
            height: 25px;
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
            transform: translate(-95%, 105%) scale(0.32);
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
            transform: translate(-95%, 218%) scale(0.32);
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
            transform: translate(-95%, 331%) scale(0.32);
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
            transform: translate(-95%, 444%) scale(0.32);
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
            transform: translate(-95%, 557%) scale(0.32);
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
            transform: translate(-95%, 670%) scale(0.32);
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
            transform: translate(-95%, 783%) scale(0.32);
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
            transform: translate(-95%, 896%) scale(0.32);
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
            transform: translate(-95%, 1009%) scale(0.32);
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
            transform: translate(-95%, 1122%) scale(0.32);
            width: 30px;
            height: 30px;
            z-index: -1;
            }

            input[type="checkbox"]:checked::before {
            content: url('../../includes/img/checkbox.png');
            z-index: 1;
        }

        .form2Text2 {
            margin: 385px 80px 0 0;
            font-size: 18px;
            text-align: right;
            color: #C1D100;
        }

        .submitRight {
            text-align: right;
        }
        
        input::placeholder {
            color: #BFD464;
        }

        input[type="submit"] {
            background-color: #13A538;
            color: white;
            border: none;
            font-size: 28px;
            margin: 15px 85px 0 0;
            padding: 7px 36px 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            color: #13A538;
            background-color: #C1D100;
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
            <p class="title">Je confirme la valeur de ton engagement</p>
            <p class="choiceTitle">RÉFÉRENT</p>
        </header>
        <div>
            <div class="navbar">
            <a href="" style="color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="" style="color: white; background-color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="referentBG" src="../../includes/img/referentBG.png">
            </div>
            <div>
                <p class="formTitle">Le projet Jeunes 6.4 est un dispositif de valorisation de l'engagement des jeunes en Pyrénées-Atlantiques. Il est soutenu par l'État, le Conseil Général, le Conseil Régional,<br>les CAF Béarn Soule et Pays Basque, la MSA (Mutualité Sociale Agricole) et la CPAM (Caisse Primaire d'Assurance Maladie).<br><br>
                
                Ce dispositif vise à encourager et reconnaître l'engagement des jeunes dans des actions citoyennes, solidaires, culturelles, sportives ou environnementales.<br>Il offre aux jeunes des opportunités de s'impliquer dans des projets concrets et bénéfiques pour la société,<br>tout en valorisant leurs compétences et en favorisant leur insertion sociale et professionnelle.<br><br>
                
                Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune.</p>
                <form action="#" method="post" style="margin-top: 20px;">
                    <div class="form0">
                        <p class="form0Text1" style="padding: 6px 0px 8px;">COMMENTAIRES</p>
                        <textarea type="text" id="commentaires" name="commentaires" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 28px; border: none; outline: none; margin: 30px 0px 0px 25px; padding: 0; width: 190px; height: 317px; resize: none;"></textarea>
                    </div>
                    <div class="form1Center">
                        <div class="form1">
                            <label for="nom" style="margin-left: -65px; font-size: 18px;">NOM DU JEUNE :</label>
                            <input type="text" id="nom" name="nom" placeholder="<?php echo $_SESSION['nom']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-15%); margin: -30px 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin:2px 0 0px 83px; padding: 0; width: 523px;"></p>
                            <br>
                            <label for="prenom" style="margin-left: -65px; font-size: 18px;">PRENOM DU JEUNE :</label>
                            <input type="text" id="prenom" name="prenom" placeholder="<?php echo $_SESSION['prenom']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-15%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -13px 0 17px 120px; padding: 0; width: 486px;"></p>
                            <br>
                            <label for="dateDeNaissance" style="margin-left: -65px; font-size: 18px;">DATE DE NAISSANCE DU JEUNE :</label>
                            <input type="text" id="dateDeNaissance" name="dateDeNaissance" placeholder="<?php echo date('d/m/Y', strtotime($_SESSION['dateDeNaissance'])); ?>" pattern="\d{2}/\d{2}/\d{4}" max="9999-12-31" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-62%); margin: 0 0 0 232px; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -37px 0 0px 227px; padding: 0; width: 380px;"></p>
                            <br>
                            <label for="email" style="margin-left: -65px; font-size: 18px;">E-MAIL DU JEUNE :</label>
                            <input type="email" id="email" name="email" placeholder="<?php echo $_SESSION['email']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -13px 0 -15px 100px; padding: 0; width: 508px;"></p>
                            <br>
                            <label for="engagement" style="margin-left: -65px; font-size: 18px;">ENGAGEMENT DU JEUNE :</label>
                            <input type="text" id="engagement" name="engagement" placeholder="<?php echo $_SESSION['engagement']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-5%); margin: 0 0 0 -30px; padding: 30px; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -43px 0 3px 168px; padding: 0; width: 440px;"></p>
                            <br>
                            <label for="duree" style="margin-left: -65px; font-size: 18px;">DUREE DE SON ENGAGEMENT :</label>
                            <input type="text" id="duree" name="duree" placeholder="<?php echo $_SESSION['dureeEngagement']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-10%); margin: 0px; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -13px 0 0 215px; padding: 0; width: 392px;"></p>
                            <br>
                            <label for="duree" style="margin-left: -65px; font-size: 18px;">MILIEU DE SON ENGAGEMENT :</label>
                            <input type="text" id="duree" name="duree" placeholder="<?php echo $_SESSION['milieuEngagement']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-10%); margin: 0px; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -13px 0 0 212px; padding: 0; width: 395px;"></p>
                            <br>
                            <label for="engagement" style="margin-left: -65px; font-size: 18px;">VOTRE NOM :</label>
                            <input type="text" id="engagement" name="engagement" placeholder="<?php echo $_SESSION['nomReferent']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-5%); margin: -10px 0 0 -30px; padding: 30px; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -43px 0 3px 55px; padding: 0; width: 552px;"></p>
                            <br>
                            <label for="duree" style="margin-left: -65px; font-size: 18px;">VOTRE PRENOM :</label>
                            <input type="text" id="duree" name="duree" placeholder="<?php echo $_SESSION['prenomReferent']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-10%); margin: 0px; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -13px 0 0 92px; padding: 0; width: 515px;"></p>
                            <br>
                            <label for="duree" style="margin-left: -65px; font-size: 18px;">VOTRE E-MAIL :</label>
                            <input type="text" id="duree" name="duree" placeholder="<?php echo $_SESSION['emailReferent']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 30px; border: none; outline: none; transform: translateY(-10%); margin: 0px; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -13px 0 0 72px; padding: 0; width: 534px;"></p>
                            <input type="submit" name="modifierMonProfil" style="margin: 10% 0 0 20%;" value="Modifier mon profil">
                        </div>
                    </div>
                    <p class="form2Title">SES SAVOIRS ETRE</p>
                    <div class="form2">
                        <p class="form2Text1">Je confirme sa (son)*</p>
                        <label><input type="checkbox" class="checkbox1" name="qualites" value="confiance" style="margin: 8px 12px 0 15px;">Confiance</label>
                        <br>
                        <label><input type="checkbox" class="checkbox2" name="qualites" value="bienveillance" style="margin: 0px 12px 0 15px;">Bienveillance</label>
                        <br>
                        <label><input type="checkbox" class="checkbox3" name="qualites" value="respect" style="margin: 0px 12px 0 15px;">Respect</label>
                        <br>
                        <label><input type="checkbox" class="checkbox4" name="qualites" value="honnêteté" style="margin: 0px 12px 0 15px;">Honnêteté</label>
                        <br>
                        <label><input type="checkbox" class="checkbox5" name="qualites" value="tolérance" style="margin: 0px 12px 0 15px;">Tolérance</label>
                        <br>
                        <label><input type="checkbox" class="checkbox6" name="qualites" value="bienveillance" style="margin: 0px 12px 0 15px;">Bienveillance</label>
                        <br>
                        <label><input type="checkbox" class="checkbox7" name="qualites" value="respect" style="margin: 0px 12px 0 15px;">Respect</label>
                        <br>
                        <label><input type="checkbox" class="checkbox8" name="qualites" value="juste" style="margin: 0px 12px 0 15px;">Juste</label>
                        <br>
                        <label><input type="checkbox" class="checkbox9" name="qualites" value="impartial" style="margin: 0px 12px 0 15px;">Impartial</label>
                        <br>
                        <label><input type="checkbox" class="checkbox10" name="qualites" value="travail" style="margin: 0px 12px 0 15px;">Travail</label>
                    </div>
                    <p class="form2Text2">*Faire 4 choix maximum</p>
                    <div class="submitRight">
                        <input type="submit" name="envoi2" value="Valider">
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
