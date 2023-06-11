<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['id'])) {
    echo '<script>window.location.href = "./connexion.php";</script>';
    exit();
}

// Display "Mon Profil" button
echo "<form action='' method='POST' style='position: absolute; top: 215px; left: 2%;'>
        <button type='submit' name='monProfil' style='
            background-color: #E6007E;
            color: white;
            border: none;
            font-size: 25px;
            padding: 7px 36px 5px;
            cursor: pointer;
        '>MON PROFIL</button>
    </form>";
    
// Check if "Mon Profil" button is clicked
if(isset($_POST['monProfil'])){
    echo '<script>window.location.href = "./voirMonProfil.php";</script>';
    exit();
}

// Display "Se Déconnecter" button
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

// Check if "Se Déconnecter" button is clicked
if(isset($_POST['seDeconnecter'])){
    // Destroy the session and redirect to the "connexion.php" page
    session_destroy();
    echo '<script>window.location.href = "./connexion.php";</script>';
    exit();
}
// Display welcome message with user's name
echo "<p style='
            margin: 0 auto;
            transform: translateY(952%);
            font-size: 31px;
            color: #E6007E;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
            '>Bienvenue dans votre espace JEUNE, " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . ".</p>";

?>

<style>
    
</style>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        /* CSS styles for the page body */
        body {
            margin: -36px 0 0 0;
            padding: 0;
            font-family: "Arial Arabic", Arial, sans-serif;
            background: 
                radial-gradient(circle at 0% 100%, grey -7.5%, #ffffff 12.5%) top left / 50% 100% no-repeat,
                radial-gradient(circle at 100% 100%, grey -7.5%, #ffffff 12.5%) top right / 50% 100% no-repeat;
            height: 100vh;
            overflow: hidden;
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

        /* CSS styles for the links */
        a {
            cursor: pointer;
            margin: 0 20px;
            padding-top: 50px;
            text-decoration: none;
            font-size: 30px;
            letter-spacing: -3px;
		}

        /* CSS styles for the font */
        @font-face {
            font-family: 'brush-script-mt-italic';
            src: url('../../font/BRUSHSCI.ttf') format('TrueType');
        }
        
        /* CSS styles for the jeuneBG image */
        .jeuneBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 448px 0 0 -660px;
        }
        /* CSS styles for the buttons title */
        .buttonsTitle {
            margin-top: 75px;
            font-size: 31px;
            color: #E6007E;
            letter-spacing: 1px;
            display: flex;
            text-align: center;
            justify-content: center;
        }
        
        /* CSS styles for button1 */
        .button1 {
            background-color: #FCE5F0;
            color: #E6007E;
            border: 10px solid #E6007E;
            font-size: 28px;
            position: relative;
            top: 20px;
            margin: 0 0 0 30%;
            padding: 7px 36px 5px;
            cursor: pointer;
            letter-spacing: 0px;
            z-index: 1;
        }

        /* CSS styles for button1 hover */
        .button1:hover{
            color: #FCE5F0;
            background-color: #E6007E;
            border: 10px solid #FCE5F0;
            transition: 0.2s ease-in;
        }

        /* CSS styles for button3 */
        .button3 {
            background-color: #FCE5F0;
            color: #E6007E;
            border: 10px solid #E6007E;
            font-size: 28px;
            position: relative;
            top: 140px;
            margin: 0 0 0 30%;
            padding: 7px 36px 5px;
            cursor: pointer;
            letter-spacing: 0px;
            z-index: 1;
        }

        /* CSS styles for button3 hover */
        .button3:hover{
            color: #FCE5F0;
            background-color: #E6007E;
            border: 10px solid #FCE5F0;
            transition: 0.2s ease-in;
        }

         /* CSS styles for button4 */
        .button4 {
            background-color: #FCE5F0;
            color: #E6007E;
            border: 10px solid #E6007E;
            font-size: 28px;
            position: relative;
            top: 200px;
            margin: 0 0 0 30%;
            padding: 7px 36px 5px;
            cursor: pointer;
            letter-spacing: 0px;
            z-index: 1;
        }

        /* CSS styles for button4 hover */
        .button4:hover{
            color: #FCE5F0;
            background-color: #E6007E;
            border: 10px solid #FCE5F0;
            transition: 0.2s ease-in;
        }
        
        /* CSS styles for the footer */
        footer {
            margin: 0;
        }


    </style>
    </head>

    <body>
        <!-- HTML code for the header -->
        <header>
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je donne de la valeur à mon engagement</p>
            <p class="choiceTitle">JEUNE</p>
        </header>
        <div>
            <!-- HTML code for the navbar -->
            <div class="navbar">
            <a href="" style="color: white; background-color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/pasAccesReferent.html" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="../consultant/pasAccesConsultant.html" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="jeuneBG" src="../../includes/img/jeuneBG.png">
            </div>
        </div>
        <div>
            <!-- HTML code for the buttons section -->
            <p class="buttonsTitle">Que voulez-vous faire ?</p>
            <a class="button1" href="../jeune/demandeDeReference.php">Créer une demande de référence</a>
            <br>
            <a class="button3" href="../jeune/envoiConsultant.php">Envoyer des références validées au Consultant</a>
            <br>
            <a class="button4" href="../jeune/creationCompte.php">Inclure des références validées dans son CV</a>
        </div>
        <footer>

        </footer>
    </body>
</html>
