
    <?php
    $id = $_GET['id'];
    $con = mysqli_connect("localhost", "root", "", "project");
    mysqli_query($con,"DELETE FROM `sale` WHERE id = $id ");
    header("location:sales.php");

   
   