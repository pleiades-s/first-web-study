<?php
    file_put_contents('data/'.$_POST['title'], $_POST['description']);
    // echo "Successfully saved!";
    header('Location: /index.php?id='.$_POST['title']); // redirection
?>