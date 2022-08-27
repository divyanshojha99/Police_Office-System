<?php
session_start();
if(!isset($_SESSION["user_name"])){
header("Location: UserLogin.php");
exit(); }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="./welcome_user.css">
        <title>Welcome User</title>
        <link rel="icon" type="image/x-icon" href="./images/mis-logo-png-transparent.png">


    </head>

    <body>
        <?php 

require_once ('connection.php');

if(isset($_POST['submit']))
{
	
    

	$victimname=$_POST['victimname'];
    $user_name=$_POST['user_name'];
	$vfathername=$_POST['vfathername'];
	$victim=$_POST['victim'];
	$witness=$_POST['witness'];
	$crimeinfo=$_POST['crimeinfo'];
    $criminalinfo=$_POST['criminalinfo'];
    $crimelocation=$_POST['crimelocation'];
	$incidentdate=date('Y-m-d',strtotime($_POST['incidentdate']));
	$incidentstart=$_POST['incidentstart'];
	$incidentend=$_POST['incidentend'];
	$suspectinfo=$_POST['suspectinfo'];
	$typeofcrime=filter_input(INPUT_POST, 'typeofcrime', FILTER_SANITIZE_STRING);
	

			if (strlen($crimeinfo)<=50)
			{
                echo "<script>alert('Details Should More than 50 words')</script>";
				
			}
			

			else 
			{

				 $path1 = "crimeproof/";
                 $path2 = "usersignature/";
                 $filename1=basename( $_FILES['file1']['name']);
                 $filename2=basename( $_FILES['file2']['name']);
     
                 $path1 = $path1 . basename( $_FILES['file1']['name']);
                 $path2 = $path1 . basename( $_FILES['file1']['name']);
                
                 if(move_uploaded_file($_FILES['file1']['tmp_name'], $path1) )
				 {
                    if(move_uploaded_file($_FILES['file2']['tmp_name'], $path2) ){
                        $checkuser = mysqli_query($con, "SELECT email FROM regist where `user_name`= `user_name` ");
                        if(mysqli_num_rows($checkuser) > 0){
                            $user_name=$_POST['user_name'];
                        }
                        
                      $aResult = mysqli_query($con, "INSERT INTO userfir (`user_name`,`victimname`,`vfathername`,`victim`,`witness`,`crimeinfo`,`criminalinfo`,`crimelocation`,`incidentdate`,`incidentstart`,`incidentend`,`suspectinfo`,`typeofcrime`) values ('$user_name','$victimname','$vfathername','$victim','$witness','$crimeinfo','$criminalinfo','$crimelocation','$incidentdate','$incidentstart','$incidentend','$suspectinfo','$typeofcrime')");
                      echo "<script>alert('Fir Register Sucessfully,Now Start Checking the status');</script>";
                    }

     }
     else
     {
        echo "<script>alert('Error while uploading files');</script>";
     }
    }
				


			}
		
