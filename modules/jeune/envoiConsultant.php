<?php
session_start();

// Database connection
$bdd = new PDO('mysql:host=localhost;dbname=id20895683_comptes_jeune;charset=utf8;', 'id20895683_root', 'DevWeb0795%');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../includes/vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer as PHPMailerBis;
    use PHPMailer\PHPMailer\SMTP as SMTPBis;

// If the form is submitted
if(isset($_POST['envoi'])){
    
    // Get form data
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $dateDeNaissance = htmlspecialchars($_POST['dateDeNaissance']);
    $email = htmlspecialchars($_POST['email']);
    $motDePasse = sha1($_POST['motDePasse']);

    // Insert user data into the database
    $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, dateDeNaissance, email, motDePasse) VALUES (?, ?, ?, ?, ?)');
    $insertUser->execute(array($nom, $prenom, $dateDeNaissance, $email, $motDePasse));
    
    // Retrieve user data from the database
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE nom = ? AND prenom = ? AND dateDeNaissance = ? AND email = ? AND motDePasse = ?');
    $recupUser->execute(array($nom, $prenom, $dateDeNaissance, $email, $motDePasse));
    
    // If user data is found
    if($recupUser->rowCount() > 0) {
        
        // Store user data in session variables
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['dateDeNaissance'] = $dateDeNaissance;
        $_SESSION['email'] = $email;
        $_SESSION['motDePasse'] = $motDePasse;
        $_SESSION['id'] = $recupUser->fetch()['id'];
    }

    // Redirect to the connection page
    echo '<script>window.location.href = "./connexion.php";</script>';
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
    
        /* CSS styles for the page layout and elements */
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

        input[type="submit"] {
            background-color: #E6007E;
            color: white;
            border: none;
            font-size: 28px;
            margin: 70px 0px 0px 110px;
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
        <!-- Header section -->
        <header>
            <!-- Logo and titles -->
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je donne de la valeur à mon engagement</p>
            <p class="choiceTitle">JEUNE</p>
        </header>
        
        <!-- Navigation section -->
        <div>
            <!-- Navigation links and background image -->
            <div class="navbar">
            <a href="" style="color: white; background-color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/pasAccesReferent.html" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="../consultant/pasAccesConsultant.html" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="jeuneBG" src="../../includes/img/jeuneBG.png">
            </div>
            
            <!-- Account creation form section -->
            <div>
                <!-- Form title and form elements -->
                <p class="formTitle">Envoyez votre référence confirmée à un consultant.</p>
                <form id="formCreationCompte" action="" method="POST" style="margin-top: 40px;">
                    <div class="form1Center">
                        <div class="form1">
                            <label for="nom" style="margin-left: -65px;">NOM DU CONSULTANT :</label>
                            <input type="text" id="nom" name="nom" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: -30px 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: 5px 0 25px 230px; padding: 0; width: 400px;"></p>
                            <br>
                            <label for="prenom" style="margin-left: -65px;">PRENOM DU CONSULTANT :</label>
                            <input type="text" id="prenom" name="prenom" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: -10px 0 0 200px; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -35px 0 0 275px; padding: 0; width: 355px;"></p>
                            <br>
                            <label for="email" style="margin-left: -65px;">MAIL DU CONSULTANT :</label>
                            <input type="email" id="email" name="email" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 222px; padding: 0; width: 407px;"></p>
                            <input type="submit" name="envoi" value="Envoyer ma référence">
                        </div>
                    </div>
                </form>
                <script>
                </script>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
