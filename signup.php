
  <?php
    
    
    $error = "";
        
	$link = mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");
		
	$nihir = "";
	
	
if(isset($_POST['signup']) != '')

{
    $pass = $_POST['password'];
	$contact=$_POST['contact'];
	$num_length = strlen((string)$contact);
	$characterCount = strlen ( $pass );
    if(mysqli_connect_error())
		{
		die("Database connection error");
	}
		
		if(!$_POST['username']){
		    
			$error .=": A Username is required <br>";		}
			
		if(!$_POST['email']){
		    
			$error .=": An email is required<br>";		}
			
		if(!$_POST['contact']){
		    
			$error .=": An contact is required<br>";	
			}
	
		if(!$_POST['password']){
		    
			$error .="An password is required<br>";	
			}	
		
		if($num_length != 10 && $_POST['contact'])
		{
		    $error .="Contact must contain 10 digits<br>";
		}
		if($characterCount < 8 && $_POST['password'] )
		{
		     $error .="Password must have 8 characters<br>";
		}
		
		if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        }
		
		else{
		    $email = $_POST['email'];
		    
		    $query = "SELECT loginid FROM users WHERE email = '$email'";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                }
                 else {
                     $username=$_POST['username'];
                     $contact=$_POST['contact'];
                     $password=$_POST['password'];
                    $query = "INSERT INTO users (email,username,contact,password) VALUES ('$email','$username','$contact','$password')";
                    $result=mysqli_query($link,$query);
                    
                    if (!($result))
                    {
                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } 
                    else
                    {
                        echo '<script>alert("Sign-Up Succesful! Please Login ")</script>'; 
                    }
                    }
		
		} }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Digi-Vault</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
      
      <style type="text/css">
          
      .container {
      
            text-align: center;
            width: 400px;
      }
          
      #homePageContainer {
              
            margin-top: 150px;
          
      }
          
          #containerLoggedInPage {
              
              margin-top: 60px;
              
          }
          
          
      html { 
          
          background: url(bg2.jpg) no-repeat center center fixed; 
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          
          }
          
          body {
              
              background: none;
              color: #FFF;
              
          }
          
          #logInForm {
              
              display:none;
              
          }
          #bt
          {
              margin-bottom:10px;
          }
          
		  .btn-success
		  {
		  margin-bottom:40px;
		  }
         
      </style>
  </head>
  <body>      
  

  
  
      <div class="container" id="homePageContainer">
      
    <h1>Digi-Vault</h1>
          
          <p><strong>The Digital Vault</strong></p>
          
           <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
} ?></div>

<form method="post" id = "signUpForm">
    
    <fieldset class="form-group">

        <input class="form-control" type="text" name="username" placeholder="Username">
        
    </fieldset>
    
    <fieldset class="form-group">

        <input class="form-control" type="email" name="email" placeholder="Your Email">
        
    </fieldset>
	
	<fieldset class="form-group">

        <input class="form-control" type="text" name="contact" placeholder="Contact number">
        
    </fieldset>
    
    <fieldset class="form-group">
    
        <input class="form-control" type="password" name="password" placeholder="Password">
        
    </fieldset>
	
	 <fieldset class="form-group">
    <input type="submit" name="signup" class="btn btn-primary id="bt" value="Sign-up">
	<p><strong>Already have an account ? <a href="login.php"> Login </a>.</strong></p>
	</fieldset>
    

</form>
          
      </div>


    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
      
        
      
      </script>
      
  </body>
</html>




