<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
                                        // including file //
include('connection.php');
 ?>
 <style>
     body{
         background-image:url('images/black.jpg');
         background-repeat:no-repeat;
         background-size:cover;
     }
     .img{
         height:70vh;
         position:absolute;
         right:0px;
         top:180px;
     }
     form{
         position:absolute;
         right:590px;
         top:150px;
     }
     input{
         padding:9px;
         border-radius:20px;
         border:2px solid grey;
         margin-bottom:20px;
     }
     .submit{
color:white;
background-color:green;
width:190px;
border:2px solid green;
     }
     .submit:hover{
        background-color:red;
        border:2px solid red;
     }
     </style>
</head>
<body>
     <H1 style="text-align:center; color:green; text-size:bold;"> Add Your Details</H1><BR>
    <main>
            <img class="img" src="images/man.jpg">
       
<?php 
                                                // validation//

if (isset($_POST['submit'])) {

  if(empty($_POST['name'])) {
      echo " * Name Field Required" . "<br>";
  }
  if(empty($_POST['email'])) {
      echo " * Email is required" . "<br>";
  }
  else {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $query = "insert into info (name,email) values ('$name','$email')";
    $insert = mysqli_query($conn,$query);
    if($insert == 1){
        
        header("Location: process.php");
    }
  }  
} ?>
                                                <!--- form ---->
<form method="POST">
  <input type="text" name="name" placeholder="Your Name"><br>
  <input type="email" name="email" placeholder="Your Email"><br>
  <input class="submit" type="submit" name="submit">
</form>
</main>
</body>
</html>
