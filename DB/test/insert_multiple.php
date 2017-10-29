<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/12
 * Time: 16:13
 */
?>
    <?php require_once '../mysqlpdo.php' ?>
<?php
$tablename='quotation';
$fields=['quote','source','favorite'];
$fields_values=['The unexamined life is not worth living.','Socrates',1,'宁可食无肉,不可居无竹.','苏轼','1','大江东去,浪淘尽,千古等流人物.','苏轼',1];
$mypdo=new \MYPDO\mysqlpdo();
$result = $mypdo->insert_multiple($tablename,$fields,$fields_values);
if($result){
    echo "插入成功!";
}else{
    echo "插入失败";
}
?>
