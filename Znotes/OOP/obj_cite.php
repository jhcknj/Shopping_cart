<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/27
     * Time: 18:24
     */
    use shipping\courier;
    
    require_once 'NAMESPACE/autoload.php';
    
    
    spl_autoload_register ( 'my_autoload' );
    $a1       = new courier( 'sss' );
    $a2       = $a1;//当用一个对象赋值另一个对象时,存储在其属性中的任何对象都将是引用,而不是副本,想要获取副本,需用clone
    $a2->name = 'LL';
    echo 'name is' . $a1->get_name () . ",And \$a2 name is" . $a2->get_name ();
    
    if ( $a1 == $a2 ) {
        echo "\$a1 ,\$a2,引用同一个原始文件";
    }
    if ( $a1 === $a2 ) {
        echo "\$a1 ,\$a2,对象完全相同,存储在同一个位置";
    }
    ?>