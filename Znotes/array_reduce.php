<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/25
     * Time: 18:01
     */
?>

<?php
    //$array1=['class'=>[2,3,4]];
    $array2 = [ 'id' => 100 , 'cc' => [ 99 , 98 , 97 ] ];
    $array3 = [ 'id' => 32 , 'class' => 5 ];
    //
    //$user = array(
    //    'a' => array(100, 'a1'),
    //    'b' => array(101, 'a2'),
    //    'c' => array(102, 'a3'),
    //    'd' => array(103, 'a4'),
    //    'e' => array(104, 'a5'),
    //);
    //$result = array_reduce($user, 'array_merge', array());
    //print_r($result);
    
    $result = [];
    array_walk_recursive ( $array2 , function ( $value ) use ( &$result ) {
        array_push ( $result , $value );
    } );
    //print_r($result);
    
    
    $fruits = array ( 'sweet' => [ 'apple' , 'banana' ] , 'sour' => 'lemon' );
    
    function test_print ( $item , $key ) {
        echo "$key holds $item " . "<br>";
    }
    
    //array_walk();
    //array_walk_recursive($fruits, 'test_print');
    //array_reduce();
    //array_map();
    //array_column();
    
    print_r ( range ( 1 , 5 ) );
    
    function sum ( $carry , $item ) {
        $carry += $item;
        return $carry;
    }
    
    function product ( $carry , $item ) {
        $carry *= $item;
        return $carry;
    }
    
    $a = array ( 1 , 2 , 3 , 4 , 5 );
    $x = array ();
    
    //var_dump(array_reduce($a, "sum")); // int(15)
    //var_dump(array_reduce($a, "product", 10)); // int(1200), because: 10*1*2*3*4*5
    //var_dump(array_reduce($x, "sum", "No data to reduce")); // string(17) "No data to reduce"
    
    $fruits = array ( "d" => "lemon" , "a" => "orange" , "b" => "banana" , "c" => "apple" );
    
    function test_alter ( &$item1 , $key , $prefix ) {
        $item1 = "$prefix: $item1";
    }
    
    //function test_print($item2, $key)
    //{
    //    echo "$key. $item2<br />\n";
    //}
    
    echo "Before ...: " . "<br>";
    //array_walk($fruits, 'test_print');
    //
    //array_walk($fruits, 'test_alter', 'fruit');
    //echo "... and after: "."<br>";
    //
    //array_walk($fruits, 'test_print');


?>

