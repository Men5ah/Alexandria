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
        <?php
        include_once "../actions/displayreadinglist_action.php";
        ?>
        <button id="togglePopup">Create New Reading List</button>
        <button id="toggleModify">Modify a Reading List</button>

        <div class="overlay" id="overlay"></div>


        <div class="popupForm" id="popupForm">
            <h3>Create New Reading List</h3>
            <form action="../actions/readinglist_action.php" method="post">
                <label for="listName">List Name:</label>
                <input type="text" id="listName" name="listName" required>
                <br>
                <button type="submit">Create</button>
            </form>
        </div>

        <div class="overlay" id="overlay2"></div>
        <div class="popupForm" id="popupFormModify">
            <h3>Modify List</h3>
            <form action="../actions/modifyreadinglist_action.php" method="post">
            <?php
                include_once "../actions/get_all_readinglists.php";
                echo $selectList;
            ?>
                <label for="listName">New List Name:</label>
                <input type="text" id="listName" name="listName" required>
                <br>
                <button type="submit">Modify</button>
            </form>
        </div>
        <script src="../js/readinglist.js"></script>
    </body>
</html>