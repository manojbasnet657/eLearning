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
<style>
    .cardVideoPlayBtn {
        position: absolute;
        background-color: rgba(64, 57, 61, 0);
        top: 0rem;
        bottom: 10rem;
        z-index: 10;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 0.5rem;
    }

    .svgIcon {
        color: rgba(46, 39, 42, 11);

    }

    .videoPop {
        /* position: absolute; */
        /* z-index: 20; */
        width: 30rem;
        padding: 2rem;
        height: 28rem;
        display: flex;
        flex-direction: column;
        background-color: white;
        border: 0.2rem solid gray;
        border-radius: 25px;
    }

    .hide {
        display: none;
    }

    .videoPopBox {
        position: fixed;
        z-index: 30;
        top: 10rem;
        left: 25%;
        right: 25%;


    }

    .crossIcon {
        float: right;
    }
</style>

<body>
    <div class="container-fluid bg-dark">
        <div class="col-md-12">
            <div class="row bg-dark">

                <?php

                // Retrieve the video information from the database

                $sql = "SELECT * FROM `videos` ORDER BY vid DESC LIMIT 8";
                $result = $con->query($sql);

                // Check if there are any videos in the database
                if ($result->num_rows > 0) {
                    // Loop through each video and display them
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["videoTitle"];
                        $video = $row["videoFile"];
                        $image = $row["videoImage"];
                        $description = $row["videoDescription"];
                        $tag = $row["tag"];
                        $vid = $row["vid"];

                ?>
                        <div class="videoPopBox hide" id="videoData<?= $vid ?>">

                        </div>

                        <div class='col-md-6 col-lg-3 m-auto mb-3 border-dark'>
                            <div class='card m-auto border border-dark border-radius' style='width: 18rem;'>
                                <div class='card-body text-center  bg-dark'>
                                    <img src="product/<?= $image ?>" alt="" controls="false" style="height: 200px; border:0.1rem solid white; border-radius:10px;" class='card-img-top' controls>

                                    <div style="height: 200px;width:100%;" class="cardVideoPlayBtn ">
                                        <svg id="video<?= $vid ?>" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="svgIcon" height="2rem" viewBox="0 0 384 512">
                                            <path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z" stroke="white" stroke-width="3rem" />
                                        </svg>

                                    </div>
                                    <div class='card-body text-center'>
                                        <input type='hidden' value='' name='vid'>
                                        <p class='card-title  text-capitalize  fs-6 fw-bold text-light' name='videoTitle'><?= $name ?></p>
                                    </div>
                                    <p class='text-light   '><?= $description ?></p>
                                </div>
                            </div>

                            <script>
                                const videoId<?= $vid ?> = document.getElementById('video<?= $vid ?>');
                                const videoData<?= $vid ?> = document.getElementById('videoData<?= $vid ?>');
                                videoId<?= $vid ?>.addEventListener('click', (e) => {
                                    const videoPopBox = document.querySelectorAll('.videoPopBox');
                                    videoPopBox.forEach((ele) => {
                                        ele.classList.add('hide');
                                    });
                                    videoData<?= $vid ?>.classList.remove('hide');
                                    var element = `
                                    <div class="videoPop " >
                                                    <span><?php echo $_SESSION['user'];?>
                                                        <svg onclick="hideVideoBox('<?= $vid ?>');" class="crossIcon border border-light " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                                    </span>
                                                    <div>
                                                        <video width="100%" style="height: 200px; border:0.1rem solid black; border-radius:15px;" class='card-img-top' controls>
                                                            <source src="product/<?= $video ?>" type="video/mp4">   
                                                        </video>
                                                    </div>
                                                    <div>
                                                        <title>js</title>
                                                    </div>
                                                    <div>
                                                        <p><?= $description ?></p>
                                                    </div>
                                                    <div>
                                                   
                                                    </div>
                                                    <div>
                                                    <p><a  class="text-danger text-decoration-none pe-2"href="algorithm.php?vid=<?= $vid ?>">click here for full screen</a></p>
                                                    </div>
                                                </div>`;
                                    videoData<?= $vid ?>.innerHTML = element;

                                    // alert("hello")
                                })
                                var hideVideoBox = (eleId) => {
                                    var dataBoxIdNew = document.getElementById("videoData" + eleId);
                                    dataBoxIdNew.classList.add('hide');
                                }
                            </script>
                        </div>
                        <!-- hhhhh -->



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