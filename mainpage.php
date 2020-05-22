<?php
session_start();
$conn = mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Digi-Vault</title>
	<style type="text/css">
	
	.btn-success
	{
	margin-left: 600px;
	}
	.jumbotron
	{
	    	height:250px;
	    background-color:#a2dce8;
	}
	.card
	{
	margin-top: 50px;
	margin-left: 50px;
	position:left;
	}
	
		.display-4
	{
	color:black;
	text-align: center;
	}
	.lead{
	color:black;
	text-align: center;
	}
	body{
	background-color:#f4f4f4;}
	</style>
	
	
	
  </head>
  <body>
    
	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="mainpage.php">Digi-Vault</a>
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
        <a class="nav-link" href="otp.php">Password</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="expense.php">Expense Calculator</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="myactivity.php">My Activity</a>
      </li>
      <form method="POST">
      <button type="submit" name="logout" class="btn btn-success">Logout</button>
      </form>
    </ul>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome <?php echo $_SESSION["username"];  ?>!</h1>
  </div>
</div>
      
      <div class="container" id="about">
      <div class="card-deck-wrapper">
  <div class="card-deck">
    <div class="card" style="width: 18rem;">
  <img src="c1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Notes</h5>
    <p class="card-text">Risk of somebody reading your private diary? Write here it is safe! Read, Update, Delete whenever you like!   </p>
    <a href="notes.php" class="btn btn-primary">Notes</a>
  </div>
</div>
    <div class="card" style="width: 18rem;">
  <img src="c2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Photos</h5>
    <p class="card-text">Potrait! Landscape! Aerial! Selfie! Animal! Wedding! Fashion! Trendy! Store all kinds of photos here safely! </p>
    <a href="photos.php" class="btn btn-primary">Photos</a>
  </div>
</div>
    <div class="card" style="width: 18rem;">
  <img src="c3.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Password</h5>
    <p class="card-text">Too many username and passwords to remember? Don't worry we will store it for you!</p>
    <a href="password.php" class="btn btn-primary">Password-Keeper</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="c4.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Expense Calculator</h5>
    <p class="card-text">Tired of writing and searching expenses in your diary? Get rid of them by storing your expenses digitally.</p>
    <a href="expense.php" class="btn btn-primary">Expense Calculator</a>
  </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>