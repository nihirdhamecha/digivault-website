<?php
$conn = new mysqli("shareddb-t.hosting.stackcp.net", "secretdiary-3133315008", "nihir8199", "secretdiary-3133315008");

if (isset($_POST['delImage'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $conn->query("DELETE FROM photos WHERE id='$id'");
    exit('success');
}

if (isset($_POST['getImages'])) {
    $start = $conn->real_escape_string($_POST['start']);
    $sql = $conn->query("SELECT id, path FROM photos ORDER BY id DESC LIMIT $start, 8");
    $response = array();
    while ($data = $sql->fetch_assoc())
        $response[] = array("path" => $data['path'], "id" => $data['id']);

    exit(json_encode(array("images" => $response)));
}

if (isset($_FILES['attachments'])) {
    $msg = "";
    $targetFile = time() . basename($_FILES['attachments']['name'][0]);

    if (file_exists($targetFile))
        $msg = array("status" => 0, "msg" => "File already exists!");
    else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], "uploads/" . $targetFile)) {
        $msg = array("status" => 1, "msg" => "File Has Been Uploaded", "path" => "uploads/" . $targetFile);

        $conn->query("INSERT INTO photos (path, uploadedOn) VALUES ('$targetFile', NOW())");
    }
    if(isset($_POST['logout']) != '')
{
    session_destroy();
    header('location:login.php');
}


    exit(json_encode($msg));
}

$sql = $conn->query("SELECT id FROM photos");
$numRows = $sql->num_rows;
?>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Digi-Vault</title>
    <style type="text/css">
        #dropZone {
            border: 3px dashed #0088cc;
            padding: 50px;
            width: 500px;
            margin-top: 20px;
            margin-left: 10px;
        }

        #files {
            border: 1px dotted #0088cc;
            padding: 20px;
            width: 200px;
            display: none;
        }

        #error {
            color: red;
        }

        
        .row {
            margin-top: 50px;
            
        }

        #uploadedFiles img {
            width: 100% !important;
        }

        .btn-success {
            margin-left: 600px;

            position: left;
        }

        
        #top {
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
        #top
        {
            height:200px;
        }
        #Attach {
            margin-left: 120px;
        }
        .navbar {
    margin-bottom: 0px;
    padding-bottom: 0px;
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
.jumbotron
	{
	    background-color:#a2dce8;
	}

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
      <form type="post">
      <button type="submit" class="btn btn-success">Logout</button>
      </form>
    </ul>
  </div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Photos</h1>
	<h2 class="lead">Store your memories!</h2>
  </div>
</div>
</div> 

  
  
  
  
  
  
  
 

	
	


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



    
    <div class="container">
        <div class="row">
            <div class="col-md-12" align="center">
                <div id="dropZone">
                    <h1>Drag & Drop Files...</h1>
                    <input type="file" id="fileupload" name="attachments[]" multiple>
                </div>
                <h1 id="error"></h1><br><br>
                <h1 id="progress"></h1><br><br>
                <div id="files"></div>
            </div>
        </div>
    </div>
    <div class="container" id="uploadedFiles">
        <div class="row">
            <!-- <div class="col-md-3 myImg"></div> -->
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="js/jquery.iframe-transport.js" type="text/javascript"></script>
    <script src="js/jquery.fileupload.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            getImages(0, <?php echo $numRows ?>);
        });

        function getImages(start, max) {
            if (start > max)
                return;

            $.ajax({
                url: 'photos.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    getImages: 1,
                    start: start
                },
                success: function(response) {
                    for (var i = 0; i < response.images.length; i++)
                        addImage("uploads/" + response.images[i].path, response.images[i].id);

                    getImages((start + 8), max);
                }
            });
        }

        function delImg(id) {
            if (id === 0)
                alert('You are not able to delete this image now!');
            else if (confirm('Are you sure that you want to delete this image?')) {
                $.ajax({
                    url: 'photos.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        delImage: 1,
                        id: id
                    },
                    success: function(response) {
                        $("#img_" + id).remove();
                    }
                });
            }
        }

        $(function() {
            var files = $("#files");

            $("#fileupload").fileupload({
                url: 'photos.php',
                dropZone: '#dropZone',
                dataType: 'json',
                autoUpload: false
            }).on('fileuploadadd', function(e, data) {
                var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                var fileName = data.originalFiles[0]['name'];
                var fileSize = data.originalFiles[0]['size'];

                if (!fileTypeAllowed.test(fileName))
                    $("#error").html('Only images are allowed!');
                else if (fileSize > 500000)
                    $("#error").html('Your file is too big! Max allowed size is: 500KB');
                else {
                    $("#error").html("");
                    data.submit();
                }
            }).on('fileuploaddone', function(e, data) {
                var status = data.jqXHR.responseJSON.status;
                var msg = data.jqXHR.responseJSON.msg;

                if (status == 1) {
                    var path = data.jqXHR.responseJSON.path;
                    addImage(path, 0);
                } else
                    $("#error").html(msg);
            }).on('fileuploadprogressall', function(e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $("#progress").html("Completed: " + progress + "%");
            });
        });

        function addImage(path, id) {
            if ($("#uploadedFiles").find('.row:last').find('.myImg').length === 4)
                $("#uploadedFiles").append('<div class="row"></div>');


            $("#uploadedFiles").find('.row:last').append('<div id="img_' + id + '" class="col-md-3 myImg" onclick="delImg(' + id + ')"><img src="' + path + '" /></div>');
        }
    </script>
</body>

</html>