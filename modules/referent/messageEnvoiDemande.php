<!DOCTYPE html>
<html lang="fr">
    <head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the page -->
    <title>Accueil</title>
    <!-- CSS styles -->
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

        .formTitle {
            margin-top: 100px;
            font-size: 31px;
            color: #13A538;
            letter-spacing: 1px;
            display: flex;
            text-align: center;
            justify-content: center;
        }

        .referentBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 469px 0 0 -660px;
        }

        footer {
            margin: 0;
        }


    </style>
    </head>

    <body>
        <!-- Header section -->
        <header>
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je confirme la valeur de ton engagement</p>
            <p class="choiceTitle">RÉFÉRENT</p>
        </header>
        <div>
            <!-- Navbar section -->
            <div class="navbar">
            <a href="" style="color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="" style="color: white; background-color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="" style="color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="referentBG" src="../../includes/img/referentBG.png">
            </div>
            <div>
                <!-- Form title section -->
                <p class="formTitle">Votre demande de référence a été envoyé avec succès.</p>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
