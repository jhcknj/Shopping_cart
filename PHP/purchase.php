<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/12
     * Time: 11:50
     */
    if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
        //TODO 支付宝接口
        echo $ISBN = $_POST[ 'hidden' ];
        echo $quantity = $_POST[ 'quantity' ];
        header ( "locatin:../HTML/payment.php" );
    }
