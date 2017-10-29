<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/18
     * Time: 16:36
     */
    // eval(" echo 'hello world' ");
   // echo 'hello world';
    class employee{
        var $name;
        var $employee_id;
    }
    $this_empt=new employee();
    $this_empt->name='FF';
    $this_empt->employee_id='123';
    serialize($this_empt);//把任何数据类型转换成字节流
   
    //get_loaded_extensions();所有函数扩展
    // get_extension_funcs();,一个函数扩展名参数,然后显示所有改扩展下的函数
    // $extensions=get_loaded_extensions();
    // foreach ($extensions as $each_ext){
    //     echo "<h2>$each_ext</h2>";
    //     echo "<br>";
    //     $ext_funcs=get_extension_funcs($each_ext);
    //     foreach ($ext_funcs as $func){
    //         echo "<li>$func</li><br>";
    //     }
    // }

    // echo get_current_user();
    // echo getmypid();
    $timestamp=getlastmod();
    echo date("Y-m-d H:i:s",$timestamp);
    echo "<br>";
    echo date("Y-m-d H:i:s");
?>