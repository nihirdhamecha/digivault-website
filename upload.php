<?php

$conn=mysqli_connect("shareddb-t.hosting.stackcp.net","secretdiary-3133315008","nihir8199","secretdiary-3133315008");
session_start();
if (isset($_POST['submit'])) {
    
    $files=$_FILES['file'];
    $ttl = $_SESSION["search"];
    $s = $_SESSION["id"];
    
    $filename=$files['name'];
    $fileerror=$files['error'];
    $filetmp=$files['tmp_name'];
    
    $fileext=explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    
    $fileextstored= array('png','jpg','jpeg');
    
    if(in_array($filecheck,$fileextstored))
    {
         $ttl = $_SESSION["search"];
         $title = $_SESSION["title"];
         $s = $_SESSION["id"];
        $destinationfile = 'upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);
        
        $query = "INSERT INTO photos( `loginid`, `title`, `path`) VALUES ('$s','$title','$destinationfile')";
        $sql= mysqli_query($conn,$query);
        
        $displayquery = "select * from photos where loginid = '$s' and title='$ttl'";
        $sql2=mysqli_query($conn,$displayquery);
        
        
        
        while($result = mysqli_fetch_array($sql2))
        {
        ?>
        
        <img src ="<?php echo $result['path']; ?>" height ="335px" width ="600px">
        
        <?php
        }
        
        
    }
    
}
?>