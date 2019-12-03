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
<title>>User - Report Lost\Stolen Card</title>
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
  }</style>
</head>
<body>
<header>
<h2>STM(Societe de transport de Montreal )</h2>
</header>

<nav style="height: 10px;">
<ul>
       <li><a href="userUI.php">Home&nbsp; </a></li>
     <li><a href="ViewUser.php">View/Update Account</a></li>
    <li><a href="reportCardUI.php">Report Lost/Stollen Card</a></li>
    <li><a href="reloadCardUI.php">Reload Card</a></li>

    
    <li><form action="#" method="post"><button id="button" style="margin-left:550px;"type="submit" name="logout">Logout</button></form><!--<a href="../index.php">Logout</a>--></li>
    </ul>
</nav>

<nav>

</nav>


<div class="div2_left"  style = "height:430px;">

    <h1>Block Card</h1>
    <form action="#" method="post">
        Remarks: <input style="width:400px; height:40px" type="text" name="remarks" id="" Placeholder="Enter the reason (not more than 50 characters)">
        <br><br><button type="submit" name="report">Submit</button>
        <button type="submit" name="logout">Logout</button>
    </form>
    
</div>
<div class="div2_right" style = "height:430px;">

</div>




<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>

