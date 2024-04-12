<?php
include_once "../settings/connection.php";


// Function to display books belonging to a reading list
function displayReadingListBooks($readingListId) {
    $conn = get_connection();
    // Query to retrieve books belonging to the reading list from the database
    // Replace this with your actual database query
    $query = "SELECT * FROM readinglistbooks WHERE listID = '$readingListId'";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        // Display each book in the format similar to search results
        while ($row = mysqli_fetch_assoc($result)) {
            // Output book details
            echo "<div class='book'>";
            echo "<ul>";
            echo "<li><a href='https://www.gutenberg.org/ebooks/{$row['gutenbergID']}'>{$row['booktitle']}, {$row['author']}</a></li>";
            echo "<form action='../actions/deletebook_action.php' method='post'>";
            echo "<input type='hidden' name='bookID' value='{$row['listbookID']}'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "</ul>";
            echo "</div>";
        }
    } else {
        // Handle case when no books are found
        echo "No books found in this reading list.";
    }
}
?>
