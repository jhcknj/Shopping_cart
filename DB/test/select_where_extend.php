<?php
/**
 * Created by PhpStorm.
 * User: sll
 * Date: 2017/9/24
 * Time: 9:10
 */
?>
<?php
$array1=['class'=>[2,3,4]];
$array2=['id'=>100,'cc'=>[99,98,97]];
$array3=['id'=>32,'class'=>5];

 function  _implode_where($array){//大写的SQL关键字前后加空格
     $array_values=array_values($array);//values
    if(is_array(end($array_values))){
        //最后的值是数组
        if(empty(prev($array_values))){
            //只有一个数组,即id IN(?,?,?,?);
            $tmp=key($array)." IN ";
            $tmp.="(".str_repeat("?,",count(end($array_values))-1)."?)";
            return $tmp;
        }else{
            //  name=? AND id IN(?,?,?,?);
            $tmp="(".str_repeat("?,",count(end($array_values))).")";
            return implode('=? AND ',array_keys($array))." IN ".$tmp;
        }

    }else {
        //最后一个不是数组,即没有IN子句,    name=? AND id=?
        return implode('=? AND ',array_keys($array))."=? ";
    }
}
$t=_implode_where($array3);
echo $t;
?>

