<?php 
    unlink('data/'.basename($_POST['id'])); // 'basename' do not allow to visit the parent directory.
    header('Location: /index.php');
?>