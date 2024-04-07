<?php
include_once "../components/navbar.php";
include_once "../settings/core.php";
checkLogin();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alexandria | Reading Lists</title>
        <link rel="stylesheet" href="../css/navbar.css">
        <link rel="stylesheet" href="../css/reading.css">
    </head>
    <body>
        <h2>Reading Lists</h2>
        <button id="togglePopup">Create New Reading List</button>

        <!-- Overlay to darken the background when the popup is displayed -->
        <div class="overlay" id="overlay"></div>

        <!-- Popup form for creating a new reading list -->
        <div class="popupForm" id="popupForm">
            <h3>Create New Reading List</h3>
            <form action="../actions/readinglist_action.php" method="post">
                <label for="listName">List Name:</label>
                <input type="text" id="listName" name="listName" required>
                <br>
                <button type="submit">Create</button>
            </form>
        </div>
        
        <?php include_once "../actions/displayreadinglist_action.php"?>
        <script src="../js/readinglist.js"></script>
    </body>
</html>