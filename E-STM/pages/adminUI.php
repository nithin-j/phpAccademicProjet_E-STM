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
<title>Admin</title>
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
    <li><a href="adminUI.php">Home&nbsp; </a></li>
    <li><a href="viewUpdateAdminUI.php">View/Update Account</a></li>
    <li><a href="createUserUI.php">Create Account</a></li>
    <li><a href="generateCardUI.php">Generate Card</a></li>
    <li><a href="updateFareUI.php">Update Trip Fare</a></li>
    <li><a href="deactivateCardUI.php">Deactivate Card</a></li>
    <li><form action="#" method="post"><button id="button" style="margin-left:550px;"type="submit" name="logout">Logout</button></form><!--<a href="../index.php">Logout</a>--></li>
    </ul>
</nav>

<div class="div1">


</div>
<nav>

</nav>
<div class="div2_left">
<h3>Role of Admin</h3>
<p>The STM admin is responsible for providing overall leadership and
strategic direction for the ongoing operation and health of the organization. The admin has a critical stewardship role.
Admins are expected to act collaboratively in the achievement of the organizations
goals, in alignment with the overall strategic agenda. In addition to the shared
responsibility for establishing and maintaining the strategic direction of the organization,
each admin role has specific responsibilities such as approving the user,deacticating user cards if stolen,create user account etc </p>
</div>
<div class="div2_right">

</div>


<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>
 

