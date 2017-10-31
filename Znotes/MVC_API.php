<?php
    /**
     * Created by PhpStorm.
     * User: sll
     * Date: 2017/10/27
     * Time: 17:29
     */
    /*
     * 1.简述：

api接口开发，其实和平时开发逻辑差不多；但是也有略微差异；

平时使用mvc开发网站的思路一般是都 由控制器 去 调用模型，模型返回数据，再由控制器把数据放到视图中，展现给用户；

api开发是：使用控制器 去调用模型，模型返回数据，在有控制器 输出 json格式字符串 或者 XML 字符串；

2.逻辑代码：

微型mvc结构 ：controller 控制器，model 模型，view 视图，db类 （访问数据的类）
    */
?>
<?php
    
    class TestController {
        private $db = NULL;//数据库句柄
        
        function __construct () {
            require './db.class.php';
            $this->db = new db();
        }
        
        /**
         * @desc 测试api接口 根据 班级id获取该班级下的所有学员
         * @author wzh
         * @version 1.0
         * @date 2017-02-19
         */
        public function getList () {
            $class_id = (int) $_GET[ 'class_id' ];
            $sql      = " select student_id,student_name,gander from student where class_id = '$class_id' and is_delete = 0 ";
            $list     = $this->db->getAll ( $sql );
            if ( empty( $list ) ) {
                $this->error ( '暂无数据' );
            }
            $data[ 'list' ] = $list;
            $this->jsonReturn ( $data );
        }
        
        /**
         * @desc 返回数据
         * @author wzh
         * @date 2017-02-19
         * @qq 646943067
         */
        private function error ( $message ) {
            $return = array ( 'status' => 500 , /* 返回状态，200 成功，500失败 */
                              'message' => $message , );
            echo json_encode ( $return );
            die;
        }
        
        /**
         * @desc 返回数据
         * @author wzh
         * @date 2017-02-19
         * @qq 646943067
         */
        private function jsonReturn ( $data ) {
            $return = array ( 'status' => 200 , /* 返回状态，200 成功，500失败 */
                              'data' => $data , 'message' => '获取成功' , );
            echo json_encode ( $return );
            die;
        }
        
        /**
         * @desc 测试api接口 获取该学员 是否 已经打卡
         * @author wzh
         * @version 1.0
         * @date 2017-02-19
         * @qq 646943067
         */
        public function getSignStatus () {
            $student_id = (int) $_GET[ 'student_id' ];
            $time       = time ();
            $start_time = strtotime ( date ( 'Y-m-d' , $time ) . ' 00:00:00' );
            $end_time   = $start_time * 3600 * 24;
            $sql        = " select status from student_status where student_id = '$student_id' ";
            $status     = $this->db->getOne ( $sql );
            if ( $status == 1 ) {
                $this->success ( '已打卡' );
            }
            else {
                $this->error ( '未打卡' );
            }
        }
        
        /**
         * @desc 返回数据
         * @author wzh
         * @date 2017-02-19
         * @qq 646943067
         */
        private function success ( $message ) {
            $return = array ( 'status' => 200 , /* 返回状态，200 成功，500失败 */
                              'message' => $message , );
            echo json_encode ( $return );
            die;
        }
        
    }

?>
