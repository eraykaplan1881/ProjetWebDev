<?php
session_start();

if (!isset($_SESSION['id'])) {
    echo '<script>window.location.href = "./connexion.php";</script>';
    exit();
}

// Connect to the database
$bdd = new PDO('mysql:host=localhost;dbname=id20895683_comptes_jeune;charset=utf8;', 'id20895683_root', 'DevWeb0795%');

// Handle the form submission for profile modification
if(isset($_POST['validerLaModification'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $dateDeNaissance = htmlspecialchars($_POST['dateDeNaissance']);
    $email = htmlspecialchars($_POST['email']);
    $motDePasse = sha1($_POST['motDePasse']);

    //Update the user's profile in the database
    $updateUser = $bdd->prepare('UPDATE users SET nom = ?, prenom = ?, dateDeNaissance = ?, email = ?, motDePasse = ? WHERE id = ?');
    $updateUser->execute(array($nom, $prenom, $dateDeNaissance, $email, $motDePasse, $_SESSION['id']));

    // Update session variables with the new values
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['dateDeNaissance'] = $dateDeNaissance;
    $_SESSION['email'] = $email;
    $_SESSION['motDePasse'] = $motDePasse;

    // Redirect the user to the modified profile page
    echo '<script>window.location.href = "./voirMonProfil.php";</script>';
    exit();
}

// Display the "Centre de Contrôle" button
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
    
//Handle the "Centre de Contrôle" button click
if(isset($_POST['centreDeControle'])){
    echo '<script>window.location.href = "./centreDeControle.php";</script>';
    exit();
}

// Display the "Se Déconnecter" button
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

//Handle the "Se Déconnecter" button click
if(isset($_POST['seDeconnecter'])){
    session_destroy();
    echo '<script>window.location.href = "./connexion.php";</script>';
    exit();
}

// Display a message indicating that the user is about to modify their profile
echo "<p style='
            margin: 0 auto;
            transform: translateY(980%);
            font-size: 31px;
            color: #E6007E;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
            '>Vous vous apprêtez à modifier votre profil.</p>";

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <!-- Comment: Meta tags and title -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <!-- Comment: CSS styles -->
    <style>
        body {
            margin: -36px 0 0 0;
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
            margin-top: 95px;
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

        input::placeholder {
            color: #2A206E;
        }

        input[type="submit"] {
            background-color: #E6007E;
            color: white;
            border: none;
            font-size: 28px;
            margin: 45px 0px 0px 110px;
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
        <!-- Comment: Header section -->
        <header>
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je donne de la valeur à mon engagement</p>
            <p class="choiceTitle">JEUNE</p>
        </header>
        <div>
            <!-- Comment: Navigation bar section -->
            <div class="navbar">
            <a href="" style="color: white; background-color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/pasAccesReferent.html" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="../consultant/pasAccesConsultant.html" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="jeuneBG" src="../../includes/img/jeuneBG.png">
            </div>
            
            <div>
                <!-- Comment: Form for account creation -->
                <form id="formCreationCompte" action="" method="POST" style="margin-top: 40px;">
                    <div class="form1Center">
                        <div class="form1">
                            <label for="nom" style="margin-left: -65px;">NOM :</label>
                            <input type="text" id="nom" name="nom" placeholder="<?php echo empty($_POST['nom']) ? $_SESSION['nom'] : ''; ?>" value="<?php echo $_POST['nom'] ?? $_SESSION['nom']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: -30px 0; padding: 0; width: 400px;">
                            <p style="border-bottom: 3px dotted #E6007E; margin: 5px 0 0 8px; padding: 0; width: 600px;"></p>
                            <br>
                            <label for="prenom" style="margin-left: -65px;">PRENOM :</label>
                            <input type="text" id="prenom" name="prenom" placeholder="<?php echo empty($_POST['prenom']) ? $_SESSION['prenom'] : ''; ?>" value="<?php echo $_POST['prenom'] ?? $_SESSION['prenom']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: 0; padding: 0; width: 400px;">
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 59px; padding: 0; width: 550px;"></p>
                            <br>
                            <label for="dateDeNaissance" style="margin-left: -65px;">DATE DE NAISSANCE :</label>
                            <input type="date" id="dateDeNaissance" name="dateDeNaissance" placeholder="<?php echo empty($_SESSION['dateDeNaissance']) ? $_SESSION['dateDeNaissance'] : ''; ?>" value="<?php echo $_SESSION['dateDeNaissance'] ?? $_SESSION['dateDeNaissance']; ?>" pattern="\d{2}/\d{2}/\d{4}" max="9999-12-31" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0; padding: 0; width: 400px;">
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 208px; padding: 0; width: 400px;"></p>
                            <br>
                            <label for="email" style="margin-left: -65px;">Mail :</label>
                            <input type="email" id="email" name="email" placeholder="<?php echo empty($_POST['email']) ? $_SESSION['email'] : ''; ?>" value="<?php echo $_POST['email'] ?? $_SESSION['email']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;">
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 -5px; padding: 0; width: 612px;"></p>
                            <br>
                            <label for="motDePasse" style="margin-left: -65px;">MOT DE PASSE :</label>
                            <input type="password" id="motDePasse" name="motDePasse" placeholder="<?php echo empty($_POST['motDePasse']) ? '••••••••' : ''; ?>" value="<?php echo $_POST['motDePasse'] ?? ''; ?>" required pattern=".{8,}" title="Votre mot de passe doit comporter au moins 8 caractères." style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0; padding: 0; width: 400px;">
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 135px; padding: 0; width: 472px;"></p>
                            <input type="submit" name="validerLaModification" value="Valider la modification">
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
