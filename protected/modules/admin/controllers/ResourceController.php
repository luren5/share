<?php
class ResourceController extends Controller
{
    public $layout='/layouts/share_admin';
    function filters() {
        return array(
            'accessControl',
        );
    }

    function accessRules() {               
        return array(
            array(
                'allow',
                'actions'=> array('index', 'add', 'delete', 'update', 'keyword'),
                'users' => array('@'),
            ),
            array(
                'deny',
                'actions'=> array('index', 'add', 'delete', 'update', 'keyword'),
                'users' => array('*'),
            ),

        );
    }
    
    public function actionIndex() {
        $total_records = Resource::model()->count();
        if(!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $page_info = $this->paging($total_records, $_GET['page'], 0, 18);
        $total_page = $page_info['total_page'];
        $cur_page = $page_info['cur_page'];
        $resources = Resource::model()->findAll(array('order' => 'create_time desc', 'limit' => 18, 'offset' => ($cur_page - 1)*18 ));
       
        $this->render('index', array(
            'resources' => $resources,
            'cur_page' => $cur_page,
            'total_page' => $total_page,
        ));
    }
    
    public function actionUpdate() {
        
    }
    
    public function actionKeyword() {
        $redis = RedisStorage::getInstance();
        if(isset($_GET['keyword'])) {
            $redis->sRem(RESOURCE_SEARCH_KEY_SETS, $_GET['keyword']);
            $redis->del(RESOURCE_SEARCH_KEY_PREFIX.$_GET['keyword']); 
        }
       
        $keywords = $redis->sMembers(RESOURCE_SEARCH_KEY_SETS);
        $result = array();
        foreach($keywords as $keyword) {
            $lkey = RESOURCE_SEARCH_KEY_PREFIX.$keyword;
            $resources =  $redis->lRange($lkey, 0, -1);
            foreach($resources as &$resource) {
                $resource = unserialize($resource);
                $result[$keyword][] = $resource->id;
            }
        }
        
        $this->render('keyword', array(
            'result' => $result,
        ));     
    }
    
    public function actionDelete() {
        if(isset($_GET['id'])) {
            $resource = Resource::model()->findByPk($_GET['id']);
            $attachment_url = $resource->attachment;
            if($attachment_url) {
                unlink(ATT_URL.$attachment_url);  // 删除附件
            }
            
            // 删除链表中的缓存
            $redis = RedisStorage::getInstance();
            $keys = $redis->sMembers(RESOURCE_SEARCH_KEY_SETS);
            $resource_ser = serialize($resource);
            foreach($keys as $key) {
                if(stristr($model->title, $key)) {
                    $redis->lRem(RESOURCE_SEARCH_KEY_PREFIX.$key, $resource_ser, 0);
                }
            }
                
            Resource::model()->deleteByPk($_GET['id']);
            Comment::model()->deleteAll('resource_id=:resource_id', array(':resource_id' => $_GET['id']));  // 删除所有此资源的评论
        }  
        $this->redirect(array('resource/index'));
    }
}