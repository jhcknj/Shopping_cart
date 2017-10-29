<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/18
     * Time: 16:44
     */
?>
<?php
    session_start ();
    require_once '../DB/mysqlpdo.php';
    @$type = $_POST[ 'types' ];
    show_books ( $type );
    
    /**
     * @param $type ,根据type展示不同类型的书籍
     */
    
    function show_books ( $type = NULL ) {
        if ( $type ) {//没选择类别之前展示全部书籍
            $where = [ 'type' => $type ];
        }
        else {
            $where = NULL;
        }
        
        $table  = 'books';
        $pdo    = new \MYPDO\mysqlpdo();
        $result = $pdo->select ( $table , [ 'id' , 'name' , 'author' , 'price' ] , $where );
        $row    = $result->fetchAll ();
        echo "<table> <tbody>";
        foreach ( $row as $value ) {//按类显示书籍基本信息
            echo <<<HTML
      <tr> 
        <td> {$value['name']}</td><td>{$value['author']}</td><td>￥{$value['price']}</td>
        <td><button type="button" value="{$value['id']}" >加入购物车</button></td>
      </tr>
HTML;
        }
    }
    
    echo "</tbody></table>";
    if ( isset( $_SESSION[ 'usertype' ] ) && isset( $_SESSION[ 'username' ] ) ) {
        echo "用户类型," . $_SESSION[ 'usertype' ] . "<br>";
        echo "用户名:" . $_SESSION[ 'username' ];
    }
?>
