<?php 
    include_once "../php/main.php";  
    $user = $_SESSION['user'];
    
    $name = $user->getName();
    $id = $user->getUserID();
    $phone = $user->getPhone();

    $street = $user->getStreetAddress();
    $city = $user->getCity();
    $zipCode= $user->getZipCode();

    $type = $user->getUserType();

    if ($type == 1) {
        $type = "Admin";
    }else{
        $type = "Default";
    }
    

?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Account Details</title>
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
	<li><a href="adminUI.php">Home&nbsp; </a></li>
    <li><a href="viewUpdateAdminUI.php">View/Update Account</a></li>
    <li><a href="createUserUI.php">Create Account</a></li>
    <li><a href="generateCardUI.php">Generate Card</a></li>
    <li><a href="updateFareUI.php">Update Trip Fare</a></li>
    <li><a href="deactivateCardUI.php">Deactivate Card</a></li>
    <li><form action="#" method="post"><button id="button" style="margin-left:550px;"type="submit" name="logout">Logout</button></form><!--<a href="../index.php">Logout</a>--></li>
    </ul>
</nav>

<nav>

</nav>


<div class="div2_left"  style = "height:430px;">
<table style="padding-left: 200px;">
        <h1 style="padding-left: 200px;">Account Details</h1>
        <?php echo"
                <tr><th>User ID: </th><td>$id</td></tr>
                <tr><th>User Type: </th><td>$type</td></tr>
                <tr><th>Name: </th><td>$name</td></tr>
                <tr><th>Phone Number: </th><td>$phone</td></tr>
                <tr><th>Street Number: </th><td>$street</td></tr>
                <tr><th>City: </th><td>$city</td></tr>
                <tr><th>Zip Code: </th><td>$zipCode</td></tr>"; ?>
    </table>
    <br/>
    <a href="updateAdminDetailsUI.php"><button onclick="'updateAdminDetailsUI.php'" id = "button" style="margin-left: 260px;"> Update Details</button></a>
    
        

</div>
<div class="div2_right" style = "height:430px;">

</div>




<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>
