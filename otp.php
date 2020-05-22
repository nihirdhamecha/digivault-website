<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
    <title>Digi-Vault</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<style type="text/css">
	
	    .jumbotron
	{
	    background-color:#a2dce8;
	}
	.btn-success
	{
	margin-left: 700px;
	}
	body{
	background-color:#f4f4f4;}
	.display-4
	{
	color:black;
	text-align: center;
	}
	.lead{
	color:black;
	text-align: center;
	}
	.form-group
	{
	    margin-left:400px;
	}
	#send
	{
	    margin-bottom:10px;
	    margin-top:10px;
	    margin-left:0px;
	}
	#verify
	{
	    margin-bottom:100px;
	    margin-top:10px;
	    margin-left:0px;
	}
	    
	</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
  <a class="navbar-brand" href="#">Digi-Vault</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="mainpage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="notes.php">Notes</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="photos.php">Photos</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="password.php">Password</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="expense.php">Expense Calculator</a>
      </li>
      <form method="POST">
      <button type="submit" name="logout" class="btn btn-success">Logout</button>
      </form>
    </ul>
  </div>
</nav>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">OTP-Verification</h1>
	<h2 class="lead">Sorry for the inconvinience but it is for your safety!</h2>
  </div>
</div>
	<div class="row">
	<div class="col-md-9 col-md-offset-2">
		<?php
		
		session_start();
		
			if(isset($_POST['sendopt'])) {
				require('textlocal.class.php');
				require('credential.php');

				$textlocal = new Textlocal(false, false, API_KEY);

                // You can access MOBILE from credential.php
				// $numbers = array(MOBILE);
                // Access enter mobile number in input box
                $numbers = array($_POST['mobile']);

				$sender = 'TXTLCL';
				$otp = mt_rand(10000, 99999);
				
				$_SESSION["otp"]=$otp;
				
				$message = "Hello " . $_POST['uname'] . " This is your OTP: " . $otp;

				try {
				    $result = $textlocal->sendSms($numbers, $message, $sender);
				    setcookie('otp', $otp);
				    $success ="OTP sent!";
				} catch (Exception $e) {
				    die('Error: ' . $e->getMessage());
				}
			}

			if(isset($_POST['verifyotp']))
			{ 
			    //$otps=1;
				//$otp = $_SESSION["otp"];
				
				
				    
		    	//header('location:password.php');
					
			}
		?>
    <div class="col-md-9 col-md-offset-2">
        <div id="error"><?php if ($error!="") 
	{ echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?> 
	</div>
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Name</label>
                    <input type="text" class="form-control" id="uname" name="uname" value="" maxlength="10" placeholder="Enter your name" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="" maxlength="10" placeholder="Enter valid mobile number" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendopt" id="send" class="btn btn-lg btn-success btn-block">Send OTP</button>
                </div>
            </div>
            </form>
            <form role="form" method="post">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" name="votp" placeholder="Enter OTP" maxlength="5" required="">
                </div>
            </div>
            </form>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <a type="button" href="password.php" id="verify" name="verifyotp" class="btn btn-lg btn-info btn-block">Verify</a>
                </div>
            </div>
        
	</div>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>




