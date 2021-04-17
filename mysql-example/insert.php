<?php
    // $mysqli = mysqli_connect("example.com", "user", "password", "database");
    $mysqli = mysqli_connect("localhost", "root", "1q2w3e4r", "opentutorials");
    // $result = mysqli_query($mysqli, "SELECT 'Please do not use the deprecated mysql extension for new development. ' AS _msg FROM DUAL");
    $query = "INSERT INTO topic (
        title, 
        description,
        created 
        ) VALUES (
        'MySQL',
        'MySQL is ...',
        NOW()
        )";
    echo $query;
    $result = mysqli_query($mysqli, $query);
    if ($result === false)
        echo mysqli_error($mysqli);
    // $row = mysqli_fetch_assoc($result);
    // echo $row['_msg'];
?>