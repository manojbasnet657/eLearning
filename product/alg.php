<!-- <?php include "header.php" ?> -->
<?php
$id = $_GET['vid'];
$sql = "SELECT * FROM `videos` WHERE vid = $id";
$result = $con->query($sql);

// Check if there is a video with the specified ID
if ($result->num_rows > 0) {
    // Fetch the details of the currently viewed video
    $row = $result->fetch_assoc();
    $name = $row["videoTitle"];
    $videoF = $row["videoFile"];
    $description = $row["videoDescription"];
    $tag = $row["tag"];
    $vid = $row["vid"];
} else {
    // Handle the case where no video with the specified ID was found
    echo "Video not found.";
}
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./tail.js"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title></title>
</head>
<body>
<div class="flex">
    <main class="flex-grow p-4">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div>
                <video width="100%" style="height: 100%; border:0.1rem solid black;" class='card-img-top' controls>
                    <source src="product/<?= $videoF ?>" type="video/mp4">
                </video>
            </div>
        </div>
    </main>

    <aside class="w-1/4 p-4">
        <h2 class="text-xl font-semibold mb-4">Recommended Videos</h2>
        <ul class="space-y-4">
            <?php
            // Fetch all videos from the database, excluding the currently viewed video
            $sql = "SELECT vid, videoFile, videoTitle, videoDescription, tag FROM videos WHERE tag = '$tag' AND vid != $vid";
            $result = $con->query($sql);

            // Check if there are any videos in the database
            if ($result->num_rows > 0) {
                // Get the user's preferred video tag (for example, from user preferences)
                $userPreferredTag = $tag;

                // Array to store video recommendations based on tag similarity
                $tagRecommendations = array();

                while ($row = $result->fetch_assoc()) {
                    $videoId = $row["vid"];
                    $videoTitle = $row["videoTitle"];
                    $videoDescription = $row["videoDescription"];
                    $videoTag = $row["tag"];
                    $videoFile = $row["videoFile"];

                    // Calculate Jaccard index for tag similarity
                    $tagIntersection = array_intersect(explode(",", $userPreferredTag), explode(",", $videoTag));
                    $tagUnion = array_unique(array_merge(explode(",", $userPreferredTag), explode(",", $videoTag)));
                    $tagSimilarity = count($tagIntersection) / count($tagUnion);

                    // Store the video and its similarity score in the tagRecommendations array
                    $tagRecommendations[$videoId] = $tagSimilarity;
                }

                // Sort the recommendations in descending order of similarity
                arsort($tagRecommendations);

                // Display the recommended videos based on tag similarity
                foreach ($tagRecommendations as $videoId => $similarity) {
                    $recommendedVideo = getVideoDataById($con, $videoId);
                    ?>
                    <li class="border-b pb-4">
                        <a href="algorithm.php?vid=<?= $recommendedVideo["vid"] ?>" class="flex space-x-4">
                            <div class="flex-none w-1/4">
                                <video src="product/<?= $recommendedVideo["videoFile"] ?>" class="w-full"
                                       controls></video>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-lg font-semibold"><?= $recommendedVideo["videoTitle"] ?></h3>
                                <p class="text-gray-600"><?= $recommendedVideo["videoDescription"] ?></p>
                            </div>
                        </a>
                    </li>
                    <?php
                }
            } else {
                echo "No recommended videos found.";
            }

            // Close the database connection
            $con->close();

            // Function to get video data by video ID
            function getVideoDataById($connection, $videoId)
            {
                $sql = "SELECT * FROM videos WHERE vid = $videoId";
                $result = $connection->query($sql);

                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                } else {
                    return null;
                }
            }
            ?>
        </ul>
    </aside>
</div>
</body>
</html>
