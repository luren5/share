<?php
    /*
     * 
     * 
     * 
     * 这里创建一个数据模型
     * 模型里面有两个方法，缺一个不可
     * 1、model()创建一个模型对象,这是一个静态的方法
     * 2、tableName()返回当前数据表的名字
     */ 

     class Goods extends CActiveRecord {  
         //父类是活跃记录的意思，将数据表的内容以类的形式展现
         //你可以到父类去查看原有的方法，并直接调用
         public static function model($className = __CLASS__) {
             return parent::model($callName);
         }
         
         public function tableName() {
             return '{{goods}}';  
             /*这里套两个大括号可以帮我们关联数据库的表
              * 当表有前缀的时候，这里非常有用
              * 因为如果表的前缀都改的的话如果写死了
              * 那么所有模型的这个方法都得重写
              * 表前缀是在config/main.php里面设置
              */
         }
         
         public function attributeLabels() {
             return array(
                 'goods_name' => '商品名称',
                 'goods_price' => '商品价格',
                 'goods_color' => '商品颜色'
                 //通过以上方法就可以在表单域的前面的名称为此处设置的 
                 );
         }
         
         public function rules() {
             //这个方法是对表单数据就进行后端验证
             return array(
                 array('username', 'required', 'message' => '用户名不能为空'),
                 array('username', 'unique', 'message' => '该用户名已经存在了'),
                 array('password', 'required', 'message' => '密码不能为空'),
                 array('username', 'compareA', 'message' => '两次密码不一致'),
                 array('user_email', 'email','allowEmpty' => false, 'message' => '邮箱格式不正确'),
                 array('user_qq', 'match', 'pattern' => '/^[1-9]\d{4,11}$/', 'message' => 'QQ格式不正确'),//验证扣扣，5-12，且非0开头
                 array('user_xueli', 'in', 'range' => array(2,3,4,5), 'message' => '学历必须选'),//值只能是枚举型
                 array('array_hobby', 'check_hobby'),
                 //增加自定义验证方法
                 //如果没有给具体规则给个safe就好了
                 
                 
                );
         }
     
         private function check_hobby() {
             print_r($this->hobby);
             if(strlen($this->hobby) < 3) {
                 $this->addError('user_hobby', '爱好必须选');             }
         }
     }
     
     //labelEx 加*
     //表单rules(),可自定义验证方法，也可以用系统已经有的