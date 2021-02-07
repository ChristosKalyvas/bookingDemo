<!DOCTYPE html> 
<html> 
  
<head> 
 <link href="style.css" rel="stylesheet" />
    <link href= 
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' 
          rel='stylesheet'> 
    <style> 
        .ui-datepicker { 
            width: 12em;  
        } 
        h1{ 
            color:black; 
        } 
    </style> 
</head> 
  
<body> 
<nav>
    <ul>
        <li><a href="01home.php">Home</a></li>
        <li><a href="02booking.php">booking</a></li>
        <li><a href="03about.php">about</a></li>
		<li><a href="04admin.php">admin</a></li>
    </ul>
</nav>

<?php

if(isset($_POST['submit'])){	
include "config.php"; // Using database connection file here
	
    echo "<h1>Record adding</h1>"; 	
    $my_date_picker1 = $_POST['my_date_picker1'];
    $my_date_picker2 = $_POST['my_date_picker2'];
	$my_text1 = $_POST['my_text1'];
	$room = $_POST['room'];
	echo "Welcome ". $my_date_picker1;
	echo "Welcome2 ". $my_date_picker2;

	$sql = "INSERT INTO bookings ". "(id,dateIn, dateOut,name, room) ". "VALUES('03','$my_date_picker1','$my_date_picker2','$my_text1', '$room')";
               
            $retval = mysqli_query($conn, $sql);
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";

}else{

//mysqli_close($db); // Close connection
?>


    <center> 
		<h1>Booking.corp</h1> 
		<form method = "post" action = "<?php $_PHP_SELF ?>">
			  Start Date: 
			<input type="text" id="my_date_picker1" name="my_date_picker1">  
			  End Date: 
			<input type="text" id="my_date_picker2" name="my_date_picker2"> 
			
			<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> </script> 
			<script src= "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> 
			
			<script> 
				$(document).ready(function() { 
	  
					$(function() { 
						$("#my_date_picker1").datepicker({}); 
					}); 
	  
					$(function() { 
						$("#my_date_picker2").datepicker({}); 
					}); 
	  
					$('#my_date_picker1').change(function() { 
						startDate = $(this).datepicker('getDate'); 
						$("#my_date_picker2").datepicker("option", "minDate", startDate); 
					}) 
	  
					$('#my_date_picker2').change(function() { 
						endDate = $(this).datepicker('getDate'); 
						$("#my_date_picker1").datepicker("option", "maxDate", endDate); 
					}) 
				}) 
			</script> 
		
			<h1></h1>
			Name: 
			<input type="text" id="my_text1" name="my_text1"> 
		
			<h1></h1>

				Choose Room :
				<select name="room"> 
				<?php
										
					include "config.php";  // Using database connection file here
					$sql = "SELECT room FROM bookings";
					$result = $conn->query($sql);

					while ($row = $result->fetch_assoc()) {
						echo "<option value='" . $row['room'] ."'>" . $row['room'] ."</option>";
					}
	
				 ?>
				   	
				  </select>
				  
		
				<h1></h1>
		
			<input type="submit" name="submit" value="submit"/> 
			<br><br>
		
		</form>
	</center>
	
} <?php
         }
      ?>
</body> 
  
</html> 
