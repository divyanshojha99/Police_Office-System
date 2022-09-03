<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">

    <link rel="stylesheet" href="./UserPoliceLogin.css">

    <title>UPDATE DATA PAGE</title>
    
</head>
 
<body>
<?php
require('connection.php');

if (isset($_GET['id'])){
    $pid=mysqli_real_escape_string($con,$_GET['id']);
    $result = mysqli_query($con,"SELECT `policeid` FROM policeverify WHERE `policeid`='{$pid}'") or die("Query unsuccessful") ;
	if(mysqli_num_rows($result)> 1){
        echo "<div class='heading'>
        <h3 style=color:white; >ALREADY VERIFIED,<a style=color:orange; href='admin.php'>Click For Another Verification</a></h3>
        <br> </div>";
       }
else{
    $query2 = mysqli_query($con,"UPDATE policeverify SET `checkpolice`='yes' where policeid='$pid'");
    $query3 = mysqli_query($con,"UPDATE police SET `adminc`='yes' where policeid='$pid'");
    echo "<div class='heading'>
<h3 style=color:white; >THANKS VERIFIED,<a style=color:orange; href='admin.php'>Click For Another Verification</a></h3>
<br> </div>";

   }
}
if (isset($_GET['rid'])){
    $rid=mysqli_real_escape_string($con,$_GET['rid']);
    $rresult = mysqli_query($con,"SELECT `policeid` FROM policeverify WHERE `policeid`='{$rid}'") or die("Query unsuccessful") ;
	if(mysqli_num_rows($rresult)> 1){
        echo "<div class='heading'>S
        <h3 style=color:white; >ALREADY REJECTED,<a style=color:orange; href='admin.php'>Click For Another Verification</a></h3>
        <br> </div>";
       }
else{
    $rquery2 = mysqli_query($con,"UPDATE policeverify SET `checkpolice`='no' where policeid='$rid'");
    $rquery3 = mysqli_query($con,"UPDATE police SET `adminc`='rejected' where policeid='$rid'");
    echo "<div class='heading'>
<h3 style=color:white; >THANKS IT'S REJECTED,<a style=color:orange; href='admin.php'>Click For Another Verification</a></h3>
<br> </div>";

   }
}
if (isset($_GET['caseid'])){
    $caseid=mysqli_real_escape_string($con,$_GET['caseid']);
    $uresult = mysqli_query($con,"SELECT `username` FROM userfir WHERE `caseid`='{$caseid}'") or die("Query unsuccessful") ;
	if(mysqli_num_rows($uresult)> 1){
        echo "<div class='heading'>
        <h3 style=color:white; >ALREADY REJECTED,<a style=color:orange; href='admin.php'>Click For Another Verification</a></h3>
        <br> </div>";
       }
else{
    $uquery = mysqli_query($con,"UPDATE userfir SET `confirmwithdraw`='yes' where caseid='$caseid'");
    echo "<div class='heading'>
<h3 style=color:white; >THANKS IT'S DONE,<a style=color:orange; href='welcome_police.php'>Click For Another Complaint Withdraw</a></h3>
<br> </div>";

   }
}
if (isset($_GET['caseidd'])){
    $caseidd=mysqli_real_escape_string($con,$_GET['caseidd']);
    $vresult = mysqli_query($con,"SELECT `username` FROM userfir WHERE `caseid`='{$caseidd}'") or die("Query unsuccessful") ;
	if(mysqli_num_rows($vresult)> 1){
        echo "<div class='heading'>
        <h3 style=color:white; >ALREADY REJECTED,<a style=color:orange; href='admin.php'>Click For Another Verification</a></h3>
        <br> </div>";
       }
else{
    $vquery = mysqli_query($con,"UPDATE userfir SET `requestw`='yes' where caseid='$caseidd'");
    echo "<div class='heading'>
<h3 style=color:white; >THANKS IT'S DONE,<a style=color:orange; href='welcome_user.php'>Click For Another Complaint Withdraw</a></h3>
<br> </div>";

   }
}


?>

</body>

</html>