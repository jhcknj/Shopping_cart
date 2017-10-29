<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/18
     * Time: 15:33
     */
?>
<?php require_once '../DB/mysqlpdo.php';
    $pdo    = new \MYPDO\mysqlpdo();
    $table  = 'books';
    $fields = [ 'id' , 'name' , 'author' , 'price' , 'brief' , 'type' , 'photo' ];
    $valuse = [ 100006 , 'mysql' , 'abc' , '120.4' , '简介' , 4 , NULL , 100007 , 'sql技术手册' , 'aaa' , '99.2' , '简介2' , 4 , NULL , 100008 , 'phpWeb' , 'bbb' , '78' , '简介3 ' , 4 , NULL ];
    $pdo->insert_multiple ( $table , $fields , $valuse );
?>