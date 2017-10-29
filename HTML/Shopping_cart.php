<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Time: 17:28
 */
?>
<?php
require_once 'header.php';
?>
<style>
    #car_book_list{
        margin-left: 50px;
        width: 800px;
        height: 400px;

    }
    .buy{
        text-align: right;
        width: 250px;
        height: 40px;
        position: absolute;
        left: 70px;
        top:200px;

    }
    #editable{
        width: 60px;
        height: 20px;
        margin-left: 400px;

    }
</style>

<p>Your Shopping Cart</p><hr>
<div><button type="button" id="editable" >编辑</button></div>
<div id="car_book_list">
    <?php  require_once '../PHP/cart_book_list.php'?>

</div>



<?php require_once 'footer.php'; ?>
