<?php
session_start();
$conn = mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");;


if (isset($_POST['submit'])) {
   $s = $_SESSION["id"];
  $exp_type = $_POST['categ'];
  $dateexpense = $_POST['dateexpense'];
  $item = $_POST['item'];
  $costitem = $_POST['costitem'];
  $query = mysqli_query($conn, "insert into tblexpense(loginid,ExpenseDate,ExpenseItem,ExpenseCost,ExpenseType,dateadded) values('$s','$dateexpense','$item','$costitem','$exp_type',CURRENT_DATE)");
  $count = mysqli_num_rows($query);
  if ($count == 0) {
    echo "<script>alert('Expense has been added');</script>";
    echo "<script>window.location.href='expense.php'</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again'); </script>";
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
.form-control{
          width:600px; 
          margin-left: auto;
            margin-right:auto;
             border: 2px solid #282A36;
             border-radius: 10px;
             height:50px;
             margin-bottom:30px;
        }
        .labeltag{
            color:#5e5d5d;
         font-size:150%;
          margin-left: 400px;
            
        }
    
    #addexp
    {
        border-radius:5px;
        margin-left:250px;
        
    }
    #expensereport
    {
        border-radius:5px;
        margin-left:250px;
    }
   
    
    

    #Attach {
      margin-left: 120px;
    }

    .btn-group {
      margin-left: 200px;
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
        margin-top:100px;
        width:240px;
        height:200px;
      background-color: #dbd9d9;
      padding: 20px ;
      border-radius: 5%;
      margin-left:100px;
      margin-bottom:100px;
    }

    .count-title {
      font-size: 70px;
      font-weight: normal;
      margin-top: 10px;
      margin-bottom: 0;
      text-align: center;
    }

    .count-text {
        
      font-size: 17px;
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
     .navbar-custom
        {
            background-color:#f4f4f4;
        }
         h2
        {
            color:#5e5d5d;
            text-align:center;
            margin-bottom:30px;
        }
        .formhead
        {
            
            color:#5e5d5d;
            text-align:center;
            margin-bottom:30px;
            margin-top:50px;
        }
        .jumbotron
	{
	    background-color:#a2dce8;
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
	.btnadd
        {
            margin-top:30px;
            margin-left:590px;
            width:150px;
            height:40px;
        }
        .customers {
            
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 70%;
  margin-bottom :100px;
  margin-left:200px;
  
}

.customers td, .customers th {
  border: 1px solid #ddd;
  color:black;
  text-align:center;
  padding: 8px;
}

.customers tr:nth-child(even){
    
    background-color: #f2f2f2;}

.customers tr:hover {
    
    background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #a2dce8;
  color: white;
}
#space
{
    margin-bottom :100px;
}
  </style>
</head>

<body>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
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
            <a class="nav-link" href="password.php">Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="expense.php">Expense Calculator</a>
          </li>
          <form type="post">
          <button type="submit" class="btn btn-success" name="logout">Logout</button>
          </form>
        </ul>
      </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Expense Calculator</h1>
	<h2 class="lead">Express your Expenses!</h2>
  </div>
</div>
    <!-- -----------------------------------------Buttons -->
    <div id="space">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <form method="post">
        <button type="submit" class="btn btn-dark btn-lg" id="dsb" name="dashboard">Dashboard</button>
      </form>
      <button type="button" class="btn btn-dark btn-lg" id="addexp">Add Expense</button>
      <div class="btn-group" role="group">
        <button id="expensereport" type="button"  class="btn btn-dark btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Expense Report
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item" href="#" id="daywise">Daywise Report</a>
          <a class="dropdown-item" href="#" id="monthwise">Monthwise Report</a>
          <a class="dropdown-item" href="#" id="yearwise">Yearwise Report</a>
        </div>
      </div>
    </div>
    </div>
    <!-- ------------------------------------------Dashboard -->

   
      <?php
      if (isset($_POST['dashboard'])) {
          
          

         $s = $_SESSION["id"];
        $mindate="select MIN(ExpenseDate)as mindate from tblexpense where loginid='$s'";
        $query1 = mysqli_query($conn,$mindate);
        $row = mysqli_fetch_array($query1, MYSQLI_ASSOC);
       $min = $row['mindate'];
        //echo $min;
        $maxdate="select MAX(ExpenseDate)as maxdate from tblexpense where loginid='$s'";
        $query2 = mysqli_query($conn,$maxdate);
        $row = mysqli_fetch_array($query2, MYSQLI_ASSOC);
        $max = $row['maxdate'];
        
        
        
        $earlier = new DateTime($min);
        $later = new DateTime($max);

        $diff = $later->diff($earlier)->format("%a");
        
        
        
        $total="select sum(ExpenseCost) as totalcost from tblexpense where loginid='$s'";
        $query3= mysqli_query($conn,$total);
        $row = mysqli_fetch_array($query3, MYSQLI_ASSOC);
        //echo $row['totalcost'];
        $total=$row['totalcost'];
        
        $davg=$total/$diff;
        //echo $davg;
        
        $dismonth="select count(DISTINCT(month(ExpenseDate))) as mons from tblexpense where loginid='$s'";
        $query4 = mysqli_query($conn, $dismonth);
        $row = mysqli_fetch_array($query4, MYSQLI_ASSOC);
        
        
        
        
        //echo $total;
        $mon=$row['mons'];
        //echo $mon;
        $mavg= $total/$mon;
        //echo $mavg;
        
        $disyear="select count(DISTINCT(year(ExpenseDate))) as year from tblexpense where loginid='$s'";
        $query5 = mysqli_query($conn, $disyear);
        $row = mysqli_fetch_array($query5, MYSQLI_ASSOC);
        $year=$row['year'];
        $yavg=$total/$year;
        



        if ($query3) {
      ?>
    <div id="hd">
    <div class="row text-center">
      <div class="col">
        <div class="counter">
          <i class="fa fa-code fa-2x"></i>
          <h2 class="timer count-title count-number" data-to=<?php echo $davg ?> data-speed="1500"></h2>
          <p class="count-text ">Daily Average</p>
        </div>
        </div>  
      <?php } ?>
      <?php
        if ($query4) {
      ?>
     
     
        <div class="col">
          <div class="counter">
            <i class="fa fa-code fa-2x"></i>
            <h2 class="timer count-title count-number" data-to=<?php echo $mavg ?> data-speed="1500"></h2>
            <p class="count-text ">Monthly Average</p>
          </div>
        </div>
        <?php } ?>
        <?php
        if ($query5) {
        ?>
        
     
          <div class="col">
            <div class="counter">
              <i class="fa fa-code fa-2x"></i>
              <h2 class="timer count-title count-number" data-to=<?php echo $yavg ?> data-speed="1500"></h2>
              <p class="count-text ">Yearly Average</p>
            </div>
        </div>
          <?php } ?>
          </div>
        <?php } ?>
          
        </div>

          <div class="col-md-12">
              
            <form role="form" method="post" action="" id='form1'>
                <h2 class="formhead">Add Expense</h2>
              <div class="form-group">
                <label for="sel1" class="labeltag">Select category:</label>
                <select class="form-control" id="sel1" name="categ">
                  <option>Food</option>
                  <option>Health</option>
                  <option>Transport</option>
                  <option>Household</option>
                </select>
              </div>
              <div class="form-group">
                <label class="labeltag">Date of Expense</label>
                <input class="form-control" type="date" value="" name="dateexpense"  required="true">
              </div>
              <div class="form-group">
                <label class="labeltag">Item</label>
                <input type="text" class="form-control" name="item" value="" placeholder="Item/Decription"required="true">
              </div>
              <div class="form-group">
                <label class="labeltag">Cost of Item</label>
                <input class="form-control" type="text" value="" placeholder="Cost" required="true" name="costitem">
              </div>
              <div class="form-group has-success">
                <button type="submit" class="btn btn-success  btnadd" name="submit">Add</button>
              </div>
          </div>
          </form>
          <form role="form" method="post" action="" name="bwdatesreport" id='form2'>
              <h2 class="formhead">Daily Report:</h2>
            <div class="form-group">
              <div class="form-group">
                <label for="sel1" class="labeltag">Select category:</label>
                <select class="form-control" id="sel1" name="categ2">
                  <option>Food</option>
                  <option>Health</option>
                  <option>Transport</option>
                  <option>Household</option>
                  <option>All</option>
                </select>
              </div>
              <label class="labeltag">From Date</label>
              <input class="form-control" type="date" id="fromdate" name="fromdate" required="true">
            </div>
            <div class="form-group">
              <label class="labeltag">To Date</label>
              <input class="form-control" type="date" id="todate" name="todate" required="true">
            </div>
            <div class="form-group has-success">
              <button type="submit" class="btn btn-success  btnadd" name="daysub" id="daysubmit">Submit</button>
            </div>
        </div>
        </form>
        <div class="col-md-12">
          <form role="form" method="post" action="" name="form3" id="form3">
              <h2 class="formhead">Monthly Report</h2>
            <div class="form-group">
              <div class="form-group">
                <label for="sel1" class="labeltag">Select category:</label>
                <select class="form-control" id="sel1" name="categ3">
                  <option>Food</option>
                  <option>Health</option>
                  <option>Transport</option>
                  <option>Household</option>
                  <option>All</option>
                </select>
              </div>
              <label class="labeltag">From Date</label>
              <input class="form-control" type="date" id="frommonth" name="frommonth" required="true">
            </div>
            <div class="form-group">
              <label class="labeltag">To Date</label>
              <input class="form-control" type="date" id="tomonth" name="tomonth" required="true">
            </div>
            <div class="form-group has-success">
              <button type="submit" class="btn btn-success  btnadd" name="monsubmit" id="monsubmit">Submit</button>
            </div>
        </div>
        </form>
      </div>
      <div class="col-md-12">
        <form role="form" method="post" action="" name="form4" id="form4">
            <h2 class="formhead">Annual Report</h2>
          <div class="form-group">
            <div class="form-group">
              <label for="sel1" class="labeltag">Select category:</label>
              <select class="form-control" id="sel1" name="categ4">
                <option>Food</option>
                <option>Health</option>
                <option>Transport</option>
                <option>Household</option>
                <option>All</option>
              </select>
            </div>
            <label class="labeltag">From Date</label>
            <input class="form-control" type="date" id="fromyear" name="fromyear" required="true">
          </div>
          <div class="form-group">
            <label class="labeltag">To Date</label>
            <input class="form-control" type="date" id="toyear" name="toyear" required="true">
          </div>
          <div class="form-group has-success">
            <button type="submit" class="btn btn-success  btnadd" name="yearsubmit" id="yearsubmit">Submit</button>
          </div>
      </div>
      </form>
    </div>

    <?php
    if (isset($_POST['yearsubmit'])) {
      $s = $_SESSION["id"];
      $exp_type = $_POST['categ4'];
      $fmonth = $_POST['fromyear'];
      $tomonth = $_POST['toyear'];

      if ($exp_type == 'All') {
        $query = mysqli_query($conn, "SELECT ExpenseDate ,ExpenseItem, ExpenseCost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s')");
      } else {
        $query = mysqli_query($conn, "SELECT ExpenseDate  ,ExpenseItem, ExpenseCost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s') && ExpenseType = '$exp_type' ");
      }
      if ($query) {
    ?>
        <table class="table table-sm customers" id="table5">
          <thead>
            <tr>
              <th>Date</th>
              <th>Item</th>
              <th>Amount</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['ExpenseDate']; ?></td>
                <td><?php echo $row['ExpenseItem']; ?></td>
                <td><?php echo $row['ExpenseCost']; ?></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>
      <?php } ?>
      <?php if ($exp_type == 'All') {
           $s = $_SESSION["id"];
        $query = mysqli_query($conn, "SELECT year(ExpenseDate) as rptyear, sum(ExpenseCost) as totalcost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s') group by rptyear asc");
      } else {
        $query = mysqli_query($conn, "SELECT year(ExpenseDate) as rptyear , sum(ExpenseCost) as totalcost FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s') && ExpenseType = '$exp_type' group by rptyear asc");
      }
      if ($query) {
      ?>
        <table class="table table-sm customers" id="table6">
          <thead>
            <tr>
              <th>Year</th>
              <th>Amount</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['rptyear']; ?></td>
                <td><?php echo $row['totalcost']; ?></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>
      <?php } ?>
    <?php } ?>
    <?php
    if (isset($_POST['monsubmit'])) {
       $s = $_SESSION["id"];
      $exp_type = $_POST['categ3'];
      $fmonth = $_POST['frommonth'];
      $tomonth = $_POST['tomonth'];

      if ($exp_type == 'All') {
        $query = mysqli_query($conn, "SELECT ExpenseDate ,ExpenseItem, ExpenseCost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s')");
      } else {
        $query = mysqli_query($conn, "SELECT ExpenseDate ,ExpenseItem, ExpenseCost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s') && ExpenseType = '$exp_type' ");
      }
      if ($query) {
    ?>
        <table class="table table-sm customers" id="table2">
          <thead>
            <tr>
              <th>Date</th>
              <th>Item</th>
              <th>Amount</th>
            </tr>
          </thead >
          <?php
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['ExpenseDate']; ?></td>
                <td><?php echo $row['ExpenseItem']; ?></td>
                <td><?php echo $row['ExpenseCost']; ?></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>
      <?php } ?>
      <?php if ($exp_type == 'All') {
           $s = $_SESSION["id"];
        $query = mysqli_query($conn, "SELECT month(ExpenseDate) as rptmonth, sum(ExpenseCost) as totalcost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s') group by rptmonth asc");
      } else {
        $query = mysqli_query($conn, "SELECT month(ExpenseDate) as rptmonth , sum(ExpenseCost) as totalcost FROM `tblexpense`  where (ExpenseDate BETWEEN '$fmonth' and '$tomonth') && (loginid='$s') && ExpenseType = '$exp_type' group by rptmonth asc");
      }
      if ($query) {
      ?>
        <table class="table table-sm customers" id="table3">
          <thead>
            <tr>
              <th>Month</th>
              <th>Amount</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['rptmonth']; ?></td>
                <td><?php echo $row['totalcost']; ?></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>
      <?php } ?>
    <?php } ?>
    <?php
    if (isset($_POST['daysub'])) {
       $s = $_SESSION["id"];
      $exp_type = $_POST['categ2'];
      $fdate = $_POST['fromdate'];
      $todate = $_POST['todate'];
      if ($exp_type == 'All') {
        $query = mysqli_query($conn, "SELECT ExpenseDate,ExpenseItem, ExpenseCost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fdate' and '$todate') && (loginid='$s')");
      } else {
        $query = mysqli_query($conn, "SELECT ExpenseDate,ExpenseItem, ExpenseCost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fdate' and '$todate') && (loginid='$s') && ExpenseType = '$exp_type'");
      }
      if ($query) {
    ?>
        <table class="table table-sm customers" id="table2">
          <thead>
            <tr>
              <th>Date</th>
              <th>Item</th>
              <th>Amount</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['ExpenseDate']; ?></td>
                <td><?php echo $row['ExpenseItem']; ?></td>
                <td><?php echo $row['ExpenseCost']; ?></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>
      <?php } ?>
      <?php if ($exp_type == 'All') {
           $s = $_SESSION["id"];
        $query = mysqli_query($conn, "SELECT day(ExpenseDate) as rptday, sum(ExpenseCost) as totalcost  FROM `tblexpense`  where (ExpenseDate BETWEEN '$fdate' and '$todate') && (loginid='$s') group by rptday asc");
      } else {
        $query = mysqli_query($conn, "SELECT day(ExpenseDate) as rptday , sum(ExpenseCost) as totalcost FROM `tblexpense`  where (ExpenseDate BETWEEN '$fdate' and '$todate') && (loginid='$s') && ExpenseType = '$exp_type' group by rptday asc");
      }
      if ($query) {
      ?>
        <table class="table table-sm customers" id="table1">
          <thead>
            <tr>
              <th>Day</th>
              <th>Amount</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

          ?>
            <tbody>
              <tr>
                <td><?php echo $row['rptday']; ?></td>
                <td><?php echo $row['totalcost']; ?></td>
              </tr>
            </tbody>
          <?php
          } ?>
        </table>
      <?php } ?>
    <?php } ?>
    <div class="col-md-12">
      <script>
        $("#addexp").click(function() {
            $("#hd").hide();
          $("#form1").show();
        });

        $("#expensereport").click(function() {
            $("#hd").hide();
          $("#form1").hide();
          $("#form2").hide();
          $("#table2").hide();
          $("#form3").hide();
          $("#table3").hide();
        });

        $("#daywise").click(function() {
          $("#form2").show();
        });
        $("#daysubmit").click(function() {
          $("#form2").hide();
        });
        $("#daysubmit").click(function() {
          $("#table2").show();
        });
        $("#monthwise").click(function() {
          $("#form3").show();
        });
        $("#yearwise").click(function() {
          $("#form4").show();
        });
      </script>

      <script>
        (function($) {
          $.fn.countTo = function(options) {
            options = options || {};

            return $(this).each(function() {
              // set options for current element
              var settings = $.extend({}, $.fn.countTo.defaults, {
                from: $(this).data('from'),
                to: $(this).data('to'),
                speed: $(this).data('speed'),
                refreshInterval: $(this).data('refresh-interval'),
                decimals: $(this).data('decimals')
              }, options);

              // how many times to update the value, and how much to increment the value on each update
              var loops = Math.ceil(settings.speed / settings.refreshInterval),
                increment = (settings.to - settings.from) / loops;

              // references & variables that will change with each update
              var self = this,
                $self = $(this),
                loopCount = 0,
                value = settings.from,
                data = $self.data('countTo') || {};

              $self.data('countTo', data);

              // if an existing interval can be found, clear it first
              if (data.interval) {
                clearInterval(data.interval);
              }
              data.interval = setInterval(updateTimer, settings.refreshInterval);

              // initialize the element with the starting value
              render(value);

              function updateTimer() {
                value += increment;
                loopCount++;

                render(value);

                if (typeof(settings.onUpdate) == 'function') {
                  settings.onUpdate.call(self, value);
                }

                if (loopCount >= loops) {
                  // remove the interval
                  $self.removeData('countTo');
                  clearInterval(data.interval);
                  value = settings.to;

                  if (typeof(settings.onComplete) == 'function') {
                    settings.onComplete.call(self, value);
                  }
                }
              }

              function render(value) {
                var formattedValue = settings.formatter.call(self, value, settings);
                $self.html(formattedValue);
              }
            });
          };

          $.fn.countTo.defaults = {
            from: 0, // the number the element should start at
            to: 0, // the number the element should end at
            speed: 1000, // how long it should take to count between the target numbers
            refreshInterval: 100, // how often the element should be updated
            decimals: 0, // the number of decimal places to show
            formatter: formatter, // handler for formatting the value before rendering
            onUpdate: null, // callback method for every time the element is updated
            onComplete: null // callback method for when the element finishes updating
          };

          function formatter(value, settings) {
            return value.toFixed(settings.decimals);
          }
        }(jQuery));

        jQuery(function($) {
          // custom formatting example
          $('.count-number').data('countToOptions', {
            formatter: function(value, options) {
              return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
            }
          });

          // start all the timers
          $('.timer').each(count);

          function count(options) {
            var $this = $(this);
            options = $.extend({}, options || {}, $this.data('countToOptions') || {});
            $this.countTo(options);
          }
        });
      </script>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>