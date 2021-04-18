<?php
    // var_dump($_POST);
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');

    $filtered_id = mysqli_real_escape_string($conn, $_POST['id']);

    settype($filtered_id, 'integer');

    $sql = "DELETE 
            FROM topic
            WHERE
                id = {$filtered_id}
            ";
    
    $result = mysqli_query($conn, $sql);
    
    // echo $sql;
    if($result === false){
        echo "Something went wrong.";
        error_log(mysqli_error($conn)); // writing at the apache error log
        // echo mysqli_error($conn);
    }
    else{
        header("Location: index.php");
    }
?>