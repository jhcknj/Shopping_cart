<?php
    require_once '../DB/mysqlpdo.php';
    require_once 'functions.php';
    if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
        session_start ();
        global $error;
        global $login;
        $usersn   = trim ( $_POST[ 'usersn' ] );
        $password = trim ( $_POST[ 'password' ] );
        //验证身份,登录
        if ( identity ( $usersn , $password , 1 ) == TRUE ) {//顾客
            header ( "location:Catalog.php" );
            exit;
        }
        else if ( identity ( $usersn , $password , 0 ) == TRUE ) {//管理员
            header ( "location:Admin.php" );
            exit;
        }
        else {
            global $error;
            $error = 1;
        }
        
    }



