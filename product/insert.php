<?php
if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost","root","","project2") or die("failed to connect");
    $video_title = $_POST['videoTitle'];
    $video_file = $_FILES['videoFile'];
    $video_des=$_POST['videoDescription'];
    $video_loc = $_FILES['videoFile']['tmp_name'];
    $video_name = $_FILES['videoFile']['name'];
    $img_des = "upload/" . $video_name;
    move_uploaded_file($video_loc, "upload/" . $video_name);
    mysqli_query($con, "INSERT INTO `videos`( `videoFile`, `videoTitle`, `videoDescription`) VALUES ('$img_des ','$video_title','$video_des')" );
 header("location:index.php");
}
?>  
 