<!DOCTYPE html>
<html>
<head>
    <title>Video Display</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Uploaded Videos</h2>

        <?php
        
        // Retrieve the video information from the database
        include "header.php";
        $sql = "SELECT * FROM `tblproduct`";
        $result = $con->query($sql);

        // Check if there are any videos in the database
        if ($result->num_rows > 0) {
            // Loop through each video and display them
            while ($row = $result->fetch_assoc()) {
                $filename = $row["pname"];
                $filepath = $row["pimage"];
                ?>
               <?php  ?>
                <div class="embed-responsive embed-responsive-16by9">
                <video  height="85%" width="100%" controls>
        <source src="http://localhost:80/eLearning/product/<?php echo $row['pimage']?>" type="video/mp4">
        </video>
                        <p><?php $filename ?></p>
                    </div>
            <?php } 
        } else {
            echo "No videos found.";
        }
        ?>
        

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
