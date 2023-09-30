<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Page</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-oP5Fg5z1A6fWw0gybBv3+EOCkC5gTD5Hz6UqUzux2s9Yq/5F5y5f5A5i5o5n5o5x5t5k5u5E5T5x5y5u5n5O5I5C5K5" crossorigin="anonymous">
<style>
  p{
    text-decoration: none;
  }
</style>
</head>

<body>
  <?php include "header.php" ?>
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

  <div class="container mt-4">
    <div class="row">
      <main class="col-lg-8">
        <div class="card border-0 rounded-lg shadow">
          <div class="card-body">
            <video width="100%" style="height: auto;" class="card-img-top" controls>
              <source src="product/<?= $videoF ?>" type="video/mp4">
            </video>
          </div>
        </div>
      </main>

      <aside class="col-lg-4">
        <h2 class="text-xl font-semibold mb-4">Recommended Videos</h2>
        <ul class="list-group">
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
              <li class="media mb-4">
                <a href="algorithm.php?vid=<?= $recommendedVideo["vid"] ?>" class="d-flex align-items-start">
                  <div class="col-md-6"> <!-- This assumes you want a quarter-width column on medium screens and larger -->
                  <img src="product/<?= $recommendedVideo["videoImage"] ?>" class="w-100"  alt="">
                  </div><br>
                  <div class="media-body">
                    <h4 class="mt-0 "><?= $recommendedVideo["videoTitle"] ?></h4>
                    <p class=""><?= $recommendedVideo["videoDescription"] ?></p>
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
  </div>

  <!-- Include Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js" integrity="sha384-oP5Fg5z1A6fWw0gybBv3+EOCkC5gTD5Hz6UqUzux2s9Yq/5F5y5f5A5i5o5n5o5x5t5k5u5E5T5x5y5u5n5O5I5C5K5" crossorigin="anonymous"></script>
</body>

</html>