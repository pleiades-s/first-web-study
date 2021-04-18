<?php
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
    $sql = "SELECT id, title
            FROM topic";

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

    $update_link = '';
    $delete_link = '';
    $author = '';

    if(isset($_GET['id'])){
        $filtered_id =  mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * 
                FROM topic 
                LEFT JOIN author ON topic.author_id = author.id 
                WHERE topic.id={$filtered_id}";

        $result = mysqli_query($conn, $sql);
        // echo mysqli_error($conn);
        $row = mysqli_fetch_array($result);

        $article['title'] = htmlspecialchars($row['title']);
        $article['description'] = htmlspecialchars($row['description']);
        $article['name'] =  htmlspecialchars($row['name']);

        $update_link = "<a href='update.php?id=".$_GET['id']."'>update</a>"; // REMARK: '.' can concatenate strings.
        $delete_link = "<form action='process_delete.php' method='post'>
                            <input type='hidden' name='id' value='".$_GET['id']."'>
                            <input type='submit' value='delete'>
                        </form>
                        ";
        $author = "<p>by {$article['name']}</p>";
    }   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <a href="author.php">author</a>
        <ol>
            <!-- <li>HTML</li> -->
            <?= $list ?> <!--php echo $list ?> -->
        </ol>
        <a href="create.php">create</a>
        <?= $update_link ?>
        <?= $delete_link ?>
        <h2><?= $article['title']?></h2>
        <?= $article['description']?>
        <?= $author ?>
    </body>
</html>