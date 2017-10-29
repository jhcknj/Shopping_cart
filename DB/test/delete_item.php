<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/11
 * Time: 22:35
 */
?>
<?php require_once '../mysqlpdo.php'; ?>
<?php
//$pdo=new \DB\MysqlPDO();
$pdo=new \MYPDO\mysqlpdo();
var_dump($pdo->delete('user', ['name' => 'sll'], ['id' => [10,11,12]]))  ;
// DELETE FROM tablename WHERE column=value | DELETE FROM tablename WHERE column=value LIMIT 1

?>
