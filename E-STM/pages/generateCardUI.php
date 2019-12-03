
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
<title>Admin - Generate Card</title>
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
<nav  style="height: 10px;">
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

<table>
        
        <?php
		echo"<tr><th>User ID</th><th>Name</th><th>User Type</th><th>Phone Number</th><th>Street</th><th>City</th><th>Zip Code</th></tr>";
            foreach($usersWithoutCard as $key=>$value){
				$name =  $value->getName(); $userid = $value->getUserID(); $userType = $value->getUserType(); $phone = $value->getPhone();
				$street = $value->getStreetAddress(); $city = $value->getCity(); $zip = $value->getZipCode();
				echo"<tr><td>$userid</td><td>$name</td><td>$userType</td><td>$phone</td><td>$street</td><td>$city</td><td>$zip</td></tr>";
				
				
				
			}
        ?>        
    </table>
    <br><br>
	<h1>Generate Card</h1>
	<form action="#" method="post">
		Enter User ID: <input type="text" name="userid" value="">
		Trip Type: <select name="tripType">
		<?php 
			$id = 0;
			foreach($tripTypes as $type){
				$id++; 
				echo("<option value ='$id'> $id: $type</option>");
			}
		?>
		</select>
		<button type="submit" name="generate">Generate</button>
	
	</form>
</div>
<div class="div2_right" style = "height:430px;">

</div>




<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>


