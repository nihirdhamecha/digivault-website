<?php
session_start();

$link = mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");
if (mysqli_connect_error()) {
  die("Database connection error");
}
if (isset($_POST['logout']) != '') {
  session_destroy();
  header('location:login.php');
}
if (isset($_POST['submit2']) != '') {
  $s = $_SESSION["id"];

  $ttl = $_POST['title'];
  $_SESSION['title']=$ttl;
  $mydate = getdate(date("U"));
  $date = "$mydate[weekday],";
  $date .= "$mydate[month],";
  $date .= "$mydate[mday],";
  $date .= "$mydate[year]";
  $text = $_POST['message'];




  $query = "INSERT INTO notes(loginid,title,date,diary,dateadded) VALUES ('$s','$ttl','$date','$text',CURRENT_DATE)";
  //$query1 = mysqli_query($link,"insert into useract(loginid,Date_time,activity,dateadded) values('$_SESSION['id']',CURRENT_TIMESTAMP,'You recently added a note:',CURRENT_DATE)");
  mysqli_query($link, $query);
}

if (isset($_POST['search'])) {
  $valueToSearch = $_POST['valueToSearch'];
  // search in all table columns
  // using concat mysql function
$s = $_SESSION["id"];
  $query = "SELECT * FROM `notes` WHERE title='$valueToSearch' and loginid='$s'";
  $query2 = "select length(diary) - length(REPLACE(diary,' ','')) + 1  as counts from notes where loginid='$s' && title='$valueToSearch'";
  $_SESSION["search"] = $valueToSearch;
  $result2 = mysqli_query($link, $query2);
  $result = mysqli_query($link, $query);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
    echo '<script>alert("Search Not Found")</script>';
  } else {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
  }
}
if (isset($_POST['delete'])) {
  $ttl = $_SESSION["search"];
  $s = $_SESSION["id"];
  $query = "DELETE FROM notes WHERE title='$ttl' and loginid='$s' ";
  $result = mysqli_query($link, $query);
  $count = mysqli_num_rows($result);

  if ($count == 0) {
    echo '<script>alert("Deleted")</script>';
  } else {
    echo '<script>alert("Not deleted")</script>';
  }
}
if (isset($_POST['update']) != '') {
  $ttl = $_SESSION["search"];

  $text = $_POST['message'];
$s = $_SESSION["id"];
  $query = "UPDATE notes SET diary = '$text' WHERE title = '$ttl' and loginid='$s'";

  $result = mysqli_query($link, $query);
  $count = mysqli_num_rows($result);
  if ($count == 0) {
    echo '<script>alert("Update Successful")</script>';
  } else {
    echo '<script>alert("Not Updated. Please Try Again")</script>';
  }
}

if (isset($_POST['submit'])) {
  $filename = $_FILES['file']['name'];
  $filetype = $_FILES['file']['type'];
  if ($filetype == 'image/jpeg' or $filetype == 'image/png' or $filetype == 'image/gif') {
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $filename);
    $filepath = "uploads/" . $filename;
    $s = $_SESSION["id"];
    $sql = "insert into photos(loginid,path,uploadedOn) values('$s','$filepath',current_timestamp)";
    mysqli_query($link, $sql);
  }
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
    .btn-success {
      margin-left: 300px;

      position: left;
    }

    body {
      background-color: #f4f4f4;
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

    #Attach {
      margin-left: 120px;
    }

    #add {

      margin-left: 160px;

    }

    .search-container {
      float: right;
      margin-right: 150px;
      margin-top: 30px;
    }

    #formsearch {
      width: 250px;
      height: 40px;
      border-radius: 10px;
      padding: 10px;
    }

    .btn-secondary {
      border-radius: 10px;
      height: 40px;
    }

    #area {
      border-radius: 20px;
      margin-left: 120px;
      margin-top: 40px;
      padding: 20px;
    }

    #lg {
      margin-left: 700px;
    }

    #colFormLabel {
      width: 350px;
      margin-left: 150px;
    }

    #ttl {
      margin-left: 150px;
    }

    .display-4 {
      color: black;
      text-align: center;
    }

    .lead {
      color: black;
      text-align: center;
    }

    .jumbotron {
      background-color: #a2dce8;
    }
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
            <a class="nav-link" href="password.php">Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="expense.php">Expense Calculator</a>
          </li>
          <form method="post">
            <button type="submit" name="logout" id="lg" class="btn btn-success">Logout</button>
          </form>
        </ul>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Notes</h1>
        <h2 class="lead">Just write it up! </h2>
      </div>
    </div>


    <!-- Button trigger modal -->


    <form class="search-container" method="POST">
      <input type="text" id="formsearch" placeholder="Search.." name="valueToSearch">
      <button type="submit" name="search" class="btn-secondary">Submit</button>
    </form>


    <!-- Modal -->


    <form method="POST">

      <label id="ttl">Add your Title here:</label>
      <input type="text" class="form-control" id="colFormLabel" name="title" placeholder="Title">


      <textarea name="message" id="area" rows="30" cols="120"><?php echo ("Title:" . $row["title"]);
                                                              echo nl2br("\n");
                                                              echo ("Date: " . $row["date"]);
                                                              echo nl2br("\n");
                                                              echo ($row["diary"]); ?> </textarea>

      <div class="custom-file">
        <?php
        echo "Word Count:" . $row2['counts'];
        ?>
      </div>

      <button type="submit" name="submit2" class="btn btn-success btn-lg">Save Note</button>
      <button type="submit" name="update" class="btn btn-info btn-lg">Update Note</button>
      <button type="submit" name="delete" class="btn btn-danger btn-lg">Delete Note</button>


    </form>

     <form  method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload Image" name="upload">
    
    <?php
    
    if (isset($_POST['upload'])) {
        
    $ttl = $_SESSION["search"];
    $s = $_SESSION["id"];
    
    $title = $_SESSION["title"];
    $files=$_FILES['file'];
    $filename=$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    
    $fileext=explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    
    $fileextstored= array('png','jpg','jpeg');
    
    if(in_array($filecheck,$fileextstored))
    {
         
        $destinationfile = 'upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);
        
        $query = "INSERT INTO photos( `loginid`, `title`, `path`) VALUES ('$s','$title','$destinationfile')";
        $sql2= mysqli_query($link,$query);
        
        
        
      
        
        
        
        
        
        if (isset($_POST['search']))
        {
            while($result = mysqli_fetch_array($sql2))
        {
             $s = $_SESSION["id"];
             $ttl = $_SESSION["search"];
              $displayquery = "select * from photos where loginid = '$s' and title='$ttl'";
              $sql2=mysqli_query($link,$displayquery);
            
            ?>
        <img src ="<?php echo $result['image']; ?>" height ="335px" width ="600px">
        
        <?php
        }
        
        }
    }
    
}
?>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">

    </script>


  </body>

</html>