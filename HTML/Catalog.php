<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/17
 * Time: 16:51
 */
?>

<?php
define('TITLE','the book catalogue ');
include_once 'header.php'; ?>

<div id="search">
    <div id="title"><h1>Buy-Books-Online</h1></div>
    <div id="cart"><a id="go_cart" href="Shopping_cart.php">View Cart</a>|我的订单</div>
</div>


<div id="catalog">
    <div id="type">
        <?php  require_once '../PHP/show_catalog.php';?>
    </div>
    <div id="books"></div>
</div>




<?php include_once 'footer.php'; ?>
