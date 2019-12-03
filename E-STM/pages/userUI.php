<?php 
include_once "../php/main.php";  
 $user = $_SESSION['user'];
 
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>User</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<style> 
#button
{
 background-color: #5ca0d1; 
  border: none;
  color: white;
  padding: 5px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  }
</style>
</head>
<body>
<header>
<h2>STM(Societe de transport de Montreal )</h2>
</header>
<nav>
   
    
       <ul>
       <li><a href="userUI.php">Home&nbsp; </a></li>
     <li><a href="viewUpdateUserUI.php">View/Update Account</a></li>
    <li><a href="reportCardUI.php">Report Lost/Stollen Card</a></li>
    <li><a href="reloadCardUI.php">Reload Card</a></li>

    
    <li><form action="#" method="post"><button id="button" style="margin-left:550px;"type="submit" name="logout">Logout</button></form><!--<a href="../index.php">Logout</a>--></li>
    </ul>
</nav>

<div class="div1">


</div>
<nav>

</nav>
<div class="div2_left" style="height:400px;">
<h3>Additional Services</h3>
<p>The STM offers tourists passes valid for a one- or three-day period, allowing travellers unlimited access to its bus and metro network. 
The Family Outings program allows up to five children aged 6 to 11 to ride public transit for free during certain periods when accompanied by an adult with a valid fare. 
This offer applies on weekends, all legal holidays, and during some school breaks. Fares are free at all times for children aged 5 or younger.

Featuring 24-hour service, 7 days a week, 365-days a year, the 747 Aeroport P.-E.-Trudeau/Centre-ville service includes 11 stops in each direction, 
taking approximately 45-70 minutes each way depending on traffic conditions. Buses run frequently, are custom-designed to serve travellers with baggage, 
and are handicap-accessible. Furthermore, for the $10 fare, travellers can enjoy unlimited bus and metro access in Montreal for a 24-hour period. 
Other transit fares are also accepted. </p>
</div>
<div class="div2_right" style="height:400px;">

</div>


<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>
