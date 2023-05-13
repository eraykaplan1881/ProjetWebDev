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
            overflow: hidden;
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
            color: #009FE3;
            font-size: 120px;
            text-align: right;
            letter-spacing: -4px;
        }

        .title {
            margin: -115px 40px 0 0;
            color: white;
            font-size: 60px;
            letter-spacing: 3px;
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
            margin-top: 25px;
            font-size: 31px;
            color: #009FE3;
            letter-spacing: 1px;
            display: flex;
            text-align: center;
            justify-content: center;
        }

        .consultantBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 300px 0 0 -600px;
            transform: rotate(15deg);
        }

        footer {
            margin: 0;
        }


    </style>
    </head>

    <body>
        <header>
            <img class="logo" src="../../includes/img/logo.png">
            <p class="title">Je donne de la valeur à ton engagement</p>
            <p class="choiceTitle">CONSULTANT</p>
        </header>
        <div>
            <div class="navbar">
            <a href="../jeune/connexion.php" style="color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/pasAccesReferent.php" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="" style="color: white; background-color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="consultantBG" src="../../includes/img/consultantBG.png">
            </div>
            <div>
                <p class="formTitle">Nous sommes désolés,<br>seul un consultant ayant reçu un lien par mail a accès à cette page.</p>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>
