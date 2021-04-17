<?php
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
    $sql = "SELECT id, title FROM topic";
    $result = mysqli_query($conn, $sql);
    $list = '';

    while($row = mysqli_fetch_array($result)){
        $escapted_title = htmlspecialchars($row['title']); // Blocking xss attacks
        $list = $list."<li><a href=\"index.php?id={$row['id']}\">$escapted_title</a></li>";
    }

    $article = array(
        'title' => "Welcome",
        'description' => "This is mysql example website"
    );
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $article['title'] = htmlspecialchars($row['title']);
        $article['description'] = htmlspecialchars($row['description']);
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
            <?= $list ?> <!--php echo $list ?> -->
        </ol>
        <a href="create.php">create</a>
        <h2><?= $article['title']?></h2>
        <?= $article['description']?>
    </body>
</html>