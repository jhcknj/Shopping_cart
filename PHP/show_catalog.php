<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/18
     * Time: 12:48
     */
?>
<?php
    require_once '../DB/mysqlpdo.php';
    
    $pdo     = new \MYPDO\mysqlpdo();
    $result  = $pdo->select ( 'books_type' );
    $catalog = $result->fetchAll ();
    
    foreach ( $catalog as $value ) {//显示书籍目录
        echo <<<HTML
    <span >{$value['name']}</span>
    <input type="hidden"  value={$value['type']} />
HTML;
    }
?>


