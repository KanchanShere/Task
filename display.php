<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

</head>
<body>
<?php
if(isset($_POST['submit']))
{ 
     
      $name=$_POST['name'];
      $Branch=$_POST['Branch'];
      $gender=$_POST['gender'];
      $mobile=$_POST['mobile'];
      
}
?>
<?php

if(isset($_POST['submit']))
{
$stmt=$conn->prepare("insert into student(id,name,Branch,mobile,gender) values(?,?,?,?,?)");
$stmt->bind_param("issss", $id,$name,$Branch,$mobile,$gender);
$stmt->execute();
}
?>
<div class="container">
 
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
        <th>id</th>
        <th>name</th>
    <th>Branch</th>
    <th>mobile</th>
    <th>gender</th>
    <th>operation</th>
        </tr>
      </thead>
      <?php
if(isset($_POST['submit']))
{
$insertquery="select * from student";
 $result=$conn->query($insertquery);
if($result!==false && $result->num_rows > 0)
{
    while($row=$result->fetch_array())
    {
      ?>
    
    <tbody>
      <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['Branch']; ?></td>
          <td><?php echo $row['mobile']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <td>
         <button class="btn btn-primary"><a href="update.php?updateid=<?php echo $row['id']; ?>" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deletedid=<?php echo $row['id']; ?>" class="text-light">Delete</a></button>
         </td>
          
        </tr>
    </tbody>
      <?php
   }
}
}
?>

</table>
</div>
</div>
</body>
</html>