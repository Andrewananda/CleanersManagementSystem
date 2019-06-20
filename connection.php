<?php 
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'cleaners';

$conn = mysqli_connect($server,$user,$password,$database);
if($conn){
    // echo 'Successful';
}
else{
    die(mysqli_connect_error('error in connection',$conn));
}


 ?>