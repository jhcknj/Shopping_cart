<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/10/12
 * Time: 12:25
 */
?>
<script src="Js/jquery-3.2.1.js"></script>
<?php include_once 'header.php'; ?>



<?php
    $url="http://www.baidu.com";
    if(!($contents = file_get_contents($url))){
        die('Failure to open' .$url);
    }
    print_r($contents);
?>

<?php include_once 'footer.php'; ?>

