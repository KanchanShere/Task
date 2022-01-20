<?php
include("conn.php");
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
    <form method="post"action="display.php">
    <div class="form-group">
    <label for="name">Name</label>
     <input type="text"class="form-control" name="name"placeholder="enter your name">
</div>
       <div class="form-group">
    <label for="name">Mobile Number</label>
<input type="text"class="form-control"name="mobile"placeholder="enter your mobile number">
</div>
Branch<select name="Branch"><br>
            <option value="computer">computer science</option>
            <option value="mechanical">mechanical</option>
            <option value="electrical">electrical</option>
            <option value="electronics">electronics</option>
</select><br><br>
Gender
<input type="radio"name="gender" <?php if(isset($gender) && $gender=="female") echo "checked";?>value="female">Female
<input type="radio"name="gender" <?php if(isset($gender) && $gender=="male") echo "checked";?>value="male">male
<input type="submit"name="update"class="btn btn-primary"value="update">
</form>
</div>
</body>
</html>
<?php
if(isset($_POST['update']))
{ 
    if(isset($_GET['updatedid']))
    {
      $id=$_GET['updateid'];
      $name=$_POST['name'];
      $Branch=$_POST['Branch'];
      $mobile=$_POST['mobile'];
      $gender=$_POST['gender'];
    $sql="UPDATE student SET name='$name', Branch='$Branch', mobile='$mobile', gender='$gender' where id='$id'";
    if($conn->query($sql)=== true)
    {
      header('location:display.php');
    }
else{
    echo $conn->error;
}
    }
}

?>
   
