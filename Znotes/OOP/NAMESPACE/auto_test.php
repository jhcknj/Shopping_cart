<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/25
     * Time: 17:00
     */
    use shipping\courier;//释放该命名空间内的函数,常量
    use shipping\test1 ;
    require_once 'autoload.php';
    
    spl_autoload_register ( 'my_autoload' );//注册自动加载类shipping\courier,即当下遇到未定义的类
    $mono = new courier( 'sll' );
    echo $mono->get_name ();
    echo $mono->ABC;
    echo "<br>";
    
    $test1 = new test1( 11 , 22 );
    echo $test1->ABC;
    echo $test1->get_property_a ();
  