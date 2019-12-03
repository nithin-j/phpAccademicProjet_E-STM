<!DOCTYPE html>
<html lang="en">
<head>
<meta charset ="utf-8">
<title>E-STM</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<header>
<h2>STM(Societe de transport de Montreal )</h2>
</header>
<nav style = "height: 10px;">

</nav>

<div class="div1">


</div>
<nav style = "height: 10px;">

</nav>
<div class="div2_left">
<h3>Welcome</h3>
<p>The Societe de transport de Montreal (STM; English: Montreal Transit Corporation) is a public transport agency that operates transit bus and rapid transit services in Montreal, Quebec, Canada.
 Established in 1861 as the "Montreal City Passenger Railway Company", it has grown to comprise four subway lines with a total of 68 stations, as well as over 186 bus routes and 23 night routes. 
 The STM was created in 2002 to replace the Societe de transport de la communaute urbaine de Montreal (STCUM). The STM operates the second most heavily used urban mass transit system in Canada 
 after the Toronto Transit Commission, and one of the most heavily 
used rapid transit systems in North America. As of 2011, the average daily ridership is 2,524,500 passengers.</p>
</div>
<div class="div2_right">

		<form name="login_form" action = "./php/main.php" method="POST">
			<h2 >Login</h2>
			<span class="usernamelabel" >username </span><br/> <Input id="usrname"type="text" name="username" class ="username" autofocus onfocusout="ValidateUsername()"/><br/><br/><br/>
			<span class="usernamelabel" >password </span><br/> <Input id="pswrd"type="password" name="password" class ="username" onfocusout="ValidatePassword()"/><br/><br/><br/>
			<button type="submit" id="loginbutton" name = "login">Login to your Account</button>
		</form>

</div>


<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>
</html>