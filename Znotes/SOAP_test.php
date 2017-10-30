<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/30
     * Time: 16:58
     */
    include_once 'SOAP_ServiceFunctions.php';
    $options =array(
      'uri'=>'http://localhost/'
      // 'location'=>'http://localhost/soap-server.php',
      // 'trace'=>1
    );
    $server=new SoapServer( NULL,$options);
    $server->setClass( 'ServiceFunctions');
    $server->handle();
        