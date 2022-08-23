<!-- <?php
session_start();
if(!isset($_SESSION["user_name"])){
header("Location: UserLogin.php");
exit(); }
?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./welcome_user.css">
    <title>Welcome User</title>
    <link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">
</head>

<body>


    <nav class="wlc-nav">
        <img src="/images/police-badge.png" alt="wlc-navbar-logo" class="logo-welcom">
        <img src="/images/user.png" alt="user-icon" class="logo-welcom">
    </nav>



    <div class="midtext2">

        <button id="Complaint_form"> FILL YOUR FIR COMPLAINT</button>


        <form action="" method="post" name="user" enctype="multipart/form-data" id="cform">

            <div class="container">

                <div class="box-div cformint">
                    <input id="victimname" type="text" name="victiname" placeholder="Victim Full Name" value="" required>

                </div>
                <div class="box-div cformint">
                    <input id="v_fathername" type="text" name="vfathername" placeholder="Victim Father Name" value="" required>
                </div>
                <div class="box-div">
                    <textarea rows="5" cols="42" placeholder="Write Details About the suspect"></textarea>
                </div>
                <div class="container">
                    <textarea rows="10" cols="42" placeholder="Write about the incident in brief"></textarea>
                </div>

                <div class="box-div">
                    <label for="incidentdate" class="photoID">INCIDENT DATE</label>
                    <input id="incidentdate" type="date" name="incidentdate" value="" required>
                </div>

                <div class="box-div">
                    <label for="incidenttime" class="photoID">INCIDENT START &END TIME</label><br>
                    <input id="incidentstart" type="time" name="incidentstart" placeholder="Enter Incident Start Time" value="" required>
                    <input id="incidentend" type="time" name="incidentend" placeholder="Enter Incident End Time" value="" required>
                </div>

                <div class="box-div">
                    <label for="incidentproof" class="photoID">Incident Proof</label>
                    <input id="proof" type="file" name="file" accept=".pdf">
                </div>
                <div class="box-div">
                    <label for="authenticate" class="photoID">SIGNATURE</label>
                    <input id="signature" type="file" name="file" accept=".pdf">
                </div>

            </div>

        </form>



        <!--<button class="button-86" name="sign_out" role="button">SIGN OUT</button>
        <?php
        if(isset($_GET['sign_out'])) 
        {
            session_destroy();
            unset($_SESSION['user_name']);
            header('location:login.php');
            exit();}
            > -->

</body>

</html>