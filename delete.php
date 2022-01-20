<?php
include("conn.php");
if(isset($_GET['deletedid']))
{
 $id=$_GET['deletedid'];
$insertquery="DELETE FROM student WHERE id=$id";
if($conn->query($insertquery)===True)
{
    
    header('location:display.php');
}
else{
    echo $conn->error;
}
}

?>