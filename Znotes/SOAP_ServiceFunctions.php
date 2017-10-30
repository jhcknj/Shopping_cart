<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/30
     * Time: 16:46
     */
    
    class ServiceFunctions{
        public function getDisplayName($first_name,$last_name){
            $name=' ';
            $name .=strtoupper(substr( $first_name , 0,1));
            $name.=' '.ucfirst( $last_name);
            return $name;
        }
        public function countwords($paragraph){
            $words=preg_split( '/[.,!?;]+/' , $paragraph);
            return count( $words);
            
        }
    }