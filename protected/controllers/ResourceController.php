<?php
    class ResourceController extends Controller
    {

        public function actionIndex()
        {
            $model = new Resource;
            $tags = Tags::model()->findAll();

            if(isset($_POST['Resource'])) {
                if($_FILES['Resource']['error']['attachment'] === 4 && empty($_POST['Resource']['remote_resource'])) {
                    array_push($this->errors, '附件和外部链接必须至少要填一项');
                } 
                if($_FILES['Resource']['error']['attachment'] != 4) {
                    $attachment = CUploadedFile::getInstance($model, 'attachment');
                    if($attachment->getError() != 0) {
                        array_push($this->errors, '上传文件错误');
                    }
                    if($attachment->getSize() > 1024*1024*2) {
                        array_push($this->errors, '文件大小不能超过2M');
                    }
                    $allow_type = array(
                        'image/jpeg',
                        'image/jpg',
                        'image/png', 
                        'image/gif',
                        'image/bmp',
                        'application/kswps',
                        'application/octet-stream'
                        );
                    echo $attachment->getType(); die();
                    
                    if(!in_array($attachment->getType(), $allow_type)) {
                        array_push($this->errors, '文件类型不允许');
                    }

                    if (is_object($attachment) && get_class($attachment)==='CUploadedFile') {
                        if(!file_exists(ATT_URL.date('Ym'))) {
                            mkdir(ATT_URL.date('Ym'), true);
                        }
                        $_POST['Resource']['attachment'] = date('Ym').'/'.time().'.'.$attachment->getExtensionName();
                    } 
                }

                $model->attributes=$_POST['Resource'];
                $model->contributor = '徐欢欢';   //这里为什么不能放到beforeSave里面去
                $model->create_time = date('Y-m-d H:i:s');

                $model->validate();
                if($model->save()) {
                    array_push($this->errors, '分享成功，谢谢您的贡献！点击查看<a href = "'.$this->createUrl('resource/single', array('rid'=> $model->id)).'">'.$this->createUrl('resource/single', array('rid'=> $model->id)).'</a>');
                    if(!empty($_POST['Resource']['attachment'])) {
                        $attachment->saveAs(ATT_URL.$_POST['Resource']['attachment'], true);//附件存储成功
                    }
                } else {
                    $this->errors += $this->assembleErrors($model->getErrors());
                }
            }
            $this->render('index', array('tags' => $tags, 'model'=>$model, 'errors' => $this->errors));
        }

        /**
        * This is the action to handle external exceptions.
        */
        public function actionSingle() {
            if(!isset($_GET['rid'])) {
                $this->redirect(array('index/index'));
            }
            //评论
            if(isset($_POST['content'])) {
                if(!isset(Yii::app()->user->identity)) {
                    array_push($this->errors, '请先登录！');
                } else {
                    $comment = new Comment();
                    $comment->content = $_POST['content'];
                    $comment->author = Yii::app()->user->name;
                    $comment->resource_id = $_GET['rid'];
                    $comment->create_time = date('Y-m-d H:i:s');
                    $comment->validate();
                    if(!$comment->save()) {
                        $this->errors += $this->assembleErrors($comment ->getErrors());
                    }
                }
            }
            
            $resource = Resource::model()->findByPk($_GET['rid']);
            $tag_name = Tags::model()->findByPk($resource->tag_id)->name;
            
            //查找评论
            $total_records = Comment::model()->countByAttributes(array('resource_id' => $_GET['rid']));
            if(!isset($_GET['page'])) {
                $_GET['page'] = 1;
            } 
            $page_info = $this->paging($total_records, $_GET['page'], 12, 8);  //默认最多显示12页，每页8条记录
            $total_page = $page_info['total_page'];
            $cur_page = $page_info['cur_page'];
            $comments = Comment::model()->findAll(array(
                'condition' => 'resource_id=:resource_id',
                'params' => array(':resource_id' =>$_GET['rid'] ),
                'order' => 'create_time desc',
                'limit' => 8,
                'offset' => ($cur_page - 1)*8,
            ));
           
            $this->render('single', array(
                    'resource'=> $resource,
                    'tag_name' => $tag_name,
                    'errors' => $this->errors,
                    'comments' => $comments,
                    'total_page' => $total_page,
                    'cur_page' => $cur_page,
                    'link_argument'  => array('rid' => $_GET['rid']),
                )
            );
        }

        public function actionSearch() {
            if(!empty($_POST['key']) || !empty($_GET['key'])) {
                $key = !empty($_POST['key']) ? $_POST['key'] : $_GET['key'];
                $resources = Resource::model()->findAllBySql("select * from resource where title like :title limit 50",array(':title' => '%'.$key.'%'));
                $total_records = sizeof($resources);
                $total_page = (int)ceil($total_records/10);
                if(!isset($_GET['page'])) {
                    $cur_page = 1;
                } else {
                    if($_GET['page'] > $total_page) {
                        $cur_page = $total_page;
                    } else if($_GET['page'] < 1) {
                        $cur_page = 1;
                    } else {
                        $cur_page = $_GET['page'];
                    }
                }

                $resources = Resource::model()->findAllBySql("select * from resource where title like :title order by create_time desc limit :sta, :limit",array(':title' => '%'.$key.'%', ':sta'=>($cur_page -1)*8, ':limit'=>10));

                $this->render('search', array(
                    'resources' => $resources,
                    'key' => $key,
                    'total_records' => $total_records,
                    'total_page' =>$total_page, 
                    'cur_page' => $cur_page,
                ));
            } else {
                $this->redirect(array('index/index'));
            }

        }


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