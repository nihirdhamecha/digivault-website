<?php
session_start();
$conn =  mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");

if(mysqli_connect_error())
		{
		die("Database connection error");
	}
if (isset($_POST['submit'])) 
{
    
    $webname = $_POST['webname'];
    $pass = $_POST['password'];
    $usr= $_POST['user'];
    $s = $_SESSION["id"];
    $sql="INSERT INTO password(loginid,website,username,password,dateadded) VALUES ('$s','$webname','$usr','$pass',CURRENT_DATE)";
    
     $query=mysqli_query($conn,$sql);
     $count = mysqli_num_rows($query);
    if ($count==0) {
        echo "<script>alert('Password has been added');</script>";
        echo "<script>window.location.href='password.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again'); </script>";
    }
}
if (isset($_POST['submit2'])) {
    $userid = 1;
    $webname = $_POST['webname2'];
    $pass = $_POST['password2'];
    $usr2=$_POST['usr2'];
     $s = $_SESSION["id"];
    $sql="UPDATE password SET password = '$pass' WHERE website = '$webname' and username='$usr2' and loginid='$s' ";
    $query=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($query);
    if ($count==0) {
        
        echo "<script>alert('Password has been updated');</script>";
    } 
    else
    {
        echo "<script>alert('Not updated');</script>";
    }
}

if(isset($_POST['logout']) != '')
{
    session_destroy();
    header('location:login.php');
}



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    	
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
	    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>	
	    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Digi-Vault</title>
	
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
	.btn-dark
	{
	margin-top:20px;
	margin-left:210px;
	margin-bottom:80px;
	}	
	#form1 {

            display: none;

        }

        #form2 {

            display: none;

        }

        #form3 {

            display: none;

        }

        #form4 {

            display: none;

        }
        .form-control{
          width:500px; 
          margin-left: auto;
            margin-right:auto;
            border: 2px #5e5d5d;
             border-radius: 10px;
             height:50px;
             margin-bottom:30px;
        }
        .labeltag{
            color:#5e5d5d;
         font-size:150%;
          margin-left: 440px;
            
        }
        h2
        {
            color:#5e5d5d;
            text-align:center;
            margin-bottom:30px;
        }
        .btnadd
        {
            margin-top:30px;
            margin-left:590px;
            width:150px;
            height:40px;
        }
        .navbar-custom
        {
            background-color:#f4f4f4;
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
    <h1 class="display-4">Password Keeper</h1>
	<h2 class="lead">Forgot your password? Don't worry we have it!</h2>
  </div>
</div>

<form method="post">
<button type="button" id="addexp" class="btn btn-dark btn-lg">Add Password</button>
<button type="button" id="update" class="btn btn-dark btn-lg">Update Password</button>

<button type="submit" name="view" class="btn btn-dark btn-lg">View Password</button>
</form>


 <form role="form" method="post" action="" id='form1'>
            <h2>Add Password:</h2>
            <div class="form-group">
                <label class="labeltag">Add website/app name:</label>
                <input class="form-control" type="text" value="" name="webname" placeholder="Website/App name" required="true">
            
            
                <label class="labeltag">Username:</label>
                <input class="form-control" type="text" value="" name="user" placeholder="Username" required="true">
            
            
                <label class="labeltag" >Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password"value="" required="true">
            </div>


            
                <button type="submit" name="submit" class="btn btn-success  btnadd">Add Password</button>
            

            
            </div>

        </form>

        <form role="form" method="post" action="" id='form2'>
            <h2>Update Password:</h2>
            <div class="form-group">
                <label class="labeltag">Add website/app name</label>
                <input class="form-control" type="text" value="" name="webname2" placeholder="Website/App name" required="true">
                
                
                <label class="labeltag">Username:</label>
                <input type="text" class="form-control" name="usr2" value="" placeholder="Username" required="true">
            
            
                <label class="labeltag">Password</label>
                <input type="text" class="form-control" name="password2" value="" placeholder="Password" required="true">
            </div>


            <div class="form-group has-success">
                <button type="submit" name="submit2" class="btn btn-success  btnadd">Update Password</button>
            </div>


            </div>

        </form>

        <?php
        if (isset($_POST['view'])) {
           $s = $_SESSION["id"];
           
            $query = mysqli_query($conn, "select website,username,password from password where loginid='$s'");

            if ($query) {
        ?>
                <table class="table table-sm" id="table5">
                    <thead>
                        <tr>
                            <th>Holder site</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>

                    <?php

                    while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    ?>
                        <tbody>

                            <tr>

                                <td><?php echo $row['website']; ?></td>
                        <td><?php echo $row['username']; ?></td>

                                <td><?php echo $row['password']; ?></td>


                            </tr>
                        </tbody>
                    <?php

                    } ?>



                </table>
        <?php }
        } ?>



    <!-- Optional JavaScript -->
	 <script type="text/javascript">
                $("#addexp").click(function() {
                    $("#form1").toggle();
                });
                $("#update").click(function() {
                    $("#form1").hide();
                    $("#form2").toggle();
                });
            </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>