<?php 

require_once ('connection.php');


if(isset($_POST['sign_up']))
{
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
    $user_name=$_POST['user_name'];
    $email=$_POST['email'];
    $policeid=$_POST['policeid'];
    $pass=$_POST['pass'];
	$office=$_POST['office'];
	$police_city=filter_input(INPUT_POST, 'police_city', FILTER_SANITIZE_STRING);
    $c_pass=$_POST['c_pass'];
	$mobile_no=$_POST['mobile_no'];
	$joiningdate=date('Y-m-d',strtotime($_POST['joiningdate']));
	$check_email = mysqli_query($con, "SELECT email FROM police where email = '$email' ");
	$sql = "SELECT policeid FROM police WHERE policeid='{$policeid}'";
	$check_user= mysqli_query($con, "SELECT user_name FROM police where user_name= '$user_name' ");
	$result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
	if(mysqli_num_rows($check_email) > 0){
		echo('Email Already exists');
	}
	elseif(mysqli_num_rows($check_user) > 0){
		echo('Username Already exists');
	}

	elseif (mysqli_num_rows($result) > 0) {
	 echo " Police ID is already exist";}
	
		    elseif(strlen($user_name)<2 && strlen($user_name)>15)
			{
				echo "Enter Character between 3 To 15 .";
			}
			elseif (strlen($pass)<=6 && strlen($pass)>=20)
			{
				
			}
			elseif (strlen($pass)<=6 && strlen($pass)>=20)
			{
			
			}
			elseif ($pass != $c_pass)
			{
				echo "<script>alert('Password Does Not Same')</script>";
			}
            else{
				$path = "idpolice/";
				$temp = explode(".", $_FILES["file"]["name"]);
                $filename = $policeid. '.' . end($temp);
				$path= $path .$filename;
				if(move_uploaded_file($_FILES['file']['tmp_name'], $path) ){
					$pResult = mysqli_query($con, "INSERT INTO police (`first_name`,`last_name`,`user_name`,`email`,`policeid`,`pass`,`mobile_no`,`joiningdate`,`office`,`police_city`,`document`,`adminc`) values ('$first_name','$last_name','$user_name','$email','$policeid','$pass','$mobile_no','$joiningdate','$office','$police_city','$path','no')");
					$aquery=mysqli_query($con, "INSERT INTO policeverify (`policeid`,`checkpolice`) values('$policeid','notconfirmed')");
					echo "<script>alert('successfully Register Please Wait for Comfirmation From Head of Police Department');</script>";
				    header("location:PoliceLogin.php");
            
        }
		
        }
	}
?>

<html>

<head>
	<style> <?php echo include 'PoliceRegistration.css' ?> </style>
	<title>Police Registration Page</title>
	<link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">
</head>

<body>

	<section id="hero">
		<form action="" method="post" name="user" enctype="multipart/form-data">
			<h1 class="heading">SIGN UP FOR POLICE OFFICER'S</h1>
			<div class="container">

				<div class="box-div">
					<input id="first_name" type="text" name="first_name" placeholder="First Name" value="" required>
					<input id="last_name" type="text" name="last_name" placeholder="Last Name" value="" required>
				</div>

				<div class="box-div">
					<input id="email" type="text" name="email" placeholder="Email ID" value="" required>
					<input id="User_Name" type="text" name="user_name" placeholder="Enter Your User Name" required>
				</div>

				<div class="box-div">
					<input id="pass" type="password" name="pass" placeholder="Enter Password" maxlength="16" required>
					<input id="c_pass" type="password" name="c_pass" placeholder="Enter Confirm Password" maxlength="16"
						required>
				</div>
				
				<div class="box-div">
					<input id="PoliceId" type="number" name="policeid" placeholder="Enter Police ID Number"
						maxlength="12" size="12" value="" required>
					<input id="mobile" type="number" name="mobile_no" placeholder="Mobile No." value="" required>
				</div>
				<div class="box-div">
				<label for="Police Office" class="photoID">Your Police Office Name</label>
					<input id="office" type="text" name="office" value=""
						required>
				</div>
				<div class="box-div">
                        <label for="policestationcity">Select the police Station District</label>
                        <select name="police_city" id="police_city"></select>
                    </div>
				<div class="box-div">
				<label for="joingingdate" class="photoID">Your Joining Date</label>
					<input id="joiningdate" type="date" name="joiningdate" value=""
						required>
				</div>

				<div class="box-div">
					<label for="PoliceIdPhoto" class="photoID">Submit an Pdf of your Police ID card</label>
					<input id="Profilephoto" type="file" name="file" accept=".pdf" required>

				</div>

				<div class="box-div">
					<input id="submit" type="submit" name="sign_up" value="SIGN UP">
				</div>
				<p class="RegiUser">Already have an Account <a href='./PoliceLogin.php' target="_blank">LOGIN</a></p>

			</div>
		</form>
	</section>
	<script>
		var mp = ["Agar Malwa", "Alirajpur", "Anuppur", "Ashoknagar", "Balaghat", "Barwani", "Betul", "Bhind", "Bhopal", "Burhanpur", "Chhatarpur", "Chhindwara", "Damoh", "Datia", "Dewas", "Dhar", "Dindori", "Guna", "Gwalior", "Harda", "Hoshangabad", "Indore", "Jabalpur", "Jhabua", "Katni", "Khandwa", "Khargone", "Mandla", "Mandsaur", "Morena", "Narsinghpur", "Neemuch", "Panna", "Raisen", "Rajgarh", "Ratlam", "Rewa", "Sagar", "Satna",
            "Sehore", "Seoni", "Shahdol", "Shajapur", "Sheopur", "Shivpuri", "Sidhi", "Singrauli", "Tikamgarh", "Ujjain", "Umaria", "Vidisha"];

        var select = document.getElementById("police_city");
        for (var i = 0; i < mp.length; i++) {
            var optn = mp[i];
            var el = document.createElement("option");
            el.textContent = optn;
            el.value = optn;
            select.appendChild(el);}
		</script>
</body>

</html>