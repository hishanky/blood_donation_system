<?php
require('db.php');


//check if already logged in move to home page



if(isset($_POST['submitf'])){
    
    if (!isset($_POST['uname'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['mobile_no'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['ans1'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['ans2'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['ans3'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['ans4'])) $error[] = "Please fill out all fields";
    $mobile_no = $_POST['mobile_no'];
    $uname = $_POST['uname'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO feedback (uname,mobile_no,ans1,ans2,ans3,ans4) VALUES (:uname, :mobile_no,:ans1, :ans2,:ans3,:ans4)');
            $stmt->execute(array(
                ':uname' => $uname,
                ':mobile_no' => $mobile_no,
                ':ans1' => $ans1,
                ':ans2' => $ans2,
                ':ans3' => $ans3,
                ':ans4' => $ans4,
            ));
            $id = $db->lastInsertId('fid');
 
            
            
            header("Location:index.php");
            exit;
            //redirect to index page

        //else catch the exception and show the error.
        
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
                    <img src="img/feedback.png" alt="sing up image">
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Blood Donation Entry</h2>
                    <form method="POST" class="register-form" id="login-form">
                    <h3>Name</h6>

                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="uname" id="uname" placeholder="Your Name"/>
                        </div>
                        <h3>Mobile Number</h6>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" name="mobile_no" id="mobile_no" maxlength="10" placeholder="Your Mobile NO."/>
                        </div>
                    
                        <h3>What was your first impression when you entered the website?</h6>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-collection-text"></i></label>
                            <input type="text" name="ans1" id="ans1" placeholder="Answer"/>
                        </div>
                        <h3>How did you first hear about us?</h6>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-collection-text"></i></label>
                            <input type="text" name="ans2" id="ans2" placeholder="Answer"/>
                        </div>
                        <h3>Is there anything missing on this page?</h3>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-collection-text"></i></label>
                            <input type="text" name="ans3" id="ans3" placeholder="Answer"/>
                        </div>
                        <h3>How likely are you to recommend us to a friend or colleague?</h3>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-collection-text"></i></label>
                            <input type="text" name="ans4" id="ans4" placeholder="Answer"/>
                        </div>      
                        
                        <div class="form-group form-button">
                            <input type="submit" name="submitf" id="submitf" class="form-submit" value="Submit Feedback"/>
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




