<?php
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');

    $sql = "SELECT id, title FROM topic";
    $result = mysqli_query($conn, $sql);
    $list = '';

    while($row = mysqli_fetch_array($result)){
        $escape_title = htmlspecialchars($row['title']);
        $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escape_title}</a></li>";
    }
    
    $sql = "SELECT * FROM author";
    $result = mysqli_query($conn, $sql);
    $select_form = '<select name="author_id">';
    while($row = mysqli_fetch_array($result)){
        $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    $select_form .= '</select>';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <ol>
            <!-- <li>HTML</li> -->
            <?= $list ?>
        </ol>
        <form action="process_create.php" method="POST">
            <p><input type="text" name="title" placeholder="title"></p>
            <p><textarea name="description" placeholder="description"></textarea>
            <?= $select_form ?>
            <p><input type="submit"></p>
        </form>
    </body>
</html>