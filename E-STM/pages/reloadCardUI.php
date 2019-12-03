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
<title>CSS in HTML</title>
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
    <li><a href="reportCardUI.php">Report Lost/Stollen Card</a></li>
    <li><a href="reloadCardUI.php">Reload Card</a></li>

    
    <li><form action="#" method="post"><button id="button" style="margin-left:550px;"type="submit" name="logout">Logout</button></form><!--<a href="../index.php">Logout</a>--></li>
    </ul>
</nav>



<nav>

</nav>


<div class="div2_left"  style = "height:430px;">

  <table>
    <?php
		echo"<tr><th>Trip Type ID</th><th>Trip Type</th><th>Fare</th></tr>";
            foreach($allTripTypes as $key=>$value){
				$tripTypeID =  $value->getTripTypeID(); $tripType = $value->getTripType(); $fare = $value->getFare();
				echo"<tr><td>$tripTypeID</td><td>$tripType</td><td>$fare</td></tr>";	
            }
        ?> 
    </table>
    <br><br>
    <form action="#" method="post">
		Trip Type: <select class='select' name="triptype">
		<?php 
			$id = 0;
			foreach($tripTypes as $type){
				$id++; 
				echo("<option value ='$id'> $id: $type</option>");
            }
             
		
		echo"</select>";
        ?>
        <button type="submit" name="reloadCard">Reoload</button>

	</form>
</div>
<div class="div2_right" style = "height:430px;">

</div>




<footer>
<p>Copyright&copy;2019</p>
</footer>

</body>


<script>

            const select = document.querySelector('.select');
            const value = document.querySelector('.value');

            console.log(select,value);


            const change = () =>{

                value.value = select.options[select.selected].  

            }

            select.onchange = change;

            


</script>

</html>