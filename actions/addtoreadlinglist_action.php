<?php
include_once "../settings/connection.php";

$conn = get_connection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $readinglist = mysqli_real_escape_string($conn, $_POST['readingList']);
    $bookTitle = mysqli_real_escape_string($conn, $_POST['bookTitle']);
    $author = mysqli_real_escape_string($conn,  $_POST['author']);
    $gutenbergID = mysqli_real_escape_string($conn, $_POST['gutenbergID']);

    $insert = "INSERT INTO readinglistbooks(listID, booktitle, author, gutenbergID) values ('$readinglist','$bookTitle','$author','$gutenbergID')";

    // Execute query and check if successful
    if (mysqli_query($conn, $insert)) {
        header("Location: ../views/search.php");
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
}
?>