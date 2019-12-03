<?php 
    include_once "../php/main.php";  
    $user = $_SESSION['user'];
    
    $name = $user->getName();
    $id = $user->getUserID();
    $phone = $user->getPhone();

    $street = $user->getStreetAddress();
    $city = $user->getCity();
    $zipCode= $user->getZipCode();
    $profile = $user->getProfile();

    $type = $user->getUserType();

	$card = new Card("",$id,"","");
    $card->getCardDetails($conn);
    $cardNumber = $card->getCardNumber();
    $validity = $card->getValidity();
					
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
<title>View Account</title>
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
  
  #image{
      float: left;
      margin-left: 30px;
      max-height: 300px;
  }
  </style>
</head>
<body>
<header>
<h2>STM(Societe de transport de Montreal )</h2>
</header>
<nav  style="height: 10px;">
       <ul>
    <li> <li><a href="userUI.php">Home&nbsp; </a></li>
    
    <li><a href="viewUpdateUserUI.php">View/Update Account</a></li>
    <li><a href="reportCardUI.php">Report Lost/Stollen Card</a></li>
    <li><a href="reloadCardUI.php">Reload Card</a></li>

    
    <li><form action="#" method="post"><button id="button" style="margin-left:550px;"type="submit" name="logout">Logout</button></form><!--<a href="../index.php">Logout</a>--></li>
    </ul>
</nav>


<nav>

</nav>


<div class="div2_left"  style = "height:430px;">
<table style="padding-left: 200px;">
        <h1 style="padding-left: 200px;">Account Details</h1>
        <div id="image"><?php 
        
        echo"<img id='image' src='../images/profilepicture/$profile' alt=''>"
        ?></div>
        <div>
        <?php echo"
                <tr><th>User ID: </th><td>$id</td></tr>
                <tr><th>User Type: </th><td>$type</td></tr>
                <tr><th>Name: </th><td>$name</td></tr>
				<tr><th>Card Number: </th><td>$cardNumber</td></tr>
                <tr><th>Validity: </th><td>$validity</td></tr>
                <tr><th>Phone Number: </th><td>$phone</td></tr>
                <tr><th>Street Number: </th><td>$street</td></tr>
                <tr><th>City: </th><td>$city</td></tr>
                <tr><th>Zip Code: </th><td>$zipCode</td></tr>"; ?>
        </div>
    </table>
    <br/>
    <a href="updateUserDetailsUI.php"><button onclick="'updateUserDetailsUI.php'" id = "button" style="margin-left: 260px;"> Update Details</button></a>
    
        

</div>
<div class="div2_right" style = "height:430px;">

</div>




<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>
