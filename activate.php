<?php
require('db.php');


$req = curl_init();
//collect values from the url
$mobile_no = trim($_GET['verify']);


//if id is number and the active token is not empty carry on
if(is_numeric($mobile_no)){
	$stmt = $db->prepare("SELECT active from user where mobile_no = :mobile_no");
	$stmt->execute(array(':mobile_no' => $mobile_no));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$active = $row['active'];
	if ($active == "0") {
		header('Location: signin.php?action=activated');
	}
	if(isset($_POST['verify'])){
		

		$OTP = $_POST['OTP'];
		if($active == $OTP){
		//update users record set the active column to Yes where the memberID and active value match the ones provided in the array
			$stmt = $db->prepare("UPDATE user SET active = '0' WHERE mobile_no = :mobile_no");
			$stmt->execute(array(
				':mobile_no' => $mobile_no
			));
		
		
			//if the row was updated redirect the user
			if($stmt->rowCount() == 1){

				//redirect to login page
                header('Location: index.php');
				exit;

			} else {
				echo "Your account could not be activated."; 
			}
		}
	}
	if (isset($_POST['resend'])) {
		$message = "Your%20OTP%20for%20Swapp%20Thing%20is%20$active%20valid%20for%205%20min.%20Do%20not%20share%20OPT%20with%20any%20one.";
		curl_setopt($req, CURLOPT_URL,"http://api.msg91.com/api/sendhttp.php?country=91&sender=SWPTHG&route=4&mobiles=$mobile_no&authkey=262278AgDEnxGyXTc5c612d06&message=$message");
		curl_exec($req);
	}
}
$title = "Activate your Account";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/jpg" href="img/logo.png">
    <title><?php echo $title; ?></title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css"> 

    

    <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">

    <!-- Main css -->

    <link rel="stylesheet" href="newstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body class="background-image">
<div class="main ">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="img/blooddonorhero.jpg" alt="verify"></figure>
                    <a href="signup.php" class="signup-image-link"></a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Verify user</h2>
                    <?php
                        //check for any errors
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<p class="bg-danger">'.$error.'</p>';
                            }
                        }
                        if(isset($_GET['action'])){

                            //check the action
                            switch ($_GET['action']) {
                                case 'active':
                                    echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
                                    break;
                                case 'reset':
                                    echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
                                    break;
                            }
                        }
                    ?>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="OTP" id="OTP" maxlength="6" placeholder="Enter OTP"/>
                        </div>
                        
                        <div class="form-group form-button">
                            <input type="submit" name="verify" id="verify" class="form-submit" value="Verify"/>
							<input type="submit" name="resend" id="resend" class="form-submit" value=" Resend OTP"/>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>

</div>

  <!-- JS -->
  <script>
    $('input[name="mobile_no"]').keyup(function(e)
            {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
    </script>
    <script>
    $('input[name="OTP"]').keyup(function(e)
            {
                if (/\D/g.test(this.value))
                {
                    // Filter non-digits from input value.
                    this.value = this.value.replace(/\D/g, '');
                }
            });
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>





