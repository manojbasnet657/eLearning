<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<?php
    $con = mysqli_connect("localhost", "root", "", "project2");
    $record = mysqli_query($con, "SELECT * FROM `userlogin`  ");
    $row_count = mysqli_num_rows($record);
    // $record2 = mysqli_query($con, "SELECT * FROM `sale`  ");
    // $row_count2 = mysqli_num_rows($record2);
    
    ?>

<?php
session_start();
if(!$_SESSION['admin']){
 header("location:login.php")  ; 


}
?>
<body>
<nav class="navbar navbar-light bg-dark">
    <div class="container-fluid text-white ">
        <a href="" class="navbar-brand text-white"><h1>Admin</h1></a>
        <span>
            <i class="fas fa-user-shield"></i>
            Hello,<?php echo $_SESSION['admin']?>  |
            <i class="fas fa-sign-out-alt"></i>
         
            <a href="logout.php" class="text-decoration-none text-white">Logout</a>|
            <!-- <a href="sales.php" class="text-decoration-none text-white">ORDER DETAILS(<?php echo $row_count2 ?>)</a> | -->
            <a href="../fitness.php" class="text-decoration-none text-white">Userpanal</a>

        </span>
    </div>
</nav>
<div class="">
    <h2 class="text-center">Open</h2>
</div>
<div class=" col-md-6 bg-danger text-center m-auto"> 
    <a href="index.php" class="text-white text-decoration-none fs-5 fw-bold px-5">Add product</a>
    <a href="user-no.php" class="text-white text-decoration-none fs-5 fw-bold px-5">User(<?php echo $row_count ?>)</a>

</div>
</body>
</html>