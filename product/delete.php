<?php
 $id = $_GET['id'];
 $con = mysqli_connect("localhost", "root", "", "project");
 mysqli_query($con,"DELETE FROM `tblproduct` WHERE id = $id");
 header("location:index.php");
?>
