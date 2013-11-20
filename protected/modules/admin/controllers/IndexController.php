<?php
    class IndexController extends Controller{
        function actionHead() {
            $this->renderPartial('head');
        }
        
        function actionLeft() {
            $this->renderPartial('left');
        }
        
        function actionRight() {
            $this->renderPartial('right');
        }
        
        function actionIndex() {
            $this->renderPartial('index');
        }
        
        
        function actionTestdb(){
            //这里来一个数据库连接测试
            print_r(Yii::app()->db);
        }
        
        function actionCreate() {
            //产生一个模型对象
            $goods_model = Goods::model();
            
            $good_info = $goods_model -> find();//这个方法每次只可以查询出一条记录，返回的值是一个对象
            //可以在main里面把CWE....打开，就可以看到运行日志，包括运行的sql语句
            $good_info->name; //可获得相应字段的值
           
            //findAll()  可获得全部表记录的信息
            //findAllBySql(); select * from {{表名}}，注意这里的花括号
            
      
        }
        
        public function actionAdd() {
            //通过模型进行添加数据
            $goods_model = new Goods(); //注册这里创建对象有别于查询
            //对属性进行赋值
            $goods_model->name = '小米2S';
            $goods_model->price = 1799;
            //下面还有很多，不多列举了
            
            if($goods_model->save()) {
                //如果添加成功，则返回true
            }      
        }
        
        public function act1ionUpdate($id) {
            $this->redirect();//这个是页面重定向方法
            
            $goods_model = Goods::model();
            $goods_info = $goods_model() ->findByPk($id);
            $goods_info->name = $name;
            
            
            $goods_info->save();//注意上面的是数据模型调用的，而这里是数据模型对象调用的，不一样的
        }
        
        public function actionDelete($id) {
            $goods_model = Goods::model(); //先获得数据模型对象
            $goods_info = $goods_model -> findByPk($id);  //获取商品的模型对象
            if($goods_info->delete()) {
                echo 'success';
            }
            
            
        }
    }
    
    //一般除了添加用new Goods创建数据模型外，其它的都用Goods::model()来获取
    //new Goods();调用save()时执行insert语句
    //Goods::model()  调用save()时执行update语句