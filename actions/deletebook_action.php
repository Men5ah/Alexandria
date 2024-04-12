<?php
include_once "../settings/connection.php";
$conn = get_connection();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $bookID = mysqli_real_escape_string($conn, $_POST['bookID']);
    
    $sql = "DELETE FROM readinglistbooks WHERE listbookID='".$bookID."'"; 

    // Execute query and check if successful
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Book has deleted!")</script>';
        header("Location: ../views/readinglist.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>