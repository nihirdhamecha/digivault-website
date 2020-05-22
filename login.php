<?php

session_start();
$conn = mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");

if(isset($_POST['login']) != '')
{   
    	if(!$_POST['email']){
		    
			$error .=": An email is required<br>";		}
				if(!$_POST['password']){
		    
			$error .="An password is required<br>";	
			
			}	
			if ($error != "") {
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        }
		
		else{
    $user=$_POST['email'];
    $pass=$_POST['password'];
    
    $sql="select * from users where email='$user' and password='$pass'";
   $query=mysqli_query($conn,$sql);
   $row = mysqli_num_rows($query);
   
       
        if($row)
       {
          $row2 = mysqli_fetch_array($query, MYSQLI_ASSOC);
          $_SESSION['username']=$row2["username"];
          $_SESSION['id']=$row2["loginid"];
           $_SESSION['email']= $user;
           header('location:mainpage.php');
       }else
       {
           $error = "Invalid username and password";
           
       }
		}

}
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
          
          background: url(bg3.jpg) no-repeat center center fixed; 
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
          
          .toggleForms {
              
              font-weight: bold;
              
          }
          
          #diary {
              
              width: 100%;
              height: 100%;
              
          }
		  .btn-success
		  {
		  margin-bottom:20px;
		  }
         
      </style>
  </head>
  <body>      
      <div class="container" id="homePageContainer">
      
    <h1>Digi-Vault</h1>
          
          <p><strong>The Digital-Vault</strong></p>
          
           <div id="error"><?php if ($error!="") {
    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
    
} ?></div>

<form method="post">
    
    
    
    <fieldset class="form-group">

        <input class="form-control" type="email" name="email" placeholder="Your Email">
        
    </fieldset>
    
    <fieldset class="form-group">
    
        <input class="form-control" type="password" name="password" placeholder="Password">
        
    </fieldset>
    
   
    <button type="submit" class="btn btn-success" name="login" >Login</button>
	
	<p><strong>Don't have an account ? <a href="signup.php"> Sign-up </a>.</strong></p>

</form>
          
      </div>


    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
      
      <script type="text/javascript">
      
        
      
      </script>
      
  </body>
</html>




