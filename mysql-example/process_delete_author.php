<?php
    // var_dump($_POST);
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');

    $filtered_id = mysqli_real_escape_string($conn, $_POST['id']);

    settype($filtered_id, 'integer');

    $sql = "DELETE 
            FROM author
            WHERE
                id = {$filtered_id}
            ";
    
    $result_author = mysqli_query($conn, $sql);

    $sql = "DELETE
            FROM topic
            where author_id = {$filtered_id}";

    $result_topic = mysqli_query($conn, $sql);    
    
    // echo $sql;
    if($result_author && $result_topic === false){
        echo "Something went wrong.";
        error_log(mysqli_error($conn)); // writing at the apache error log
        // echo mysqli_error($conn);
    }
    else{
        header("Location: author.php");
    }
?>