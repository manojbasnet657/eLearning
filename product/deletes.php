<?php
 $id = $_GET['id'];
 $con = mysqli_connect("localhost", "root", "", "project");
 mysqli_query($con,"DELETE FROM `userlogin` WHERE  id = $id");
 header("location:user-no.php");
?>
