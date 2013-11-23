<?php

/**
 * This is the model class for table "resource".
 *
 * The followings are the available columns in table 'resource':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $attachment
 * @property string $remote_resource
 * @property integer $tag_id
 * @property string $contributor
 * @property string $create_time
 */
class Resource extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resource';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required', 'message' => '标题不能为空'),
            array('title', 'length', 'max' => 20, 'message'=> '标题长度不能大于20'),
            array('description', 'required', 'message' => '资源描述不能为空'),
            array('description','length', 'max'=>100,'message'=>'描述内容不能超过100字'),
            array('remote_resource', 'length', 'max'=>120, 'message' => '外部链接长度太长'),
            array('remote_resource', 'match', 'pattern' => '/^(http:\/\/)?(https:\/\/)?([\w\d-]+\.)+[\w-]+(\/[\d\w-.\/?%&=]*)?$/', 'message' => '链接格式不正确'),
            array('contributor', 'length', 'max'=>12),
            array('tag_id', 'required', 'message' => '标签必选'),
            array('tag_id', 'numerical', 'integerOnly'=>true),
			array('attachment', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, attachment, remote_resource, tag_id, contributor, create_time', 'safe', 'on'=>'search'),
		);
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'attachment' => 'Attachment',
			'remote_resource' => 'Remote Resource',
			'tag_id' => 'Tag',
			'contributor' => 'Contributor',
			'create_time' => 'Create Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('remote_resource',$this->remote_resource,true);
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('contributor',$this->contributor,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resource the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
