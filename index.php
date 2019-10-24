

<!DOCTYPE html>
<html>
<head>
	<title>Francis Blood Donation Center</title>
	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
	<font face="Bahnschrift SemiBold" color="grey">
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
	 	<table> 
	        <tr>   
	            <td>
	               <a href="index.php"> <img src="img/logo.png" style="align-items: left;height: 120px;width: 150px"></a>
	            </td>
	           	<td>
	                <font color="Black" size="15">Francis Blood Donation Center</font>
	            </td>
	        </tr>
    	</table>
		<br>

		<div class="topnav">
		
  			<a href="donor.php">Donate</a>
  			<a href="receiver.php">Receive</a>
  			<a href="details.php">Blood Quantity Available</a>
			<a href="createuser.php">Create user</a>
			<!--a href="contact.php">Contact</a>-->
			<a href="feedback.php">Feedback</a>
			
		</div>
		
		
		<div class="hero-image1">
			<div class="hero-text">
    			<h1 style="font-size:50px"><i>There is no great joy than saving a soul.</i></h1>
    		    </div>
		</div>
		<div class="hero-image2">
			<div class="hero-text" style="top: 50%">
    			<h1 style="font-size:50px" ><i>By giving blood, we present moments of happiness.</i></h1>
				</div>
		</div>
		<div class="hero-image3">
			<div class="hero-text" style="top: 80%">
<!--    			<h1 style="font-size:50px">By giving blood, we present moments of happiness.</h1>
-->    		    </div>
		</div>
		<br><br>
	</font>

	<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>	



