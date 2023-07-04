<?php include "header.php" ?>
<div class="container">
    <div class="col-md-12">
        <div class="row">

            <?php
            if (isset($_GET["searchText"])) {
                // echo"Hello world";
                $searchText =  $_GET["searchText"];
                $sql = "SELECT * FROM `videos` WHERE `videoTitle` LIKE '$searchText%'";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    // Loop through each video and display them
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["videoTitle"];
                        $video = $row["videoFile"];
                        $description = $row["videoDescription"];
            ?>
                        <!-- start -->

                        <div class='col-md-6 col-lg-4 m-auto mb-3 border'>
                            <div class='card m-auto border border-white' style='width: 18rem;'>
                                <div class='card-body text-center'>
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

                        <!-- end -->
            <?php
                    }
                }
            }
            ?>
        </div>

    </div>
</div>