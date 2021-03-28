<?php
    require_once('lib/print.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>
            <?php
            print_title();
            ?>
        </title>
    </head>
    <body>
        <h1>WEB</h1>
        <ol>
            <!-- <li><a href="index.php?id=HTML">HTML</a></li>
            <li><a href="index.php?id=CSS">CSS</a></li>
            <li><a href="index.php?id=JavaScript">JavaScript</a></li> -->
            <?php
                print_list('./data');
            ?>
        </ol>