<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/24
     * Time: 20:01
     */
    
    
    function my_autoload ( $classname ) {
       // $file_name=$classname.'.php';
        $file_name= strrev(strtok( strrev($classname),'\\')) . '.php';
        include_once ($file_name);
    }
    
    
    