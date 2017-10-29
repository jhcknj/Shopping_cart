<?php
    namespace MYPDO;
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/9/6
     * Time: 20:58
     */
?>
<?php
    use Exception;
    use PDO;
    use PDOException;
    use PDOStatement;
    
    class  mysqlpdo {
        private static $pdo = NULL;
        private        $errorcode;
        private        $sql;
        
        function __construct () {
            if ( self::$pdo != NULL ) return;
            //$charset = 'utf8';
            $dbms   = 'mysql';//数据库类型
            $host   = 'localhost';//数据库主机名
            $dbName = 'scart';//数据库名称
            $dsn    = "$dbms:host=$host;dbname=$dbName";//数据源名称  mysql:host='localhost';dbname='froum'
            $user   = 'sll';
            $pass   = '123';
            
            try {
                self::$pdo = new PDO( $dsn , $user , $pass , array ( PDO::ATTR_PERSISTENT => TRUE ) );//初始化一个PDO对象,并设定持续性连接
                //throw new Exception('Connect to mysql failed',42);//throw 抛出的对象
            } catch ( PDOException $e ) {//传递给catch块的对象,也是catch块捕获的对象
                die( "Exception " . $e->getCode () . ":" . $e->getMessage () . "<br>"   //$e->getMessage(),将获得新建Excepetion时,的第一个参数的值,string $message = "",getCode(),也将获得初始化时的code,
                    . "in" . $e->getFile () . "on line" . $e->getLine () . "<br>" );//getMessage 能获取到哪些异常???,即Exception 类构造函数的第一个参数
            }
        }
        
        public function LastInsertId () {
            return self::$pdo->lastInsertId ();
        }
        
        /**
         * @param $tablesName
         * @param $fields_values
         *
         * @return bool
         */
        function insert ( $tablesName , $fields_values ) {
            //LOAD DATA INFILE "filename" INTO TABLE "tablename";
            $values = ' VALUE ';
            $values .= '(' . str_repeat ( '?,' , count ( $fields_values ) - 1 ) . '?)';
            $fields    = '(' . $this->_implode_fields ( $fields_values ) . ')';//插入的字段
            $this->sql = <<<SQL
INSERT INTO {$tablesName} {$fields} {$values};
SQL;
            $values    = array_values ( $fields_values );
            return $this->executeBool ( $this->sql , $values );
        }
        
        
        //    private function  _implode_where($array){//大写的SQL关键字看后加引号
        //        return str_repeat(count($array),implode('=? AND ',array_keys($array))."=? ");
        //    }
        
        private function _implode_fields ( $fields ) {
            return " " . implode ( ',' , array_keys ( $fields ) ) . " ";
        }
        
        /**
         * @param $sql
         * @param null $value
         *
         * @return bool
         */
        public function executeBool ( $sql , $value = NULL ) {
            
            try {
                if ( ! is_array ( $value ) && $value != NULL ) {//单一对象
                    $value = [ $value ];
                }
                
                $result  = self::$pdo->prepare ( $sql );//防注入
                $success = $result->execute ( $value );
                
            } catch ( Exception $e ) {
                echo "语句错误:" . $e->getMessage () . "<br>" . $this->errorcode = $e->getCode () . "<br>";
                return FALSE;
            }
            
            return $success;
        }
        
        /**
         * @param $talbename
         * @param $fields
         * @param $fields_values
         *
         * @return bool
         */
        function insert_multiple ( $talbename , $fields , $fields_values ) {
            $values    = ' VALUES ';
            $tmp1      = "(" . str_repeat ( '?,' , count ( $fields ) - 1 ) . "?)";
            $tmp2      = $tmp1 . ",";
            $value     = $values . str_repeat ( $tmp2 , count ( $fields_values ) / count ( $fields ) - 1 ) . $tmp1;
            $fields    = " (" . $this->_implode_values ( $fields ) . ")";
            $this->sql = <<<SQL
INSERT INTO {$talbename}{$fields}{$value};
SQL;
            return $this->executeBool ( $this->sql , $fields_values );
        }
        
        private function _implode_values ( $values ) {
            return " " . implode ( ',' , array_values ( $values ) ) . " ";
        }
        
        /**
         * @param $tableName
         * @param null $where
         * @param null $in
         *
         * @return bool
         */
        function delete ( $tableName , $where = NULL , $in = NULL ) {
            //sql="DELETE FROM user WHERE id=6 AND　id IN(1,2,3)";
            $haswhere = FALSE;
            $values   = [];
            if ( $where != NULL ) {
                $where_sql = ' WHERE ' . $this->_implode_where ( $where );
                $values    = array_merge ( $values , array_values ( $where ) );
                $haswhere  = TRUE;
            }
            else {
                $where_sql = NULL;
            }
            if ( $in != NULL ) {
                if ( $haswhere ) {
                    $in_sql = ' AND ';
                }
                else {
                    $in_sql = ' WHERE ';
                }
                $in_values = current ( $in );
                if ( ! is_array ( $in_values ) ) {
                    $in_values = [ $in_values ];
                }
                $tmp = '(' . str_repeat ( '?,' , count ( $in_values ) - 1 ) . '?)';
                $in_sql .= key ( $in ) . ' IN ' . $tmp;
                $values = array_merge ( $values , $in_values );
            }
            else {
                $in_sql = NULL;
            }
            $this->sql = <<<SQL
DELETE FROM {$tableName}{$where_sql}{$in_sql};
SQL;
            return $this->executeBool ( $this->sql , $values );
            
        }
        
        public function _implode_where ( $array ) {
            $array_values = array_values ( $array );//对$where数组值进行判断
            if ( is_array ( end ( $array_values ) ) ) {
                //包含IN子句时,写在数组的最后
                if ( empty( prev ( $array_values ) ) ) {
                    $tmp = key ( $array ) . " IN ";
                    $tmp .= "(" . str_repeat ( "?," , count ( end ( $array_values ) ) - 1 ) . "?)";
                    return $tmp;
                }
                else {
                    //  name=? AND id IN(?,?,?,?);
                    $tmp = "(" . str_repeat ( "?," , count ( end ( $array_values ) ) - 1 ) . "?)";
                    return implode ( '=? AND ' , array_keys ( $array ) ) . " IN " . $tmp;
                }
                
            }
            else {
                //没有IN
                return implode ( '=? AND ' , array_keys ( $array ) ) . "=? ";
            }
        }
        
        /**
         * @param $tableName
         * @param $set
         * @param null $where
         * @param null $in
         *
         * @return bool
         */
        function update ( $tableName , $set , $where = NULL , $in = NULL ) {
            //UPDATE user SET passwprd='999',name='sll' WHERE id=65  AND id IN(4,1);
            $haswhere = FALSE;
            $sql_set  = ' SET ' . $this->_implode_set ( $set );
            $values   = array_values ( $set );
            if ( $where != NULL ) {
                $sql_where = ' WHERE ' . $this->_implode_where ( $where );
                $values    = array_merge ( $values , array_values ( $where ) );
                $haswhere  = TRUE;
            }
            else {
                $sql_where = NULL;
            }
            if ( $in != NULL ) {
                if ( $haswhere ) {
                    $sql_in = ' AND ';
                }
                else {
                    $sql_in = ' WHERE ';
                }
                $values_in = current ( $in );
                if ( ! is_array ( $values_in ) ) {
                    $values_in = [ $values_in ];
                }
                $tmp = '(' . str_repeat ( '?,' , count ( $values_in ) - 1 ) . '?)';
                $sql_in .= key ( $in ) . ' IN ' . $tmp;
                $values = array_merge ( $values , $values_in );
            }
            else {
                $sql_in = NULL;
            }
            $this->sql = <<<SQL
UPDATE {$tableName}{$sql_set}{$sql_where}{$sql_in};
SQL;
            return $this->executeBool ( $this->sql , $values );
        }
        
        private function _implode_set ( $array ) {
            return " " . implode ( '=?, ' , array_keys ( $array ) ) . "=? ";
        }
        
        function select ( $tableName , $fields = NULL , $where = NULL , $extra = NULL , $limit = NULL ) {
            return $this->select_link ( $tableName , $fields , NULL , $where , $extra , $limit );
        }
        
        /**
         * @param $tableName
         * @param null $fields
         * @param null $where_link
         * @param null $where
         * @param null $extra
         * @param null $limit
         *
         * @return bool|PDOStatement
         */
        function select_link ( $tableName , $fields = NULL , $where_link = NULL , $where = NULL , $extra = NULL , $limit = NULL ) {
            //处理where ,
            //TODO $where !=null,优化
            $values    = [];
            $where_sql = "";
            if ( $where_link == NULL ) {
                if ( $where != NULL ) {
                    $where_sql = ' WHERE ' . $this->_implode_where ( $where );
                    array_walk_recursive ( $where , function ( $value ) use ( &$values ) {
                        array_push ( $values , $value );
                    } );
                }
            }
            else {
                $where_sql = ' WHERE ';
                list( $key , $value ) = each ( $where_link );
                if ( ! ( list( $key_next , $value_next ) = each ( $where_link ) ) ) {
                    $where_sql .= "$key_next=$value_next";
                }
                $where_sql .= "$key=$value AND ";
                $key   = $key_next;
                $value = $value_next;
                if ( $where != NULL ) {
                    $where_sql .= $this->_implode_where ( $where );
                    
                    array_walk_recursive ( $array3 , function ( $value ) use ( &$values ) {
                        array_push ( $values , $value );
                    } );
                }
            }
            
            //处理属性
            if ( $fields == NULL ) {
                $field_sql = " * ";
            }
            else if ( ! is_array ( $fields ) ) {
                $field_sql = $fields;
            }
            else {
                $field_sql = $this->_implode_values ( $fields );
            }
            //处理table
            if ( is_array ( $tableName ) ) {
                $table = $this->_implode_values ( $tableName );
            }
            else {
                $table = $tableName;
            }
            //处理limit
            if ( $limit == NULL ) {
                $limit_sql = NULL;
            }
            else {
                $limit_sql = ' LIMIT (?,?)';
                $values    = array_merge ( $values , $limit );
            }
            $this->sql = <<<SQL
SELECT {$field_sql} FROM {$table} {$where_sql}{$extra}{$limit_sql};
SQL;
            return $this->execute ( $this->sql , $values );
            
            
        }
        
        /**
         * @param $sql
         * @param null $value
         *
         * @return bool|PDOStatement
         */
        public function execute ( $sql , $value = NULL ) {
            try {
                $result = self::$pdo->prepare ( $sql );
                $result->execute ( $value );
                $result->setFetchMode ( PDO::FETCH_ASSOC );
            } catch ( Exception $e ) {
                echo "语句错误:" . $e->getMessage () . "<br>" . $this->errorcode = $e->getCode () . "<br>";
                return FALSE;
            }
            return $result;
        }
        
        function getErrocode () {
            return $this->errorcode;
        }
        
        function getSql () {
            return $this->sql;
        }
        
    }

?>
