<?php
    
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/25
     * Time: 17:12
     */
    namespace shipping;
    class test1 {
        public $a;
        public $b;
       public $ABC='9876543210';
        
        public function __construct ( $a , $b ) {
            $this->a = $a;
            $this->b = $b;
        }
    
        public function get_property_a () {
            return $this->a;
        }
        
        public function get_property_b () {
            return $this->b;
        }
    }
    