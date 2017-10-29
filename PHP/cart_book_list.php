<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/25
     * Time: 12:15
     */
    require_once '../DB/mysqlpdo.php';
    
    $ISBN    = $_COOKIE[ 'ISBN' ];
    $book_id = explode ( "," , $ISBN );
    $where   = [ 'id' => $book_id ];
    $table   = [ 'books' ];
    $fields  = [ 'name' , 'author' , 'price' ];
    $pdo     = new \MYPDO\mysqlpdo();
    $result  = $pdo->select ( $table , $fields , $where );
    echo "<table id='tab'><tbody>";
    foreach ( $result->fetchAll () as $row ) {
        echo <<<HTML
        <tr>
            <td><input type="checkbox" checked="checked"/></td>
            <td>{$row['name']}</td>
            <td>{$row['author']}</td>
            <td class="price">{$row['price']}</td>
            <td class="amount">
                <input type="button" class="dec" disabled="disabled" value="-" />
                <input type="text" name="quantity" class="text" value="1" />
                <input type="button" class="add" disabled="disabled" value="+" />
            </td>    
        </tr>
HTML;
    }
    echo <<<HTML
<div class="buy">
    <input type="hidden" name="hidden" value="$ISBN" />
    <div  >合计:￥<span id="purchase"></span></div>
    <a href="../HTML/payment.php">去付款</a>
</div>
HTML;
    
    echo "</tbody></table>";


?>

