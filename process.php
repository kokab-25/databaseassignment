<h1
style="text-align:center; background-color:red; color:white; padding:40px;"

><?php echo "Welcome To Database"; ?></h1>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    th,td {
      border: 1px solid grey;
      padding:30px;
    width:100px;
      text-align:center;
    }
    th{
        background-color:green;
        color:white;
    }
    table{
        margin:auto;
        margin-top:70px;
    }
    body > form > input.search{
        position:absolute;
        left:690px;
        top:170px;
    }
    body > form > input[type=submit]:nth-child(2){
      position:absolute;
        left:840px;
        top:170px;
    }
  </style>
</head>
<body>
<form method="POST">
  <input class="search" type="text" name="search" placeholder="Search data">
  <input type="submit" name="submit" value="search">
</form> <?php

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM `info` WHERE CONCAT(`name`) || email LIKE '%$search%'";
    $search_result = filterTable($query);  
}
else {
    $query = "SELECT * FROM `info`";
    $search_result = filterTable($query);
}
function filterTable($query) {
    $conn = mysqli_connect("localhost", "root", "", "users");
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
} ?>
<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
  </tr> <?php 
while($row = mysqli_fetch_array($search_result)) {?>
  <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['email'];?></td>
  </tr> <?php
} ?>
</table>
</body>
</html>