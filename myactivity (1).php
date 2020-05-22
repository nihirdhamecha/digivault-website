<?php
session_start();
$conn =  mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");
if (isset($_POST['logout']) != '') {
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
        .btn-success {
            margin-left: 650px;
            position: left;
        }

        

        body {
            background-color: #e9ecef;
        }

        #diary {
            width: 1100px;
            height: 500px;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .custom-file {
            width: 30%;
            margin-top: 30px;
            margin-left: 120px;
            margin-bottom: 50px;
        }

        .topnav {
            margin-left: 120px;
            width: 1100px;
            overflow: hidden;
            background-color: #212020;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Style the "active" element to highlight the current page */
        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .topnav a.active1 {
            background-color: #19b73b;
            color: white;
        }

        .topnav a.active2 {
            background-color: #e22232;
            color: white;
        }

        /* Style the search box inside the navigation bar */
        .topnav input[type=text] {
            float: right;
            padding: 6px;
            border: none;
            margin-top: 8px;
            margin-right: 16px;
            font-size: 17px;
        }
        .jumbotron
	{
	    background-color:#a2dce8;
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

        /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
        @media screen and (max-width: 600px) {

            .topnav a,
            .topnav input[type=text] {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }

            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        #Attach {
            margin-left: 120px;
        }

        .btn-group {
            margin-left: 250px;
            text-align: center;
            font-size: 17px;
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

        .counter {
            background-color: #f5f5f5;
            padding: 20px 0;
            border-radius: 5px;
        }

        .count-title {
            font-size: 40px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .count-text {
            font-size: 13px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .fa-2x {
            margin: 0 auto;
            float: none;
            display: table;
            color: #4ad1e5;
        }
        .btn-primary
        {
            margin-left:590px;
            margin-top:50px;
        }
    </style>
</head>

<body>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Secret Diary</a>
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
                    <form method="post">
                    <button type="button" name="logout" class="btn btn-success">Logout</button>
                    </form>
                </ul>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">My Activity</h1>
	<h2 class="lead">Track Your Activity!</h2>
  </div>
</div>


        <?php

        $s=$_SESSION['id'];

        $query = mysqli_query($conn, "SELECT loginid,Date_time,activity  FROM `useract`  where (loginid='$s')");


        if ($query) {
        ?>
            <table class="table table-sm" id="table5">
                <thead>
                    <tr>
                        <th>Date</th>

                        <th>Activity</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['Date_time']; ?></td>
                            <td><?php echo $row['activity']; ?></td>
                        </tr>
                    </tbody>
                <?php
                } ?>
            </table>
            
            
        <?php } ?>
        
        <?php

        $s=$_SESSION['id'];

        $query = mysqli_query($conn, " select notes.dateadded as date_added,notes.title as title ,notes.diary as diary, password.website as webname, password.password as passwd, tblexpense.ExpenseItem as item, tblexpense.ExpenseCost as cost from notes inner join password on notes.dateadded=password.dateadded&&notes.loginid=password.loginid inner join tblexpense on notes.loginid=tblexpense.loginid&&notes.dateadded=tblexpense.dateadded where notes.loginid='$s' ");
        $sql= "insert into useract select notes.loginid,notes.dateadded as date_added,notes.title as title ,notes.diary as diary, password.website as webname, password.password as passwd, tblexpense.ExpenseItem as item, tblexpense.ExpenseCost as cost from notes inner join password on notes.dateadded=password.dateadded&&notes.loginid=password.loginid inner join tblexpense on notes.loginid=tblexpense.loginid&&notes.dateadded=tblexpense.dateadded where notes.loginid='$s' "; 
        mysqli_query($conn,$sql);

        if ($query) {
        ?>
            <table class="table table-sm" id="table5">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Note_Title</th>
                        <th>Diary</th>
                        <th>Website</th>
                        <th>Password</th>
                        <th>ExpenseItem</th>
                        <th>ExpenseCost</th>



                        


                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['date_added']; ?></td>
                            <td><?php echo $row['title']; ?></td>

                            <td><?php echo $row['diary']; ?></td>
                            <td><?php echo $row['webname']; ?></td>
                            <td><?php echo $row['passwd']; ?></td>
                            <td><?php echo $row['item']; ?></td>
                            <td><?php echo $row['cost']; ?></td>
                        </tr>
                    </tbody>
                <?php
                } ?>
            </table>
        <?php } ?>

<a href="generatepdf.php" class="btn btn-primary btn-lg">Download PDF</a>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

</html>