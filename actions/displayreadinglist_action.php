<?php
include_once "../settings/connection.php";
$conn = get_connection();

// Check if the user is logged in
if(isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID']; // Get the user's ID from the session

    // Query to select reading lists for the current user
    $query = "SELECT * FROM readinglists WHERE userID = '$userID'";
    $result = mysqli_query($conn, $query);

    // Check if there are any reading lists
    if(mysqli_num_rows($result) > 0) {
        // Loop through each reading list
        while($row = mysqli_fetch_assoc($result)) {
            $listID = $row['listID'];
            $listName = $row['listName'];

            // Generate HTML for the reading list section
            echo '<section>';
            echo '<h2><a href="../views/readinglist_page.php?listID='.$listID.'">'.$listName.'</a></h2>';
            echo '</section>';
        }
    } else {
        // Display a message if the user has no reading lists
        echo 'You have no reading lists.';
    }
} else {
    // If the user is not logged in, redirect them to the login page or display a message
    header("location: ../views/login.php");
    exit();
}
?>
