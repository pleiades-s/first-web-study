<?php
    // var_dump($_POST);
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
    // print_r($_POST);
    $filtered = array(
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description']),
        'author_id' => mysqli_real_escape_string($conn, $_POST['author_id'])
    );
    $sql = "INSERT INTO topic (
        title, 
        description,
        created,
        author_id 
        ) VALUES (
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        '{$filtered['author_id']}'
        )";
    // die($sql);

    // $sql = "INSERT INTO topic (
    //     title, 
    //     description,
    //     created 
    //     ) VALUES (
    //     'hacking',
    //     'haha',
    //     '2018-1-1 00:00:00'
    //     );--NOW()";

    // echo $sql;
    
    $result = mysqli_query($conn, $sql);
    // $result = mysqli_multi_query($conn, $sql);
    
    // echo $sql;
    if($result === false){
        echo "Something went wrong.";
        error_log(mysqli_error($conn)); // writing at the apache error log
        // echo mysqli_error($conn);
    }
    else{
        echo "Success <a href=\"index.php\">Home</a>";
    }
?>