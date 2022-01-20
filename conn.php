<?php
$conn=new mysqli("localhost","root","","student");
if($conn->connect_error)
{
    die("failed:".$conn->connect_error);
}
else
{
    echo"";
}
?>