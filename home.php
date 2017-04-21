<!DOCTYPE html>
<?php
session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
        header("Location: index.php");
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bulma.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/jquery-3.2.0.min.js"></script>
        <script src="js/parsley.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/SmoothScroll.js"></script>
        <script src="js/easing.js"></script>
        <script src="https://use.fontawesome.com/a9de8a2dbb.js"></script>
        <script>
            var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
            var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
            $(document).ready(function () {
                $('#client-details').hide();
                jQuery.easing.def = 'easeOutQuad';
                 var todaysdate = new Date();
                document.getElementById("today").innerHTML = days[todaysdate.getDay()] + ", " + months[todaysdate.getMonth()] + " " + todaysdate.getDate();
            });
           
        </script>
    </head>
    <body>
        <nav class="nav grey has-shadow">
            <div class="nav-left">
                <div class="nav-item is-hidden-touch">
                    <img src="hammerpen.png" alt="logo" />
                </div>
                <div class="nav-item">
                    <p class="white-font title">WorkLogs</p>
                </div>

            </div>
            <div class="nav-right">
                <div class="nav-item">
                    <p class="title white-font">
                        <?php
                        if(!isset($_COOKIE[$userFirstName])) {
                            echo($userFirstName);
                        }else{
                            echo("fuck");
                        }
                        ?>
                    </p>
                </div>
            </div>
            
        </nav>

        <div class="container" id="whole-thing">
            <!--<div class="level nav-menu" id="navbar">
                <div class="level-right">
                    <button class="level-item button light-blue" onclick="showlog()" id="add-log-button">+ Add Log</button>
                    <button class="level-item button light-blue">* Edit Log</button>
                    <button class="level-item button light-blue" href="index.php">Log out</button>
                </div>
            </div>-->
            
            <div id="saved-logs">
            <article class=" day">
            <div class="">
            <div>
              <p class="title is-3 day-date-title" id="today"></p>
              <h3 class="subtitle black-font">There's no logs for today :(</h3>
            </div>
             <div class="">
                <button class=" button light-blue" onclick="showlog()" id="add-log-button">+ Add Log</button>
                <button class=" button light-blue">* Edit Log</button>
                <button class=" button light-blue" href="index.php">Log out</button>
            </div>

            </div>
            <div id="log-form" class="log-form">
                <form class="notification" name="newlog" action="makelog.php" method="POST" class="log">
                    <div class="tile is-ancestor">
                           <fieldset class="tile is-parent is-2" >
                            <div class="tile is-child">
                                <label class="label" for="clientname">Client Name</label> <br>
                                <input type="text" class="input" name="clientname" placeholder="Client name" /><br>
                                <button class="button is-link is-small light-blue" type="button" onclick="toggleClientDetails()">+ Client Details</button>
                            </div>
                           
                            <div class="tile is-child" id="client-details">
                                 <label class="label" for="clientphone">Phone Number</label><br>
                                <input type="tel" class="input" name="clientphone" placeholder="" /><br>
                                <label class="label" for="clientcontact">Contact Name</label>
                                <br>
                                <input type="text" class="input" name="clientcontact"/>
                                <br>
                                <label class="label" for="clientadress">Address</label><br>
                                <input type="text" class="input" name="clientaddress" /><br>
                                <button type="button" class="button is-small green" onclick="saveClientDetails()">Save Details</button>
                            </div>
                  
                        </fieldset>
                        
                        <fieldset class="tile is-parent is-2">
                            <div class="tile is-child">
                                <label class="label" for="workdescription">Issue</label><br>
                                <input type="text" class="input" name="description" placeholder="What was wrong" />
                            </div>
                            <div class="tile is-child" id="work-description">
                                <label class="label" for="workdescription">Time Taken</label><br>
                                <input type="number" class="" name="timetaken" placeholder="in hours" maxlength="4"  size="4"/><br/>
                                <label class="label" for="longDescription">Work Description</label>
                                <textarea type="textarea" class="textarea" name="longDescription" placeholder="Describe"></textarea>
                            </div>
                        </fieldset>
                     
                    </div>
                    <div class="tile is-ancestor">
                        
                        <fieldset class="tile is-child is-3" style="border: none;">
                            <button class="button green control has-icon" type="submit" name='Submit' for="newlog">
                               <span class="icon"> <i class="fa fa-check" aria-hidden="true"></i></span>Submit
                            </button>
                            <button class="button red control has-icon" type="button" onclick="showlog()">
                                <span class="icon"><i class="fa fa-times" aria-hidden="true"></i></span> Cancel</button>
                        </fieldset>
                    </div>
                </form>
                <br>
            </div>
            </article>
                <!--<article class="media day">
                    <p class="subtitle day-date-title" id="wed-mar-22">Wednesday, March 22</p>

                    <div class="media log">
                        <div class="media-content">
                            <h3 class="title customer-name">Adam's Apple Farm</h3>
                            <p class="subtitle work-description">Ran cleaning tools</p>
                            <div class="work-duration">
                                <p class="work-start-time">9:25 A.M.</p>
                                <p>&nbsp-&nbsp</p>
                                <p class="work-end-time">10:00 A.M.</p>
                            </div>
                        </div>
                    </div>
                    <div class="media log">
                        <div class="media-content">
                            <h3 class="title customer-name">Doug's Dog Pound</h3>
                            <p class="subtitle work-description">Reinstalled Doggy software</p>
                            <div class="work-duration">
                                <p class="work-start-time">9:25 A.M.</p>
                                <p>&nbsp-&nbsp</p>
                                <p class="work-end-time">10:00 A.M.</p>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="media day">
                    <p class="subtitle day-date-title">Tuesday, March 21</p>

                    <div class="media log">
                        <div class="media-content">
                            <h3 class="title customer-name">Sal's Sacks</h3>
                            <p class="subtitle work-description">Fixed checkout computer</p>
                        </div>
                    </div>
                    <div class="media log">
                        <div class="media-content">
                            <h3 class="title customer-name">Doug's Dog Pound</h3>
                            <p class="subtitle work-description">Reinstalled Doggy software</p>
                        </div>
                    </div>
                </article>
                <article class="media log">
                    <figure class="media-left date">
                        <p class="title month">Monday</p>
                        <p class="subtitle day">March 20</p>
                    </figure>
                    <div class="media-content">
                        <h3 class="title customer-name">Doug's Dog Pound</h3>
                        <p class="subtitle work-desctription">Reinstalled Doggy software</p>
                    </div>
                </article>-->

            </div>
        </div>
    </body>
    <script>
        function navtoggle() {
            var d = document.getElementById("navbar");
            if (d.classList.contains("is-active")) {
                d.classList.remove("is-active");
            } else {
                d.classList.add("is-active");
            }
        }
    </script>

    </html>