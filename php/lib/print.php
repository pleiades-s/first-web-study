<?php
    function print_title(){
        if(!isset($_GET['id'])){
            echo "WELCOME";
        }
        else echo htmlspecialchars($_GET['id']);
    }

    function print_description(){
        if(isset($_GET['id'])) 
            echo htmlspecialchars(file_get_contents("data/".$_GET['id']));

        else echo "Thanks for visiting the website";
    }

    function print_list($path){
        $list = scandir($path);
        $i = 0;
        while($i < count($list)){
            $title = htmlspecialchars($list[$i]);

            if($title != "." && $title != ".."){
                echo "<li><a href=\"index.php?id=$title\">$title</a></li>\n";
            }
            $i = $i + 1;
        }
    }
    // XSS Attack can be broken by htmlspecialchas function.
?>