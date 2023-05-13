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

        .form1Center {
            display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
        }

        .formTitle {
            margin-top: 25px;
            font-size: 33px;
            color: #009FE3;
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
            margin: 2px 35px 0 0;
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
            <p class="title">Je donne de la valeur à ton engagement</p>
            <p class="choiceTitle">CONSULTANT</p>
        </header>
        <div>
            <div class="navbar">
            <a href="../jeune/connexion.php" style="color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/index.php" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="" style="color: white; background-color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <img class="jeuneBG" src="../../includes/img/jeuneBG.png">
            </div>
            <div>
                <p class="formTitle">Validez cet engagement en prenant en compte sa valeur</p>
                <form action="#" method="post" style="margin-top: 40px;">
                    <div class="form1Center">
                        <div class="form1">
                            <label for="nom" style="margin-left: -65px;">NOM :</label>
                            <input type="text" id="nom" name="nom" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: -30px 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: 5px 0 0 8px; padding: 0; width: 600px;"></p>
                            <br>
                            <label for="prenom" style="margin-left: -65px;">PRENOM :</label>
                            <input type="text" id="prenom" name="prenom" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 59px; padding: 0; width: 550px;"></p>
                            <br>
                            <label for="dateDeNaissance" style="margin-left: -65px;">DATE DE NAISSANCE :</label>
                            <input type="date" id="dateDeNaissance" name="dateDeNaissance" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -18px 0 0 208px; padding: 0; width: 400px;"></p>
                            <br>
                            <label for="email" style="margin-left: -65px;">Mail :</label>
                            <input type="email" id="email" name="email" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 -5px; padding: 0; width: 612px;"></p>
                            <br>
                            <label for="reseauSocial" style="margin-left: -65px;">Réseau social :</label>
                            <input type="text" id="reseauSocial" name="reseauSocial" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 101px; padding: 0; width: 507px;"></p>
                            <br>
                            <label for="engagement" style="margin-left: -65px;">MON ENGAGEMENT :</label>
                            <input type="text" id="engagement" name="engagement" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0 0 0 -30px; padding: 30px; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -47px 0 0 192px; padding: 0; width: 415px;"></p>
                            <br>
                            <label for="duree" style="margin-left: -65px;">DUREE :</label>
                            <input type="text" id="duree" name="duree" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-10%); margin: 0px; padding: 0; width: 400px;" required>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 39px; padding: 0; width: 569px;"></p>
                        </div>
                    </div>
                    <p class="form2Title">MES SAVOIRS ETRE</p>
                    <div class="form2">
                        <p class="form2Text1">Je suis*</p>
                        <label><input type="checkbox" class="checkbox1" name="qualites" value="autonome" style="margin: 8px 12px 0 15px;">Autonome</label>
                        <br>
                        <label><input type="checkbox" class="checkbox2" name="qualites" value="passionné" style="margin: 0px 12px 0 15px;">Passionné</label>
                        <br>
                        <label><input type="checkbox" class="checkbox3" name="qualites" value="réfléchi" style="margin: 0px 12px 0 15px;">Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox4" name="qualites" value="a l'écoute" style="margin: 0px 12px 0 15px;">A l'écoute</label>
                        <br>
                        <label><input type="checkbox" class="checkbox5" name="qualites" value="organisé" style="margin: 0px 12px 0 15px;">Organisé</label>
                        <br>
                        <label><input type="checkbox" class="checkbox6" name="qualites" value="passionné" style="margin: 0px 12px 0 15px;">Passionné</label>
                        <br>
                        <label><input type="checkbox" class="checkbox7" name="qualites" value="fiable" style="margin: 0px 12px 0 15px;">Fiable</label>
                        <br>
                        <label><input type="checkbox" class="checkbox8" name="qualites" value="patient" style="margin: 0px 12px 0 15px;">Patient</label>
                        <br>
                        <label><input type="checkbox" class="checkbox9" name="qualites" value="réfléchi" style="margin: 0px 12px 0 15px;">Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox10" name="qualites" value="responsable" style="margin: 0px 12px 0 15px;">Responsable</label>
                        <br>
                        <label><input type="checkbox" class="checkbox11" name="qualites" value="sociable" style="margin: 0px 12px 0 15px;">Sociable</label>
                        <br>
                        <label><input type="checkbox" class="checkbox12" name="qualites" value="optimiste" style="margin: 0px 12px 0 15px;">Optimiste</label>
                    </div>
                    <p class="form2Text2">*Faire 4 choix maximum</p>
                    <div class="submitRight">
                        <input type="submit" value="Valider">
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
