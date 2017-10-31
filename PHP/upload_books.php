<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/31
     * Time: 10:41
     */
    if ( is_uploaded_file ( $_FILES[ 'userfile' ][ 'tmp_name' ] ) ) {//判断文件是否是通过 HTTP POST 上传的
        //'tmp_name  文件被上传后在服务端储存的临时文件名
        //echo $_FILES['userfile']['tmp_name'];
        // $lines = file ( $_FILES[ 'userfile' ][ 'tmp_name' ] );
        // var_dump( $lines);
        $content = file_get_contents ( $_FILES[ 'userfile' ][ 'tmp_name' ] );
        $con     = substr ( $content , 0 , 10 );
        echo $con;
        //echo mb_detect_encoding ( $con , array ( "ASCII" , 'UTF-8' , 'GB2312' , 'GBK' , 'BIG5' ) );
        
    }
   
  