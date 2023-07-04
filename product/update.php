<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <?php
 include 'admin.php';
 ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $con = mysqli_connect("localhost", "root", "", "project2");
    $result = mysqli_query($con, "SELECT * FROM `videos` WHERE vid = $id ");
    $data = mysqli_fetch_array($result);
}
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto border border-primary mt-4">
                <form action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <p class="text-center fw-bold fs-3 text-warning ">Video Update:</p>
                        <div class="mb-3">
                            <label for="" class="form-label">Video Name:</label>
                            <input type="text" value="<?php echo $data['videoTitle'] ?>" class="form-control" name="videoTitle" id="" placeholder="Enter product name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Video File:</label>
                            <input type="file" class="form-control" name="videoFile" id="">
                            <img src="<?php echo $data['videoFile'] ?>" alt="" style="height:100px;">
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">video Description:</label>
                        <input type="text" class="form-control" name="videoDescription" id="" placeholder="Enter product price">
                    </div>
                        <!-- <div class="mb-3">
                            <label for="" class="form-label">Select Page Category:</label>
                            <select class="form-select bg-light " name="pages">
                                <option value="thumb">Thumb</option>
                                <option value="gloves">Gloves</option>
                                <option value="back">Back</option>
                                <option value="band">Band</option>
                                <option value="knee">Knee</option>
                                <option value="shoulder">Shoulder</option>

                            </select>
                        </div> -->
                        <input type="hidden" name="uid" value="<?php echo $data['vid'] ?>">
                        <button class="bg-warning fs-4 fw-bold my-3 form-control text-white" name="update">UPDATE</button>

                </form>

            </div>
        </div>

    </div>
    <?php
    if (isset($_POST['update'])) {
        $uid = $_POST['uid'];
        $video_title = $_POST['videoTitle'];
        $video_file = $_FILES['videoFile'];
        $video_loc = $_FILES['videoFile']['tmp_name'];
        $video_name = $_FILES['videoFile']['name'];
        $img_des = "upload/" . $image_name;
        move_uploaded_file($video_loc, "upload/" . $video_name);
        $con = mysqli_connect("localhost", "root", "", "project2");
        mysqli_query($con, "UPDATE `videos` 
            SET `videoFile`='$img_des'`videoTitle`='$video_title', WHERE id = $uid ");
        header("location:index.php");
    }

    ?>

</body>

</html>