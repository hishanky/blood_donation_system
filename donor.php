<?php
require('db.php');


if(isset($_POST['addblood'])){
    
    if (!isset($_POST['mobile_no'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['quantity'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['bog'])) $error[] = "Please fill out all fields";
    if (!isset($_POST['dod'])) $error[] = "Please fill out all fields";
    $mobile_no = $_POST['mobile_no'];
    $quantity = $_POST['quantity'];
    $bog = $_POST['bog'];
    $dod = $_POST['dod'];


    $stmt = $db->prepare('SELECT mobile_no FROM user WHERE mobile_no = :mobile_no');
    $stmt->execute(array(':mobile_no' => $mobile_no));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($row['mobile_no'])){
            

        try {

            //insert into database with a prepared statement
            $stmt = $db->prepare('INSERT INTO donor (mobile_no,quantity,bog,dod) VALUES (:mobile_no, :quantity,:bog, :dod)');
            $stmt->execute(array(
                ':mobile_no' => $mobile_no,
                ':quantity' => $quantity,
                ':bog' => $bog,
                ':dod' => $dod,
            ));
            $id = $db->lastInsertId('uid');
            $stmt = $db->prepare("UPDATE rblood SET amount = amount+3 WHERE bloodgroup = :bog");
			$stmt->execute(array(
				':bog' => $bog
			));
           
            
            header("Location:index.php");
            exit;
            //redirect to index page

        //else catch the exception and show the error.
        } catch(PDOException $e) {
            $error[] = $e->getMessage();
        }
    }else
    {
        $error[] = 'User is not Registred.';
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
                    <h2 class="form-title">Blood Donation Entry</h2>
                  
                    <form method="POST" class="register-form" id="login-form">
                        <h4>Mobile Number</h4>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-phone"></i></label>
                            <input type="text" name="mobile_no" id="mobile_no" maxlength="10" placeholder="Your Mobile NO."/>
                        </div>
                        <h4>Blood Group</h4>
                        <div class="form-group">
                            <input type="text" name="bog" id="bog" placeholder="Blood Group"/>
                        </div>
                        <h4>Amount Of Blood</h4>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity"/>
                        </div>
                        <h4>Date of donation</h4>
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="date" name="dod" id="dod" placeholder="Date Of Donation"/>
                        </div>      
                        
                        <div class="form-group form-button">
                            <input type="submit" name="addblood" id="addblood" class="form-submit" value="Add Blood"/>
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
</body>
</html>




