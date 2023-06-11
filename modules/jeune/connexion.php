<?php
// Redirect to the control center if the user is already logged in
session_start();

if (isset($_SESSION['id'])) {
    echo '<script>window.location.href = "./centreDeControle.php";</script>';
}

$bdd = new PDO('mysql:host=localhost;dbname=id20895683_comptes_jeune;charset=utf8;', 'id20895683_root', 'DevWeb0795%');
if(isset($_POST['envoi'])){
    $email = htmlspecialchars($_POST['email']);
    $motDePasse = sha1($_POST['motDePasse']);

    // Retrieve user data from the database
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ? AND motDePasse = ?');
    $recupUser->execute(array($email, $motDePasse));

    // If user exists, store user information in session and redirect to control center
    if($recupUser->rowCount() > 0) {
        $user = $recupUser->fetch();
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['dateDeNaissance'] = $user['dateDeNaissance'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['motDePasse'] = $user['motDePasse'];
        $_SESSION['id'] = $user['id'];

        header("Location: ./centreDeControle.php");
    } else {
        $erreurConnexion = "erreurConnexion";
        echo "<p class='" . $erreurConnexion . "' style='color: red; margin: 625px 0 0 810px; z-index: 3; position: absolute;'>email et/ou mot de passe incorrect(s).</p>";
    }
}
?>

<script>
    // Remove error message after 2 seconds
    setTimeout(function() {
        var elem = document.getElementsByClassName('erreurConnexion')[0];
        elem.parentNode.removeChild(elem);
    }, 2000);
</script>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        /* CSS styles for the body */
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial Arabic", Arial, sans-serif;
            background: 
                radial-gradient(circle at 0% 100%, grey -7.5%, #ffffff 12.5%) top left / 50% 100% no-repeat,
                radial-gradient(circle at 100% 100%, grey -7.5%, #ffffff 12.5%) top right / 50% 100% no-repeat;
            height: 100vh;
        }
        
        /* CSS styles for the header */
        header {
            padding: 0;
            background: radial-gradient(circle at 25% 100%, #ffffff 0%, #C6C6C6 30%);
            height: 200px;
        }
        
        /* CSS styles for the logo */
        .logo {
            position: relative;
            margin: -25px 0 0 0;
            scale: 0.7;
        }
        
        /* CSS styles for the choice title */
        .choiceTitle {
            margin: -185px 40px 0 0;
            color: #E6007E;
            font-size: 120px;
            text-align: right;
            letter-spacing: -8px;
        }
        
        /* CSS styles for the title */
        .title {
            margin: -115px 40px 0 0;
            color: white;
            font-size: 60px;
            letter-spacing: 2px;
            text-align: right;
        }

        /* CSS styles for the navbar */
        .navbar {
            margin: 0 26%;
            height: 70px;
            background: radial-gradient(circle at 25% -100%, #ffffff 0%, #CCCCCC 30%);
            text-align: center;
            line-height: 75px;
        }

        /* CSS styles for the links in the navbar */
        a {
            cursor: pointer;
            margin: 0 20px;
            padding-top: 50px;
            text-decoration: none;
            font-size: 30px;
            letter-spacing: -3px;
		}
        
        /* CSS styles for the form container */
        .form1Center {
            display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
        }
        
        /* CSS styles for the form title */
        .formTitle {
            margin-top: 40px;
            font-size: 31px;
            color: #E6007E;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
        }
        
        /* CSS styles for the custom font */
        @font-face {
            font-family: 'brush-script-mt-italic';
            src: url('../../font/BRUSHSCI.ttf') format('TrueType');
        }
        
        /* CSS styles to hide the default date picker icon */
        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }
        
        /* CSS styles for the form */
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
        
        /* CSS styles for the background image */
        .jeuneBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 448px 0 0 -660px;
        }
        
        /* CSS styles for the submit button */
        input[type="submit"] {
            background-color: #E6007E;
            color: white;
            border: none;
            font-size: 28px;
            margin: 50px 0px 0px 160px;
            padding: 7px 36px 5px;
            cursor: pointer;
        }
        
        /* CSS styles for the submit button on hover */
        input[type="submit"]:hover {
            color: #E6007E;
            background-color: #FCE5F0;
            transition: 0.2s ease-in;
        }
        
        /* CSS styles for the "Create a JEUNE account" link */
        .creationCompte {
            cursor: pointer;
            display: inline-block;
            margin: 50px 0 0 170px;
            padding: 0;
            text-decoration: none;
            color: #E6007E;
            font-size: 20px;
            letter-spacing: 0px;
        }
        
        /* CSS styles for the "Create a JEUNE account" link on hover */
        .creationCompte:hover{
            color: #13A538;
            transition: 0.2s ease-in;
        }

        /* CSS styles for the footer */
        footer {
            margin: 0;
        }


    </style>
    </head>

    <body>
        <!-- Header section -->
        <header>
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je donne de la valeur à mon engagement</p>
            <p class="choiceTitle">JEUNE</p>
        </header>
        <!-- Navigation section -->
        <div>
            <div class="navbar">
            <a href="" style="color: white; background-color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/pasAccesReferent.html" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="../consultant/pasAccesConsultant.html" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="jeuneBG" src="../../includes/img/jeuneBG.png">
            </div>
            <div>
                <p class="formTitle">Connectez-vous à votre compte JEUNE.</p>
                <form action="" method="POST" style="margin-top: 40px;">
                    <div class="form1Center">
                        <div class="form1">
                            <label for="email" style="margin-left: -65px;">E-mail :</label>
                            <input type="email" id="email" name="email" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 20px; padding: 0; width: 588px;"></p>
                            <br>
                            <label for="motDePasse" style="margin-left: -65px;">MOT DE PASSE :</label>
                            <input type="password" id="motDePasse" name="motDePasse" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 135px; padding: 0; width: 472px;"></p>
                            <input type="submit" name="envoi" value="CONNEXION">
                            <a class="creationCompte" href="../jeune/creationCompte.php">Créer un compte JEUNE</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
