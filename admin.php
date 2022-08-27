<?php
session_start();
if(!isset($_SESSION["adminid"])){
header("Location: adminlogin.php");
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
        <title>Welcome Admin</title>
        <link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">
    </head>

    <body>
        
    <button type="button" class="button-86" name="sign_out"><a href="./sign_out.php">Sign Out</a></button>




    </body>

    </html>