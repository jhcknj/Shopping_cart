<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/11
 * Time: 22:36
 */
?>
<?php
require_once '../mysqlpdo.php';


use \MYPDO\mysqlpdo;
$pdo = new \MYPDO\mysqlpdo();
$result=$pdo->select_link(['user'],['id','name'],['id'=>'63'],'order by ',[0,1]);
print_r($result->fetchAll());

?>
