<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/11
     * Time: 22:35
     */
?>
<?php
    require_once '../mysqlpdo.php';
    
    $pdo = new \MYPDO\mysqlpdo();
    if ( ! $pdo ) {
        echo '$pdo  创建失败';
    }
    $table  = 'books';
    $values = [ 'id' => NULL ,
                //可不写,id autoincreased
                'name' => 'mysql' ,
                'author' => 'abc' ,
                'price' => '120.0' ,
                'brief' => 'abcdefgh' ,
                'type' => 2 ,
                'photo' => NULL
                //可为空
    ];
    $result = $pdo->insert ( $table , $values );

?>


