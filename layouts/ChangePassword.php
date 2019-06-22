<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<?php include'layouts/header.php';?>
<?php include'connection.php';?>
<?php
$id = $_GET['id'];
$rows = mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'");
$cleaner = mysqli_fetch_array($rows);

?>
<?php

if(isset($_POST['submit']))
{

    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
   $sql = "UPDATE `users` SET `first_name`='$first_name', `last_name`='$last_name', `phone`='$phone',`email`='$email', `password`='$password' WHERE `id`='$id'";
   $run = mysqli_query($conn,$sql);


   if($run && mysqli_affected_rows($conn) === 1)
   {
       echo 'success';
       header("Location: allClients.php");
   }
   else
   {
       die(mysqli_connect_error($conn));
   }
    
   

}
?>