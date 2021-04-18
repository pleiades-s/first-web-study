<?php
    // var_dump($_POST);
    $conn = mysqli_connect('localhost', 'root', '1q2w3e4r', 'opentutorials');
    print_r($_POST);
    $filtered = array(
        'title' => mysqli_real_escape_string($conn, $_POST['title']),
        'description' => mysqli_real_escape_string($conn, $_POST['description']),
        'id' => mysqli_real_escape_string($conn, $_POST['id'])
    );
    settype($_POST, 'integer');

    $sql = "UPDATE topic
                SET
                    title = '{$filtered['title']}',
                    description = '{$filtered['description']}'
                WHERE
                    id = '{$filtered['id']}'
            ";

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