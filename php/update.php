<?php
    require('lib/print.php');
    require('view/top.php');
?>
        <a href="create.php">create</a>
        <form action="update_process.php" method="POST">
            <input type="hidden" name="old_title" value="<?= $_GET['id'] ?>" />
            <p>
                <input type="text" name="title" placeholder="Title" value="<?php print_title(); ?>"/>
            </p>
            <p>
                <textarea name="description" placeholder="Description"><?php print_description(); ?></textarea>
            </p>
            <p>
                <input type="submit" value="Submit"/>
            </p>
        </form>
        <h2>
            <?php
                print_title();
            ?>
        </h2>
        <?php 
            print_description();
        ?>
<?php
    require('view/bottom.php');
?>