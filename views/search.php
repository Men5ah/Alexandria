<?php
include_once "../components/navbar.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alexandria | Search</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/search.css">
</head>
<body>
    <form id="searchForm">
        <label for="search">Search</label>
        <input type="text" name="search" id="search" placeholder="Search">
        <button type="submit">Search</button>
    </form>
    <div class="searchResults" id="searchResults">

    </div>
    <!-- <p id="noResultsMessage"></p> -->
    <div id="paginationButtons">
        <button id="prevButton">Previous</button>
        <button id="nextButton">Next</button>
    </div>
    <script src="../js/search.js"></script>
</body>
</html>