?>



                <section id="complaint-section">

                    <nav class="wlc-nav">
                        <img src="./images/police-badge.png" alt="wlc-navbar-logo" class="logo-welcom">
                        <div class="icon-buttons">
                            <button type="button" id="navsignoutbtn" name="sign_out"><a href="./sign_out.php">Sign Out</a></button>
                            <a href="#footer">Helpline Numbers</a>
                            <img src="./images/user.png" alt="user-icon" class="logo-welcom">
                        </div>

                    </nav>


                    <div class="midtext2">



                        <button id="Complaint_form" onclick="display()"> Click here to fill the complaint </button>


                        <form action="" method="post" name="user" enctype="multipart/form-data" id="cform">

                            <div class="container-form-complaint">

                                <div class="box-div cformint">
                                    <input id="victimname" type="text" name="victimname" placeholder="Your Full Name" value="" required>
                                    <input id="v_fathername" type="text" name="vfathername" placeholder="Your Father Name" value="" required>
                                </div>

                                <div class="box-div">

                                    <label for="victim-not">Are you a Victim?</label>
                                    <div class="lable-box">
                                        <label for="victim">Yes</label>
                                        <input type="radio" name="victim" value="Yes">
                                        <label for="victim">No</label>
                                        <input type="radio" name="victim" value="No">
                                    </div>
                                </div>

                                <div class="box-div">

                                    <label for="victim-not">Are you a Witness?</label>
                                    <div class="lable-box">
                                        <label for="Witness-yes">Yes</label>
                                        <input type="radio" name="witness" value="Yes">
                                        <label for="Witness-no">No</label>
                                        <input type="radio" name="witness" value="No">
                                    </div>
                                </div>



                                <div class="box-div">

                                    <label for="victim-not">In case if you have Criminals Information fill this field here</label>
                                    <textarea name="criminalinfo" class="txtara" rows="3" cols="30" placeholder="Write here any Information Related to Criminal"></textarea>

                                </div>



                                <div class="box-div">
                                    <label for="Type-selection"> Select the Crime Category </label>
                                    <select name="typeofcrime" id="Crime-Cat">
                            <option>Crime Category Not Available Here</option>
                            <optgroup label="Drug Crimes">
                                <option>Drug Manufacture</option>
                                <option>Drug Transportation</option>
                                <option>A Drug Scam</option>
                                <option>Bad Drug Deal</option>
                                <option>Illegal use of Drugs</option>
                                <option>Any Other</option>
                            </optgroup>
                            <optgroup label="Street Crimes">
                                <option>Rape</option>
                                <option>Robbery</option>
                                <option>Assault</option>
                                <option>Burglary</option>
                                <option>Larceny</option>
                                <option>Accident</option>
                                <option>Any Other</option>
                            </optgroup>
                            <optgroup label="Organized Crimes">

                                <option>Organized gang criminality</option>
                                <option>Racketeering</option>
                                <option>Syndicate Crime</option>
                                <option>Smuggling</option>
                                <option>Any Other</option>
                            </optgroup>

                            <optgroup label="Online Crimes">
                                <option>Cyber Attack</option>
                                <option>Online Fraud</option>
                                <option>Stealing Data</option>
                                <option>Illegal Gambling</option>
                                <option>Sell Of Illegal Items Online</option>
                                <option>Copyright Infringement</option>
                                <option>Any Other</option>
                            </optgroup>
                        </select>

                                </div>

                                <div class="box-div">
                                <label for="crimelocation" class="photoID"> Crime Location</label>
                                <input id="Crime-Cat" type="text" name="crimelocation" value="" required>
                            </div>    

                            </div>
                            <div class="box-div">
                                <textarea class="txtara" name="suspectinfo" rows="3" cols="38" placeholder="Write Details About the suspect"></textarea>
                                <textarea class="txtara" name="crimeinfo" rows="3" cols="38" placeholder="Write about the incident in brief"></textarea>
                            </div>

                            <div class="box-div">
                                <label for="incidentdate" class="photoID"> Incident/Crime Date </label>
                                <input id="incidentdate" type="date" name="incidentdate" value="" required>
                            </div>

                            <div class="box-div">
                                <label for="incidenttime" class="photoID">Incident/Crime Start and End Time </label><br>
                                <input id="incidentstart" type="time" name="incidentstart" placeholder="Enter Incident Start Time" value="" required>
                                <input id="incidentend" type="time" name="incidentend" placeholder="Enter Incident End Time" value="" required>
                            </div>

                            <div class="box-div filediv">
                                <label for="incidentproof" class="photoID">Incident/Crime Proof</label>
                                <input id="proof" type="file" name="file1" accept=".pdf">
                            </div>
                            <div class="box-div filediv">
                                <label for="authenticate" class="photoID"> Share Your Orignal Signature </label>
                                <input id="signature" type="file" name="file2" accept=".pdf">
                            </div>

                            <div class="box-div btn-div">
                                <button type="submit" name="submit" id="CaseSub">Submit Your Complaint</button>
                            </div>
                    </div>

                    </form>


                    <footer id="footer">
                        <div class="cformfoot">
                            <p>HelpLine Numbers</p>
                            <ul class="list-number">
                                <li>1234567892</li>
                                <li>1234567892</li>
                                <li>1234567892</li>
                                <li>1234567892</li>
                                <li>1234567892</li>
                            </ul>
                        </div>
                    </footer>

                </section>



              


                <script>
                    var val = true;
                    display = () => {



                        if (val) {
                            document.getElementById('cform').style = "display:block";
                            document.getElementById('Complaint_form').style = "background-color: var(--crimsom)";
                            val = false;
                        } else {
                            document.getElementById('cform').style = "display:none";
                            document.getElementById('Complaint_form').style = "background-color: var(--darkblue)";
                            val = true;
                        }
                    }
                </script>

    </body>

    </html>