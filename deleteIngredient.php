<?php
//including the database connection file
include("connect.php");
session_start();
$user= $_SESSION['user_name'];
// $getemail="SELECT EmailID from `user-profile` WHERE Username='$user'";
// $result=$conn->query($getemail);
// while($row = mysqli_fetch_assoc($result)){
//     $email=$row['EmailID'];
// }

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$delete="DELETE from `user-pantry`WHERE id=$id";
$res=$conn->query($delete);		
header("Location:UserProfile.php");
?>

