<?php
include_once "../settings/connection.php";
$conn = get_connection();
session_start();

$userID = $_SESSION['userID'];

$selection = "SELECT * FROM readinglists WHERE userID='$userID'";

$result = mysqli_query($conn, $selection);

// Check if query was successful
if ($result) {

    $selectList = '<select name="readingList" placeholder="Select a Reading List">';
    while ($row = mysqli_fetch_assoc($result)) {
        // Add each reading list as an option in the select list
        $selectList .= '<option value="' . $row['listID'] . '">' . $row['listName'] . '</option>';
    }
    $selectList .= '</select>';



    // Fetch reading lists and store them in an array

    // Close the select list
    // $selectList .= '</select>';

    // Output the select list
    // echo $selectList;
} else {
    // Handle database query error
    echo json_encode(['error' => 'Failed to fetch reading lists']);
}
