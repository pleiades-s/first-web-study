<?php
    // var_dump($_POST);
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
    $filtered = array(
        'name' => mysqli_real_escape_string($conn, $_POST['name']),
        'profile' => mysqli_real_escape_string($conn, $_POST['profile']),
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );
    $sql = "UPDATE author
            SET name = '{$filtered['name']}', profile = '{$filtered['profile']}'
            where id = '{$filtered['id']}'
        ";
    
    // die($sql);

    $result = mysqli_query($conn, $sql);
    if($result === false){
        echo "Something went wrong.";
        error_log(mysqli_error($conn)); // writing at the apache error log
    }
    else{
        header("Location: author.php");
    }
?>