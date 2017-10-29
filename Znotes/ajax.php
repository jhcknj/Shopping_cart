<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/27
     * Time: 10:55
     */
    
    
    $data = json_decode ( file_get_contents ( "php://input" ) );
    echo ( '{"id" : ' . $data->id . ', "age" : 24, "sex" : "boy", "name" : "huangxueming"}' );


?>