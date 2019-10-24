<?php
require('db.php');


if(isset($_POST['add'])){
    if (!isset($_POST['fname'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['lname'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['mobile_no'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['address'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['dob'])) $error[] = "Please fill out all fields";
    $mobile_no = $_POST['mobile_no'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];


    $stmt = $db->prepare('SELECT mobile_no FROM user WHERE mobile_no = :mobile_no');
    $stmt->execute(array(':mobile_no' => $mobile_no));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($row['mobile_no'])){
        $error[] = 'User is already Registred.';
    }else{
    $activasion = mt_rand(100000,999999);

        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO user (fname,lname,dob,mobile_no,address, active) VALUES (:fname, :lname,:dob, :mobile_no, :address, :active)');
            $stmt->execute(array(
                ':fname' => $fname,
                ':lname' => $lname,
                ':dob' => $dob,
                ':mobile_no' => $mobile_no,
                ':address' => $address,
                ':active' => $activasion
            ));
            $id = $db->lastInsertId('mobile_no');
        

            

            
            header("Location: activate.php?verify=$mobile_no");
            exit;
            

            //redirect to index page

        //else catch the exception and show the error.
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }
    }
    }
$title = 'Francis Blood Donation Center';

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
<font face="Bahnschrift SemiBold" color="grey">
	 	<table> 
	        <tr>   
	            <td>
	                <a href="index.php"><img src="img/logo.png" style="align-items: left;height: 120px;width: 150px"></a>
	            </td>
	        </tr>
    	</table>
<div class="main ">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <img src="img/blooddonorhero.jpg" alt="sing up image">
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Blood Donation Registration</h2>
                    <?php
				// //check for any errors
				// if(isset($error)){
				// 	foreach($error as $error){
				// 		echo '<p class="bg-danger">'.$error.'</p>';
				// 	}
				// }

				// if(isset($_GET['action'])){

				// 	//check the action
				// 	switch ($_GET['action']) {
				// 		case 'active':
				// 			echo "Your account is now active you may now log in.";
				// 			break;
				// 		case 'reset':
				// 			echo "Please check your inbox for a reset link.";
				// 			break;
				// 		case 'resetAccount':
				// 			echo "Password changed, you may now login.";
                //             break;
                //         case 'activated':
                //             echo "User Account already activated.";
				// 	}

				// }

				
				?>
                    <form method="POST" class="register-form" id="login-form">
                    <h4>First Name</h4>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="fname" id="fname" placeholder="Your First Name"/>
                        </div>
                        <h4>Last Name</h4>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="lname" id="lname" placeholder="Your Last Name"/>
                        </div>
                        <h4>Mobile Number</h4>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" name="mobile_no" id="mobile_no" maxlength="10" placeholder="Your Mobile NO."/>
                        </div>
                        <h4>Date of Birth</h4>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-phone"></i></label>
                            <input type="date" name="dob" id="dob" placeholder="DOB"/>
                        </div>
                        <h4>Address</h4>
                        <div class="form-group">
                            <label for="address"><i class="zmdi zmdi-home"></i></label>
                            <input type="text" name="address" id="address " placeholder="address"/>
                        </div>

        
                        
                        <div class="form-group form-button">
                            <input type="submit" name="add" id="add" class="form-submit" value="Create User"/>
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




