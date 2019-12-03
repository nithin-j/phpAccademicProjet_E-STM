<?php 
include_once "../php/main.php";
$user = $_SESSION['user'] 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin - Create User</title>
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

	<form action="#" method="post" enctype="multipart/form-data">
		<h1>Create User</h1>
		Name: <input type="text" name="name" >&nbsp;<br><br>
		Password: <input type="password" name="pass" >&nbsp;<br><br>
    Photo: <input type="file" name="file" accept=".gif, .jpeg, .jpg, .png">&nbsp;<br><br>
		Phone: <input type="tel" name="phone" ><br><br>
		User Type: <select name="userType">
		<?php 
			$id = 0;
			foreach($userTypes as $type){
				$id++; 
				echo("<option value ='$id'> $id: $type</option>");
			}
		?>
		</select><br><br>
		<button type="submit" name="create">Create Account</button>
	</form>
</div>
<div class="div2_right" style = "height:430px;">

</div>




<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>

