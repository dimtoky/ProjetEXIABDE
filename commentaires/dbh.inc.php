<?php

$conn = mysqli_connect('localhost','root','','bdeexiabdd');
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
