<?php
// Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User's preferred tag (for example, retrieved from user's profile or preferences)
$preferredTag = "your_preferred_tag";

// Fetch videos that match the user's preferred tag
$sql = "SELECT * FROM videos WHERE tag = '$preferredTag'";
$result = $conn->query($sql);

// Array to store recommended videos
$recommendedVideos = array();

// Check if there are any videos that match the preferred tag
if ($result->num_rows > 0) {
    // Loop through each video and calculate similarity scores
    while ($row = $result->fetch_assoc()) {
        $videoId = $row["vid"];
        $videoTitle = $row["videoTitle"];
        $videoDescription = $row["videoDescription"];
        $videoTag = $row["tag"];
        $videoFile = $row["videoFile"];

        // Calculate similarity score based on video attributes (you can define your own similarity metric)
        $similarityScore = calculateSimilarity($videoTitle, $videoDescription, $preferredTag);

        // Store video details along with similarity score in the recommendedVideos array
        $recommendedVideos[] = array(
            "videoId" => $videoId,
            "videoTitle" => $videoTitle,
            "videoDescription" => $videoDescription,
            "tag" => $videoTag,
            "videoFile" => $videoFile,
            "similarityScore" => $similarityScore,
        );
    }

    // Sort recommended videos based on similarity score in descending order
    usort($recommendedVideos, function ($a, $b) {
        return $b["similarityScore"] <=> $a["similarityScore"];
    });

    // Display the recommended videos
    foreach ($recommendedVideos as $video) {
        echo "<div>";
        echo "<h2>" . $video["videoTitle"] . "</h2>";
        echo "<p>" . $video["videoDescription"] . "</p>";
        echo "<video controls><source src='" . $video["videoFile"] . "' type='video/mp4'></video>";
        echo "</div>";
    }
} else {
    echo "No videos found matching your preferred tag.";
}

// Close the database connection
$conn->close();

// Function to calculate similarity score (you can implement your own similarity metric)
function calculateSimilarity($videoTitle, $videoDescription, $preferredTag) {
    // Implement your own similarity calculation based on video attributes and the user's preferred tag
    // For example, you can use cosine similarity, Jaccard similarity, etc.
    // For simplicity, we'll just return a random similarity score in this example.
    return rand(1, 10);
}
?>
