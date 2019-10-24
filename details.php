
<?php
define("DB_host","localhost");
define("DB_user","root");
define("DB_pass","");
define("DB_Name","miniproj");

$conn = new mysqli(DB_host,DB_user,DB_pass,DB_Name);
if (!$conn) {
    die("connection failed: ." . $connect_error);
}
$sql = "SELECT * FROM rblood";
$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html>
<head>
	<title>Francis Blood Donation Center</title>
	<link rel="icon" type="image/jpg" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<font face="Bahnschrift SemiBold" color="grey">
	 	<table> 
	        <tr>   
	            <td>
	                <a href="index.php"><img src="img/logo.png" style="align-items: left;height: 120px;width: 150px"></a>
	            </td>
	           	<td>
	                <font color="Black" size="15">Francis Blood Donation Center</font>
	            </td>
	        </tr>
    	</table>

		<div class="topnav">
  			<a href="donor.php">Donate</a>
  			<a href="receiver.php">Receive</a>
  			<a href="details.php">Blood Quantity Available</a>
			  <a href="contact.php">Add Blood</a>
			  <a href="createuser.php">Create user</a>
        </div>
        
<center>
<h1>Blood Details</h1>    
<table border="1px">
    <th>
        <td>Blood Group</td>
        <td>Amount</td>
    </th>


<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td></td><td>" . $row["bloodgroup"]. "</td><td>" . $row["amount"]. "</td></tr>";
    }
} else {
    echo "0 results";
}
?>
</table>
</center>
