<?php
include_once "../settings/connection.php";
$conn = get_connection();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $listName = mysqli_real_escape_string($conn, $_POST['listName']);
    $readingList = mysqli_real_escape_string($conn, $_POST['readingList']);
    
    $sql = "UPDATE `readinglists` SET `listName`='$listName' WHERE listID='".$readingList."'";

    // Execute query and check if successful
    if (mysqli_query($conn, $sql)) {
        header("Location: ../views/readinglist.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>