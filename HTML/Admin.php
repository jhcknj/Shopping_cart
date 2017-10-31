<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/24
     * Time: 8:51
     */
    
    require_once 'header.php';
?>

<form enctype="multipart/form-data" action="../PHP/upload_books.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file:
    <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
    

    
<?php require_once  'footer.php'; ?>
