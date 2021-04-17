<?php
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
    $sql = "SELECT id, title FROM topic";
    $result = mysqli_query($conn, $sql);
    $list = '';

    while($row = mysqli_fetch_array($result)){
        $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
    }

    $article = array(
        'title' => "Welcome",
        'description' => "This is mysql example website"
    );
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $article['title'] = $row['title'];
        $article['description'] = $row['description'];
    }   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1>WEB</h1>
        <ol>
            <!-- <li>HTML</li> -->
            <?= $list ?>
        </ol>
        <form action="process_create.php" method="POST">
            <p><input type="text" name="title" placeholder="title"></p>
            <p><textarea name="description" placeholder="description"></textarea>
            <p><input type="submit"></p>
        </form>
    </body>
</html>