<?php
    $conn = mysqli_connect('localhost','root', '1q2w3e4r', 'opentutorials');
    $sql = "SELECT * FROM topic";
    $result = mysqli_query($conn, $sql);

    // var_dump($result);
    // print_r(mysqli_fetch_array($result));

    while($row = mysqli_fetch_array($result)){
        echo '<h2>'.$row['title'].'</h2>';
        echo $row['description'];
    }
?>