<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/27
     * Time: 12:18
     */
    
    $ch = curl_init ( 'http://hao.360.cn/' );//http://404.php.net/   //www.baidu.com
    // 执行
    curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , TRUE );
    curl_exec ( $ch );
    // 检查是否有错误发生
    if ( curl_errno ( $ch ) ) {
        echo 'Curl error: ' . curl_error ( $ch );
    }
    else {
        //echo curl_errno($ch);
        // 关闭句柄
        curl_close ( $ch );
    }
    
    
    //  $ch= curl_init ( 'http:/api.bitly.com/v3/shorten' . '?login=user&apiKey=secert' . '&longUrl=http%3A%2F%2Fsitepoint.com' );
    // curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , TRUE );
    // $result = curl_exec ( $ch );
    // print_r ( json_encode ( $result ) );
    // echo curl_errno ( $ch );
    
    