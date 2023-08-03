<?php include"header.php"?>
<?php
$id=$_GET['vid'];
$sql = "SELECT * FROM `videos`WHERE vid=$id";
                $result = $con->query($sql);

                // Check if there are any videos in the database
                if ($result->num_rows > 0) {
                    // Loop through each video and display them
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["videoTitle"];
                        $videoF = $row["videoFile"];
                        $description = $row["videoDescription"];
                        $tag = $row["tag"];
                        $vid = $row["vid"];
                     }
                  }
                ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title></title>
</head>
<body>



<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
  <span class="sr-only">Open sidebar</span>
  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
     <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
  </svg>
</button>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
  <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
     <ul class="space-y-2 font-medium  p-2">
        <li>
           <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                 <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                 <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
              </svg>
              <span class="ml-3">Home </span>
           </a>
        </li>
        <!-- <li  class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <div >
            <video src="./product/upload/javascript & operation.mp4"></video>
          </div>
        </li> -->
        
        <?php
// Connect to the database


// Fetch all videos from the database
$sql = "SELECT vid, videoFile, videoTitle, videoDescription, tag FROM videos where tag= '$tag' ";
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
        <!-- echo "<p>Video ID: " . $recommendedVideo["vid"] . "</p>";
        echo "<p>Video Title: " . $recommendedVideo["videoTitle"] . "</p>";
        echo "<p>Video File: " . $recommendedVideo["videoFile"] . "</p>";
        echo "<p>Video Description: " . $recommendedVideo["videoDescription"] . "</p>";
        echo "<p>Tag: " . $recommendedVideo["tag"] . "</p>";
        echo "<p>Similarity: " . $similarity . "</p>";
        echo "<hr>"; -->
        <li  class=" flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <a class="border-solid " href="search2.php?vid=<?=$recommendedVideo["vid"]?>">
            <div class="" >
               <video src="product/<?= $recommendedVideo["videoFile"] ?>"></video>
            </div>
            <div class="bg-gray-200">
               <h1 class="font-bold underline"><?=$recommendedVideo["videoTitle"]?></h1>
               <p class="text-gray-700">
                  <?=$recommendedVideo["videoDescription"]?>
               </p>
            </div>
          </a>
        </li>
        <?php
    }
} else {
    echo "No videos found in the database.";
}

// Close the database connection
$con->close();

// Function to get video data by video ID
function getVideoDataById($connection, $videoId) {
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
  </div>
</aside>

<div class="p-4 sm:ml-64">
  <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
  
<div>
    <video width="100%" style="height: 100%; border:0.1rem solid black;" class='card-img-top' controls>
        <source src="product/<?= $videoF ?>" type="video/mp4">
    </video>
</div>

  </div>
</div>

</body>
</html>