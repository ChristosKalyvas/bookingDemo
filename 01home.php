<!DOCTYPE html>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Booking.corp - Home Page</title>
    <link href="style.css" rel="stylesheet" />
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
Home Page


    <form name="frmdropdown" method="post" action="home.php">
     <center>
            <h2 align="center">Bookings</h2>
        
            <strong> Select Room : </strong> 
            <select name="room"> 
               <option value=""> -----------ALL----------- </option> 
            <?php
			
				include "config.php";  // Using database connection file here
				$sql = "SELECT room FROM bookings";
				$result = $conn->query($sql);

				while ($row = $result->fetch_assoc()) {
					echo "<option value='" . $row['room'] ."'>" . $row['room'] ."</option>";
				}
             ?>
              </select>
     <input type="submit" name="find" value="find"/> 
     <br><br>
 
   <table border="1">
 <tr align="center">
     <th>Emp_Id </th>      <th>Emp_name </th>     <th>Age</th>    <th>Designation</th>    <th>Salary</th>
 </tr> 

 <?php 
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
         $des=$_POST["room"]; 
		 echo $des;
         if($des=="")  // if ALL is selected in Dropdown box
         { 
            $sql = "SELECT id, dateIn, dateOut, name, room FROM bookings";
			$result = $conn->query($sql);
         }
         else
         { 
            // $res=mysql_query("Select * from bookings where room='".$des."'");
			 $sql = "SELECT id, dateIn, dateOut, name, room FROM bookings where room='".$des."'";
			 $result = $conn->query($sql);

         }

		while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["id"]."</td><td>".$row["dateIn"]."</td><td>".$row["dateOut"]."</td><td>".$row["name"]."</td><td>".$row["room"]."</td></tr>";
		}
  echo "</table>";

    }
?>
  </table>
 </center>
</form>




<?php //mysqli_close($db);  // close connection ?>

</body>
</html>

