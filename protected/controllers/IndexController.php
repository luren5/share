<?php
    class IndexController extends Controller
    {
        public function actionIndex()
        { 
            $total_records = Resource::model()->count();
            if(!isset($_GET['page'])) {
                $_GET['page'] = 1;
            } 
            $page_info = $this->paging($total_records, $_GET['page']);  //默认最多显示12页，每页10条记录
            $total_page = $page_info['total_page'];
            $cur_page = $page_info['cur_page'];
          
            $user_num = User::model()->count();
            $tags = Tags::model()->findAll('status=:status', array('status' => 1));
            $resources = Resource::model()->findAll(array('order' => 'create_time desc', 'limit' => 8, 'offset' => ($cur_page - 1)*8 ));
            $resource_num = Resource::model()->count();
            $announcements = Announcement::model()->findAll(array('order' => 'create_time desc', 'limit' => 2));
            $comments = Comment::model()->findAll(array('order' => 'create_time desc', 'limit' => 10));

            $this->render('index', array(
                'cur_page' => $cur_page,
                'user_num' => $user_num,
                'resource_num' => $resource_num,
                'tags' => $tags,
                'announcements' => $announcements,
                'resources' => $resources,
                'comments' => $comments,
                'total_page' => $total_page,
            ));
        }

        /**
        * This is the action to handle external exceptions.
        */
        public function actionError()
        {
            if($error=Yii::app()->errorHandler->error)
            {
                if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
                else
                    $this->render('error', $error);
            }
        }
    }