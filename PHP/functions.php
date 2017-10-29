<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/24
     * Time: 10:24
     */
    
    function identity($usersn, $password, $usertype)
    {//$username=id
        $tablename = '';
        $fieldname = '';
        switch ($usertype) {
            case 0:
                $tablename = 'admin';
                $fieldname = 'id';
                break;
            case 1:
                $tablename = 'customer';
                $fieldname = 'id';
                break;
            
        }
        
        $mp = new \MYPDO\mysqlpdo();
        $where=[$fieldname=>$usersn] ;
        $result_T = $mp->select($tablename, [$fieldname, 'name', 'password'], $where);
        if ($user = $result_T->fetch()) {  //管理员,设$_SESSION['usertype']=0;
            $user_pwd = $user['password'];
            $differ = strcmp($password, $user_pwd);
            if ($differ) {//密码错误
                global $error;
                $error = 1;
                return FALSE;
            } else {
                global $login;
                $login = 1;
                $_SESSION['username'] = $user['name'];
                $_SESSION['usersn'] = $user[$fieldname];
                $_SESSION['usertype'] = $usertype;
                $_SESSION['ISBN']="";
                return TRUE;
            }
        }
       
        return 0;
    }