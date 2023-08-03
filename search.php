<?php include "header.php" ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<div class="container-fluid bg-dark">
    <div class="col-md-12">
        <div class="row bg-dark">
    
            <?php
            if (isset($_GET["searchText"])) {
                // echo"Hello world";
                $searchText =  $_GET["searchText"];
                // $sql = "SELECT * FROM `videos` WHERE `videoTitle` LIKE '$searchText%'";
                $sql = "SELECT * FROM project2.videos where  tag like '$searchText%' OR videoTitle like '%$searchText' OR videoTitle like '$searchText%' or videoTitle like '%$searchText%';";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // Loop through each video and display them
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["videoTitle"];
                        $video = $row["videoFile"];
                        $description = $row["videoDescription"];
            ?>
                        <!-- start -->

                        <div class='col-md-6 col-lg-3 m-auto mb-3 border-dark'>
                            <div class='card m-auto border border-dark' style='width: 18rem;'>
                                <div class='card-body text-center  bg-dark border-radius'>
                                    <video width="100%" style="height: 100%;" class='card-img-top' controls>
                                        <source src="product/<?=$video?>" type="video/mp4">
                                    </video>
                                    <div class='card-body text-center'>
                                        <input type='hidden' value='' name='vid'>
                                        <p class='card-title  text-capitalize  fs-6 fw-bold text-light' name='videoTitle'><?=$name?></p>
                                    </div>
                                    <p class='text-light'><?=$description?></p>
                                </div>
                            </div>

                        </div>

                        <!-- end -->
            <?php
                    }
                }
            }
            ?>
        </div>

    </div>
</div>