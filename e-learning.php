<!DOCTYPE html>
<html>

<head>
    <?php
    include "header.php"; ?>
    <title>Video Display</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="col-md-12">
            <div class="row bg-dark">

                <?php

                // Retrieve the video information from the database

                $sql = "SELECT * FROM `videos` ORDER BY vid DESC LIMIT 10";
                $result = $con->query($sql);

                // Check if there are any videos in the database
                if ($result->num_rows > 0) {
                    // Loop through each video and display them
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["videoTitle"];
                        $video = $row["videoFile"];
                        $description = $row["videoDescription"];
                ?>
                        <div class='col-md-6 col-lg-3 m-auto mb-3 border-dark'>
                            <div class='card m-auto border border-dark' style='width: 18rem;'>
                                <div class='card-body text-center bg-dark'>
                                    <video width="100%" style="height: 200px;" class='card-img-top' controls>
                                        <source src="product/<?=$video?>" type="video/mp4">
                                       
                                    </video>
                                    <div class='card-body text-center'>
                                        <input type='hidden' value='' name='p_id'>
                                        <h5 class='card-title text-danger fs-5 fw-bold' name='p_name'><?=$name?></h5>
                                    </div>
                                    <p><?=$description?></p>
                                </div>
                            </div>
                        </div>
                <?php }
                } else {
                    echo "No videos found.";
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
// Close the database connection
$con->close();
?>