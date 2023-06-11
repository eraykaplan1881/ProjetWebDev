<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Page title -->
    <title>Accueil</title>
    <!-- CSS styles -->
    <style>
        /* Body styles */
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
        
        /* Header styles */
        header {
            padding: 0;
            background: radial-gradient(circle at 25% 100%, #ffffff 0%, #C6C6C6 30%);
            height: 200px;
        }
        
        /* Logo styles */
        .logo {
            position: relative;
            margin: -25px 0 0 0;
            scale: 0.7;
        }
        
        /* Choice title styles */
        .choiceTitle {
            margin: -185px 40px 0 0;
            color: #009FE3;
            font-size: 120px;
            text-align: right;
            letter-spacing: -4px;
        }
        
        /* Title styles */
        .title {
            margin: -115px 40px 0 0;
            color: white;
            font-size: 60px;
            letter-spacing: 3px;
            text-align: right;
        }
        
        /* Navbar styles */
        .navbar {
            margin: 0 26%;
            height: 70px;
            background: radial-gradient(circle at 25% -100%, #ffffff 0%, #CCCCCC 30%);
            text-align: center;
            line-height: 75px;
        }
        
        /* Link styles */
        a {
            cursor: pointer;
            margin: 0 20px;
            padding-top: 50px;
            text-decoration: none;
            font-size: 30px;
            letter-spacing: -3px;
		}
		
        /* Form 1 center styles */
        .form1Center {
            display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
        }
        
         /* Form title styles */
        .formTitle {
            margin-top: 25px;
            font-size: 33px;
            color: #009FE3;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
        }
        
        /* Define a custom font */
        @font-face {
            font-family: 'brush-script-mt-italic';
            src: url('../../font/BRUSHSCI.ttf') format('TrueType');
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            display: none;
        }
        
        /* Form 1 styles */
        .form1 {
            position: relative;
            margin-left: -1000px;
            z-index: 2;
            border: 1px solid #E6007E;
            border-top-color: #d6a1be;
            border-left-color: #d6a1be;
            color: #E6007E;
            background-color: white;
            margin-top: 20px;
            padding: 40px 0px 0 95px;
            height: 400px;
            width: 700px;
            line-height: 2px;
            font-size: 25px;
        }
        
        /* ConsultantBG styles */
        .consultantBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 300px 0 0 -600px;
            transform: rotate(15deg);
        }
        
        /* form2Title styles */
        .form2Title {
            z-index: 3;
            margin: -375px 55px 0 0;
            font-size: 29px;
            font-weight: bold;
            text-align: left;
            color: white;
            letter-spacing: -5px;
        }
        
        /* Form 2 styles */
        .form2 {
            z-index: 2;
            position: relative;
            width: 600px;
            height: 200px;
            background: radial-gradient(circle at 0% 50%, #ffffff 0%, #FCE5F0 70%);
            float: left;
            margin: 100px 35px 0 120px;
            font-size: 25px;
        }
        
        /* Form2Text1 styles */
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
        
        /* Checkbox1 styles */
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
        
        /* Checkbox2 styles */
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

        /* Checkbox3 styles */
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

        /* Checkbox4 styles */
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

        /* Checkbox5 styles */
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
        
        /* Checkbox6 styles */
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

        /* Checkbox7 styles */
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

        /* Checkbox8 styles */
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

        /* Checkbox9 styles */
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

        /* Checkbox10 styles */
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

        /* Checkbox11 styles */
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

        /* Checkbox12 styles */
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

        /* form2Text2 styles */
        .form2Text2 {
            margin: 430px 95px 0 0;
            font-size: 17px;
            text-align: right;
            color: #E6007E;
        }

        /* SubmitRight styles */
        .submitRight {
            text-align: right;
        }
        
        input::placeholder {
            color: #E6007E;
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
        
        /* Form 3 center styles */
        .form3Center {
            display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
        }
        
         /* Form title styles */
        .formTitle {
            margin-top: 25px;
            font-size: 33px;
            color: #009FE3;
            letter-spacing: 1px;
            display: flex;
            justify-content: center;
        }
        
        /* Form 3 styles */
        .form3 {
            position: relative;
            margin-left: 230px;
            z-index: 2;
            border: 1px solid #BFD464;
            border-top-color: #BFD464;
            border-left-color: #BFD464;
            color: #BFD464;
            background-color: white;
            margin-top: -100px;
            padding: 40px 0px 0 95px;
            height: 400px;
            width: 700px;
            line-height: 2px;
            font-size: 25px;
        }
        
        /* ConsultantBG styles */
        .consultantBG {
            position: absolute;
            z-index: 1;
            text-align: center;
            scale: 2.15;
            margin: 300px 0 0 -600px;
            transform: rotate(15deg);
        }
        
        /* form4Title styles */
        .form4Title {
            z-index: 3;
            margin: -375px 55px 0 0;
            font-size: 29px;
            font-weight: bold;
            text-align: left;
            color: white;
            letter-spacing: -5px;
        }
        
        /* Form 4 styles */
        .form4 {
            z-index: 2;
            position: relative;
            width: 600px;
            height: 200px;
            background: radial-gradient(circle at 0% 50%, #ffffff 0%, #BFD464 70%);
            float: left;
            margin: 100px 35px 0 370px;
            font-size: 25px;
        }
        
        /* Form4Text1 styles */
        .form4Text1 {
            margin: 0;
            padding-right: 30px;
            font-size: 34px;
            text-align: right;
            color: white;
            background: linear-gradient(to right ,#CCDA31 -5%, #13A538 35%);
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
        
        /* Checkbox1 styles */
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
        
        /* Checkbox2 styles */
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

        /* Checkbox3 styles */
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

        /* Checkbox4 styles */
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

        /* Checkbox5 styles */
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
        
        /* Checkbox6 styles */
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

        /* Checkbox7 styles */
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

        /* Checkbox8 styles */
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

        /* Checkbox9 styles */
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

        /* Checkbox10 styles */
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

        /* Checkbox11 styles */
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

        /* Checkbox12 styles */
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

        /* form4Text2 styles */
        .form2Text2 {
            margin: 430px 95px 0 0;
            font-size: 17px;
            text-align: right;
            color: #E6007E;
        }
        
        #nomReferent::placeholder {
            color: #BFD464; /* Change the color value as desired */
        }
        
        #prenomReferent::placeholder {
            color: #BFD464; /* Change the color value as desired */
        }
        
        #emailReferent::placeholder {
            color: #BFD464; /* Change the color value as desired */
        }


        footer {
            margin: 0;
        }


    </style>
    </head>

    <body>
        <!-- Header -->
        <header>
            <!-- Logo -->
            <img class="logo" src="../../includes/img/logo.png">
            <!-- Title -->
            <p class="title">Je donne de la valeur à ton engagement</p>
            <!-- Choice Title -->
            <p class="choiceTitle">CONSULTANT</p>
        </header>
        <!-- Navbar -->
        <div>
            <div class="navbar">
            <!-- Links -->
            <a href="../jeune/connexion.php" style="color: #E6007E; padding: 2px 10px;">JEUNE</a>
            <a href="../referent/index.php" style="color: #13A538; padding: 2px 10px;">RÉFÉRENT</a>
            <a href="" style="color: white; background-color: #009FE3; padding: 2px 10px;">CONSULTANT</a>
            <a href="../../includes/partenaires.html" style="color: #706F6F; padding: 2px 10px;">PARTENAIRES</a>
            <!-- Jeune Background Image -->
            <img class="consultantBG" src="../../includes/img/consultantBG.png">
            </div>
            <div>
                <!-- Form Title -->
                <p class="formTitle">Validez cet engagement en prenant en compte sa valeur</p>
                <form action="#" method="post" style="margin-top: 40px;">
                    <!-- Form Block 1 -->
                    <div class="form1Center">
                        <div class="form1">
                            <!-- Label and Input for Nom -->
                            <label for="nom" style="margin-left: -65px;">NOM :</label>
                            <input type="text" id="nom" name="nom" placeholder="<?php echo $_SESSION['nom']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: -30px 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #E6007E; margin: 5px 0 0 8px; padding: 0; width: 600px;"></p>
                            <br>
                            <!-- Label and Input for Prenom -->
                            <label for="prenom" style="margin-left: -65px;">PRENOM :</label>
                            <input type="text" id="prenom" name="prenom" placeholder="<?php echo $_SESSION['prenom']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 59px; padding: 0; width: 550px;"></p>
                            <br>
                            <!-- Label and Input for Date de Naissance -->
                            <label for="dateDeNaissance" style="margin-left: -65px;">DATE DE NAISSANCE :</label>
                            <input type="text" id="dateDeNaissance" name="dateDeNaissance" placeholder="<?php echo date('d/m/Y', strtotime($_SESSION['dateDeNaissance'])); ?>" pattern="\d{2}/\d{2}/\d{4}" max="9999-12-31" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-5%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -18px 0 0 208px; padding: 0; width: 400px;"></p>
                            <br>
                            <!-- Label and Input for email -->
                            <label for="email" style="margin-left: -65px;">Mail :</label>
                            <input type="email" id="email" name="email" placeholder="<?php echo $_SESSION['email']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #E6007E; margin: -17px 0 0 -5px; padding: 0; width: 612px;"></p>
                        </div>
                    </div>
                    <!-- SAVOIRS ETRE Block -->
                    <p class="form2Title">MES SAVOIRS ETRE</p>
                    <div class="form2">
                        <p class="form2Text1">Je suis*</p>
                        <!-- Qualités Checkboxes -->
                        <label><input type="checkbox" class="checkbox1" name="qualites" value="autonome" style="margin: 8px 12px 0 15px;" disabled>Autonome</label>
                        
                        <label><input type="checkbox" class="checkbox2" name="qualites" value="passionné" style="margin: 0px 12px 0 15px;" disabled>Passionné</label>
                        
                        <label><input type="checkbox" class="checkbox3" name="qualites" value="réfléchi" style="margin: 0px 12px 0 15px;" disabled>Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox4" name="qualites" value="a l'écoute" style="margin: 5px 12px 0 15px;" disabled>A l'écoute</label>
                        
                        <label><input type="checkbox" class="checkbox5" name="qualites" value="organisé" style="margin: 0px 12px 0 15px;">Organisé</label>
                        
                        <label><input type="checkbox" class="checkbox6" name="qualites" value="passionné" style="margin: 0px 12px 0 15px;" disabled>Passionné</label>
                        <br>
                        <label><input type="checkbox" class="checkbox7" name="qualites" value="fiable" style="margin: 5px 12px 0 15px;" disabled>Fiable</label>
                        
                        <label><input type="checkbox" class="checkbox8" name="qualites" value="patient" style="margin: 0px 12px 0 15px;" disabled>Patient</label>
                        
                        <label><input type="checkbox" class="checkbox9" name="qualites" value="réfléchi" style="margin: 0px 12px 0 15px;" disabled>Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox10" name="qualites" value="responsable" style="margin: 5px 12px 0 15px;" disabled>Responsable</label>
                        
                        <label><input type="checkbox" class="checkbox11" name="qualites" value="sociable" style="margin: 0px 12px 0 15px;" disabled>Sociable</label>
                        
                        <label><input type="checkbox" class="checkbox12" name="qualites" value="optimiste" style="margin: 0px 12px 0 15px;" disabled>Optimiste</label>
                    </div>
                    <div class="form3Center">
                        <div class="form3">
                            <!-- Label and Input for NomR -->
                            <label for="nomReferent" style="margin-left: -65px;">NOM DU REFERENT:</label>
                            <input type="text" id="nomReferent" name="nomReferent" placeholder="<?php echo $_SESSION['nomReferent']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: -30px 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: 5px 0 0 182px; padding: 0; width: 427px;"></p>
                            <br>
                            <!-- Label and Input for PrenomR -->
                            <label for="prenomReferent" style="margin-left: -65px;">PRENOM DU REFERENT :</label>
                            <input type="text" id="prenomReferent" name="prenomReferent" placeholder="<?php echo $_SESSION['prenomReferent']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-15%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -17px 0 0 242px; padding: 0; width: 367px;"></p>
                            <br>
                            <!-- Label and Input for emailR -->
                            <label for="emailReferent" style="margin-left: -65px;">MAIL DU REFERENT :</label>
                            <input type="email" id="emailReferent" name="emailReferent" placeholder="<?php echo $_SESSION['emailReferent']; ?>" style="background-color: transparent; color: #2A206E; font-family: 'brush-script-mt-italic', sans-serif; font-size: 40px; border: none; outline: none; transform: translateY(-7.5%); margin: 0; padding: 0; width: 400px;" disabled>
                            <p style="border-bottom: 3px dotted #BFD464; margin: -17px 0 0 190px; padding: 0; width: 420px;"></p>
                        </div>
                    </div>
                    <!-- SAVOIRS ETRE Block -->
                    <p class="form4Title">MES SAVOIRS ETRE</p>
                    <div class="form4">
                        <p class="form4Text1">Je confirme sa (son)*</p>
                        <!-- Qualités Checkboxes -->
                        <label><input type="checkbox" class="checkbox1" name="qualites" value="autonome" style="margin: 8px 12px 0 15px;" disabled>Autonome</label>
                        
                        <label><input type="checkbox" class="checkbox2" name="qualites" value="passionné" style="margin: 0px 12px 0 15px;" disabled>Passionné</label>
                        
                        <label><input type="checkbox" class="checkbox3" name="qualites" value="réfléchi" style="margin: 0px 12px 0 15px;" disabled>Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox4" name="qualites" value="a l'écoute" style="margin: 5px 12px 0 15px;" disabled>A l'écoute</label>
                        
                        <label><input type="checkbox" class="checkbox5" name="qualites" value="organisé" style="margin: 0px 12px 0 15px;">Organisé</label>
                        
                        <label><input type="checkbox" class="checkbox6" name="qualites" value="passionné" style="margin: 0px 12px 0 15px;" disabled>Passionné</label>
                        <br>
                        <label><input type="checkbox" class="checkbox7" name="qualites" value="fiable" style="margin: 5px 12px 0 15px;" disabled>Fiable</label>
                        
                        <label><input type="checkbox" class="checkbox8" name="qualites" value="patient" style="margin: 0px 12px 0 15px;" disabled>Patient</label>
                        
                        <label><input type="checkbox" class="checkbox9" name="qualites" value="réfléchi" style="margin: 0px 12px 0 15px;" disabled>Réfléchi</label>
                        <br>
                        <label><input type="checkbox" class="checkbox10" name="qualites" value="responsable" style="margin: 5px 12px 0 15px;" disabled>Responsable</label>
                        
                        <label><input type="checkbox" class="checkbox11" name="qualites" value="sociable" style="margin: 0px 12px 0 15px;" disabled>Sociable</label>
                        
                        <label><input type="checkbox" class="checkbox12" name="qualites" value="optimiste" style="margin: 0px 12px 0 15px;" disabled>Optimiste</label>
                    </div>
                </form>
                <!-- JavaScript -->
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
