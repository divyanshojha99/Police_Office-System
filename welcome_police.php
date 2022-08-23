<?php
session_start();
if(!isset($_SESSION["policeid"])){
header("Location: PoliceLogin.php");
exit(); }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">

        <!-- font awsome cdn link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"
        />

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="./PoliceRegistration.css">
        <link rel="stylesheet" href="./style.css">
        <title>Welcome Police</title>
        <link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">
    </head>

    <body>
        <div class="midtext2">

            <button id="getStarted" onclick="login()"> FIR COMPLAINT'S</button>


        </div>
        <button class="button-86" name="sign_out" role="button">SIGN OUT</button>




        <?php
        if(isset($_GET['sign_out'])) 
        {
            session_destroy();
            unset($_SESSION['policeid']);
            header('location:login.php');
            exit();}
            ?>
    </body>

    </html>