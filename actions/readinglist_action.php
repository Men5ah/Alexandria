<?php
include_once "../settings/connection.php";
session_start();
$conn = get_connection();

// Check if the user is logged in
if(isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $listName = mysqli_real_escape_string( $conn , $_POST["listName"]);
    
        $insert = "INSERT INTO readinglists(userID, listName) values ('$userID','$listName')";
        $result = mysqli_query($conn, $insert);
        if($result) {
            header( "location: ../views/readinglist.php" );
            exit();
        } else {
            echo "Error: ". $conn->error;
        }
    }
} else {
    header("location: ../views/login.php");
    exit();
}


?>