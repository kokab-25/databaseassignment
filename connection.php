<?php

$conn = mysqli_connect('localhost', 'root', '', 'users');

if(!$conn) {
    var_dump("Error Code : " . mysqli_connect_errno() . "<br> Error : " . mysqli_connect_error());
}

