<?php
require('connection.php');
session_start();
$user=$_SESSION['user_name'];
if(!isset($_SESSION["user_name"])){
header("Location: UserLogin.php");
exit(); }
?>
<html>
  <head>
    <link rel="stylesheet" href="./welcome_police.css">
  
  </head>
<body>


<?php
require('connection.php');
$rows = mysqli_query($con, "SELECT * FROM `userfir` where username='$user'");
?>
<table class="clist" align="center" border="1">
  <tr>
    <td>Serial No.</td>
    <td>Case ID</td>
    <td>User Name</td>
    <td>Name</td>
    <td>Father Name</td>
    <td>Victim</td>
    <td>Suspect</td>
    <td>Crime Incident Information</td>
    <td>Criminal Information</td>
    <td>Suspect Information</td>
    <td>Crime Category</td>
    <td>Incident Date</td>
    <td>Incident Start Time</td>  
    <td>Incident End Time</td>  
    <td>Incident Proof</td>  
    <td>Signature</td>
    <td>Crime District</td>
    <td>Location</td>
    <td>Withdraw</td>

  </tr>

  <?php $i = 1; ?>
  <?php foreach($rows as $row) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $row["caseid"]; ?></td>
      <td><?php echo $row["username"]; ?></td>
      <td><?php echo $row["victimname"]; ?></td>
      <td><?php echo $row["vfathername"]; ?></td>
      <td><?php echo $row["victim"]; ?></td>
      <td><?php echo $row["witness"]; ?></td>
      <td><?php echo $row["crimeinfo"]; ?></td>
      <td><?php echo $row["criminalinfo"]; ?></td>
      <td><?php echo $row["suspectinfo"]; ?></td>
      <td><?php echo $row["typeofcrime"]; ?></td>
      <td><?php echo $row["incidentdate"]; ?></td>
      <td><?php echo $row["incidentstart"]; ?></td>
      <td><?php echo $row["incidentend"]; ?></td>
      <td><a target="_blank" class="appbtn2" href="fileview.php?pdf=<?=$row['incidentproof']?>">VIEW</a></td>
      <td><a target="_blank" class="appbtn2" href="fileview.php?pdf=<?=$row['signature']?>">VIEW</a></td>
      <td><?php echo $row["crimecity"]; ?></td>
      <td><?php echo $row["crimelocation"]; ?></td>
      <td><?php echo $row["confirmwithd"]; ?></td>
      <td><button><a href="updates.php?caseid=<?=$row['caseidd']?>">Request</a></button></td>
      

    </tr>
  <?php endforeach; ?>
</table>


</body>
</html>
