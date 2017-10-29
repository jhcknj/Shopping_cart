<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/24
     * Time: 19:49
     */
    namespace shipping;
    class courier {
        public $name;
        public $home_country;
        public $ABC='123456798';
        
        public function __construct ( $name ) {
            $this->name = $name;
            return TRUE;
        }
        
        public static function getCouriersByCountry ( $country ) {
            //get a list of countriers with their home_country = $country
            //create a courier object for each result
            //return an array of the results
            return $country_list;
        }
        
        public function ship () {
            //sends the parcel to its destination
            return TRUE;
        }
        
        public function get_name () {
            return $this->name;
        }
    }
    