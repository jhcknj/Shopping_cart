<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/11
 * Time: 22:35
 */
?>
<?php //require_once '../../exampleDB/MysqlPDO.php'; ?>
<?php require_once '../mysqlpdo.php'; ?>
<?php
//$pdo=new \DB\MysqlPDO();
$pdo=new \MYPDO\mysqlpdo();
$tableName='user';
$set=['password'=>'999','name'=>'sll2'];
$where=['name'=>'sll'];
$in=['id'=>[65,66]];
$pdo->update($tableName,$set,$where,$in);
//UPDATE user SET password='999',name='sll2' WHERE name='sll' AND id IN(65,66);
?>
