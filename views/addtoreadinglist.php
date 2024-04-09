<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alexandria | Add to reading list</title>
</head>

<body>
    <form action="../actions/addtoreadlinglist_action.php" method="post">

        <?php
        include_once "../actions/get_all_readinglists.php";
        if (isset($_GET['data'])) {
            $data = json_decode($_GET['data']);
            echo '
            <input type="hidden" name="bookTitle" value="'.$data->book.'">
            <input type="hidden" name="author" value="'.$data->author.'">
            <input type="hidden" name="gutenbergID" value="'.$data->bookID.'">
            ';
       
        }
        ?>
        <button type="submit">Add</button>
    </form>
</body>

</html>