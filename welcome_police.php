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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./welcome_police.css">
    <title>Welcome Police</title>

    <style> <?php include 'welcome_police.css' ?> </style>
</head>

<body onload="table()">


    <section id="wlc_police">
        <div class="nav-wlc-police">
            <h2>Madhya Pradesh <br> Police</h2>
            <nav>
            <ul id="wlc-police-links">
                    <li><a  onclick="complist()">Complaints</a></li>
                    <li><a onclick="HotspotArea()">Hotspot Areas</a></li>
                    <li><a onclick="AttendanceShow()">Attendance</a></li>
                    <li><i class="fa-solid fa-user"  onclick="signout()"></i></li>
                </ul>
            </nav>
            <div class="sign-out-box" id="sign-out-box">
            <button type="button"><a href="./sign_out.php">Sign Out</a></button>
            </div>
        </div>

        <div class="mid-section-police">
            <div class="button-table-complaints">
                <button type="button" id="compBtn" onclick="complist()">Click Here to see the Complaints</button>
                <div id="table"></div>
            </div>

            <div class="button-Hotspot-Areas">
                <button type="button" id="compBtn" onclick="HotspotArea()">Click Here to see the HotspotAreas</button>
                <div id="hotspot-list"></div>
            </div>

            <div class="button-Attendance">
                <button type="button" id="compBtn" onclick="AttendanceShow()">Submit Your Attendance</button>
                <div id="Attandence">
                    <label for="attend">Are You Present Today?</label>
                    <label for="present">YES</label>
                    <input type="radio" name="attend" id="present" value="yes">
                    <label for="notpresent">NO</label>
                    <input type="radio" name="attend" id="notpresent" value="no">
                </div>
            </div>

            <div class="ApproveCaseWidthraw">
                <button type="button" id="compBtn" onclick="approve()">Click Here to See Case Widthraw Requests</button>
                <div id="policeofficers">
                    <div id="casewidthraw"></div>
                </div>
            </div>

        </div>
        <div class="last-section-footer">

        </div>
    </section>

    <script>
        var t = true;
        var ht = true;
        var wr = true;
        var so = true;
        table = () => {
            const res = new XMLHttpRequest();
            const htres = new XMLHttpRequest();
            const wreq = new XMLHttpRequest();
            res.onload = function () {
                document.getElementById("table").innerHTML = this.responseText;
            }
            htres.onload = function () {
                document.getElementById("hotspot-list").innerHTML = this.responseText;
            }
            wreq.onload = function () {
                document.getElementById("casewidthraw").innerHTML = this.responseText;
            }
            res.open("GET", "complaint_list.php");
            htres.open("GET", "hotspotareas.php");
            wreq.open("GET", "casewidthraw.php");
            res.send();
            htres.send();
            wreq.send();
        }

        setInterval(function () {
            table();
        }, 10000);

        complist = () => {
            if (t) {

                document.getElementById('table').style = "display:block";
                t = false;
            } else {
                document.getElementById('table').style = "display:none";
                t = true;
            }
        }

        HotspotArea = () => {
            if (wr) {

                document.getElementById('hotspot-list').style = "display:block";
                wr = false;
            } else {
                document.getElementById('hotspot-list').style = "display:none";
                wr = true;
            }
        }
  

        approve = () => {
            if (ht) {

                document.getElementById('policeofficers').style = "display:block";
                ht = false;
            } else {
                document.getElementById('policeofficers').style = "display:none";
                ht = true;
            }
        }

        signout = () => {
            if (so) {

                document.getElementById('sign-out-box').style = "display:block";
                so = false;
            } else {
                document.getElementById('sign-out-box').style = "display:none";
                so = true;
            }
        }

    </script>

</body>

</html>