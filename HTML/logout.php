<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/17
 * Time: 8:55
 */
?>
<?php
    if(isset($_COOKIE['sll'])){ //logout  删除cookie
        setcookie('sll',false,time()-10);
    }
/*  可测试当前php的编码方式
      $string="宁可";
      $encode = mb_detect_encoding($string, array("ASCII","UTF-8","GB2312","GBK"));
      echo $encode;
*/
?>