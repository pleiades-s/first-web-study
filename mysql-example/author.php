<?php
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
//     $sql = "SELECT id, title
//             FROM topic";

//     $result = mysqli_query($conn, $sql);
//     $list = '';

//     while($row = mysqli_fetch_array($result)){
//         $escapted_title = htmlspecialchars($row['title']); // Blocking xss attacks
//         $list = $list."<li><a href=\"index.php?id={$row['id']}\">$escapted_title</a></li>";
//     }

//     $article = array(
//         'title' => "Welcome",
//         'description' => "This is mysql example website"
//     );

//     $update_link = '';
//     $delete_link = '';
//     $author = '';

//     if(isset($_GET['id'])){
//         $filtered_id =  mysqli_real_escape_string($conn, $_GET['id']);
//         $sql = "SELECT * 
//                 FROM topic 
//                 LEFT JOIN author ON topic.author_id = author.id 
//                 WHERE topic.id={$filtered_id}";

//         $result = mysqli_query($conn, $sql);
//         // echo mysqli_error($conn);
//         $row = mysqli_fetch_array($result);

//         $article['title'] = htmlspecialchars($row['title']);
//         $article['description'] = htmlspecialchars($row['description']);
//         $article['name'] =  htmlspecialchars($row['name']);

//         $update_link = "<a href='update.php?id=".$_GET['id']."'>update</a>"; // REMARK: '.' can concatenate strings.
//         $delete_link = "<form action='process_delete.php' method='post'>
//                             <input type='hidden' name='id' value='".$_GET['id']."'>
//                             <input type='submit' value='delete'>
//                         </form>
//                         ";
//         $author = "<p>by {$article['name']}</p>";
//     }   
// ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <a href="index.php">topic</a>
        <table border="1">
            <tr>
                <td>id</td><td>name</td><td>profile</td><td></td><td></td>
            </tr>
            <?php
                $sql = "SELECT * FROM author";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                    $filtered = array(
                        'id' => htmlspecialchars($row['id']),
                        'name' => htmlspecialchars($row['name']),
                        'profile' => htmlspecialchars($row['profile'])
                    );
            ?>
            <tr>
                <td><?= $filtered['id'] ?></td>
                <td><?= $filtered['name'] ?></td>
                <td><?= $filtered['profile'] ?></td>
                <td><a href="author.php?id=<?= $filtered['id'] ?>">update</a></td>
                <td>
                    <form action="process_delete_author.php" method="post">
                        <input type="hidden" name="id" value="<?= $filtered['id'] ?>">
                        <input type="submit" value="delete" 
                                onsubmit="return confirm('Are you sure?');">
                    </form>
                </td>
            </tr>
            <?php 
                }
            ?>
        </table>
        <?php 

            $escaped = array(
                'name' => '',
                'profile' => ''
            );
            $button_value = 'Create author';
            $form_action = "process_create_author.php";
            $form_id = '';

            if(isset($_GET['id'])){
                $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
                settype($filtered_id, 'integer');
                $sql = "SELECT * FROM author WHERE id = {$filtered_id}";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                $escaped['name'] = htmlspecialchars($row['name']);
                $escaped['profile'] = htmlspecialchars($row['profile']);
                $button_value = 'Update author';
                $form_action = "process_update_author.php";
                $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
            }
        ?>
        <form action="<?= $form_action ?>" method="post">
            <?= $form_id ?>
            <p><input type="text" name="name" placeholder="name" value=<?= $escaped['name'] ?>></p>
            <p><textarea name="profile" placeholder="profile"><?= $escaped['profile'] ?></textarea></p>
            <p><input type="submit" value="<?= $button_value ?>"></p>
            
        </form>
    </body>
</html>