<?php
if (isset($_POST['submit'])) {
    $con = mysqli_connect("localhost","root","","project2") or die("failed to connect");
    $video_title = $_POST['videoTitle'];
    $video_file = $_FILES['videoFile'];
    $video_des=$_POST['videoDescription'];
    $video_tag=$_POST['videoTags'];
    $video_categories=$_POST['videocategories'];
    $video_loc = $_FILES['videoFile']['tmp_name'];
    $video_name = $_FILES['videoFile']['name'];
    $img_des = "upload/" . $video_name;
    move_uploaded_file($video_loc, "upload/" . $video_name);
    $image_loc = $_FILES['videoImage']['tmp_name'];
    $image_name = $_FILES['videoImage']['name'];
    $imgs_des = "upload/" . $image_name;
    move_uploaded_file($image_loc, "upload/" . $image_name);
    mysqli_query($con, "INSERT INTO `videos`( `videoFile`, `videoTitle`, `videoDescription`,`tag`,`videoImage`,`categories`) VALUES ('$img_des','$video_title','$video_des','$video_tag','$imgs_des','$video_categories')" );
 header("location:index.php");
}
?>  
 