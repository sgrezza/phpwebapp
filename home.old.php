<!DOCTYPE html>
<?php
    // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    //     header("Location: index.php");

    // }

?>


<html>
    <head>
        <link rel="stylesheet" href="css/bulma.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="jquery-3.2.0.min.js"></script>
        <script src="parsley.js"></script>
        <script src="scripts.js"></script>
    </head>
<body>
    <nav class="nav grey has-shadow">
        <div class="nav-left">
         <div class="nav-item is-hidden-touch">
                <img src="hammerpen.png" alt="logo"/>
         </div>
              <div class="nav-item">   
                  <p class="white-font title">WorkLogs</p>
              </div>
                
        </div>
    <div class="nav-right">
        <div class="nav-item">
            <p class="title white-font"></p>
        </div>
    </div>
    <buton class="nav-toggle" onclick="navtoggle()">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<div id="whole-thing">
    <div class="level nav-menu" id="navbar">
   <div class="level-left">
        <button class="level-item button light-blue" onclick="showlog()" id="add-log-button">+ Add Log</button>
        <button class="level-item button light-blue">* Edit Log</button>
        <button class="level-item button light-blue" href="index.html">Log out</button>
   </div>
</div>
<div id="log-form" class="day">
 <form name="newlog" action="makelog.php" method="POST" class="log">
        <div class="field">
        <label class="label" for="clientname">Client's Name</label>
        <input type="text" class="input" name="clientname" placeholder="Client name" required/>
 <div class="field">
            <legend class="field-label">Date Occured</legend>
            <p class="control has-addons">
                <input type="radio" name="date-today" class="checkbox"/> 
                  <label for="date-today" class="black-font">Today</label>
            </p>
            <p class="control">
                <input type="date" name="date-specific" disabled><label for="date-specific" class="black-font">On This Day</label>

            </p>
        </div>
        <label class="label" for="workdescription">Work Description</label>
        <input type="text" class="input" name="description" placeholder="Description" required/><br><br>
        </div>
       
        
   
       <br> 
 </form>
 <input class="button light-blue"  type="submit" name='Submit' for="newlog" value="Submit">
           <button class="button red" onclick="showlog()">Cancel</button>

</div>
    <div id="saved-logs">
       <article class="media day">
         <p class="subtitle day-date-title" id="wed-mar-22">Wednesday, March 22</p>
        
         <div class="media log">
            <div class="media-content">
                <h3 class="title customer-name">Adam's Apple Farm</h3>
                <p class="subtitle work-description">Ran cleaning tools</p>
                 <div class="work-duration">
                 <p class="work-start-time">9:25 A.M.</p> <p>&nbsp-&nbsp</p>
                 <p class="work-end-time">10:00 A.M.</p>
               </div>
            </div>
         </div>
         <div class="media log">
            <div class="media-content">
                <h3 class="title customer-name">Doug's Dog Pound</h3>
                <p class="subtitle work-description">Reinstalled Doggy software</p>
               <div class="work-duration">
                 <p class="work-start-time">9:25 A.M.</p> <p>&nbsp-&nbsp</p>
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
       </article>

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