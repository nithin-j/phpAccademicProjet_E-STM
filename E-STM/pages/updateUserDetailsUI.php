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
<title>Update User Details</title>
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
    <li><a href="viewUpdateUserUI.php">View/Update Account</a></li>
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
    <button onclick="window.location.href = 'updateUserDetailsUI.php';" id = "button" style="margin-left: 260px;"> Update Details</button>
        

</div>
<div class="div2_right" style = "height:430px;">

	<form action="#" id="main" method="post">
      <h6>Update Password</h6>
	<label>Name:</label>	 <input type="text" name="name" value ="<?php echo"$name"?>"><br><br>
		<label>Phone Number: </label><input type="tel" name="phno" value ="<?php echo"$phone"?>"><br><br>
		<label>Address: </label><input type="text" name="street" value ="<?php echo"$street"?>"><br><br>
       <label>City: </label> <input type="text" name="city" value ="<?php echo"$city"?>"><br><br>
        <label>Zip Code: </label><input type="text" name="zipcode" value ="<?php echo"$zipCode"?>"><br><br>
		<button type="submit" name="updateUser">Update Details</button>
		   
	</form>
    <br>
 
    <br><br>
    <div id="myDIV" >
        <form action="#" method="post">
       
	    	<label>Previous Password: </label><input type="password" name="oldpwd" value =""><br><br>
	    	<label>New Password: </label><input type="password" name="newpwd" value =""><br><br>
	    	<label>Confirm Password: </label><input type="password" name="confmpwd" value =""><br><br>
	    	<button type="submit" name="updateUserPassword">Update Password</button>
	    </form>
</div>


</div>

<footer>
<p>Copyright&copy;2019</p>
</footer>
    <script>
        function Toggle() {
        	document.getElementById("myDIV").style.display="block";
			document.getElementById("main").style.display="none";
    }
</script>
</body>
</html>

</html>