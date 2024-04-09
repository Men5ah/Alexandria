<?php
include_once "../components/navbar.php";
include_once "../settings/core.php";
// Retrieve and display books belonging to the reading list
include_once "../actions/displayreadinglist_books_action.php";
checkLogin();

// Retrieve the reading list ID from the URL
$readingListId = isset($_GET['listID']) ? $_GET['listID'] : null;

if (!$readingListId) {
    // Handle error if no reading list ID is provided
    echo "Reading list ID is missing.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alexandria | Reading List</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/reading.css">
</head>
<body>
    <h2>Reading List</h2>
    <div id="searchResults">
        <!-- Display books belonging to the reading list here -->
        <?php displayReadingListBooks($readingListId); ?>
    </div>
    <script src="../js/search.js"></script>
</body>
</html>
