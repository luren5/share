<?php

/**
 * This is the model class for table "feedback_reply".
 *
 * The followings are the available columns in table 'feedback_reply':
 * @property integer $id
 * @property integer $feedback_id
 * @property string $reply_content
 * @property string $reply_to
 * @property string $reply_to_email
 * @property string $reply_from
 * @property string $create_time
 */
class FeedbackReply extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'feedback_reply';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('feedback_id, reply_content, reply_to, reply_to_email, reply_from, create_time', 'required'),
			array('feedback_id', 'numerical', 'integerOnly'=>true),
			array('reply_content', 'length', 'max'=>100),
			array('reply_to, reply_from', 'length', 'max'=>10),
			array('reply_to_email', 'length', 'max'=>24),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, feedback_id, reply_content, reply_to, reply_to_email, reply_from, create_time', 'safe', 'on'=>'search'),
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
			'feedback_id' => 'Feedback',
			'reply_content' => 'Reply Content',
			'reply_to' => 'Reply To',
			'reply_to_email' => 'Reply To Email',
			'reply_from' => 'Reply From',
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
		$criteria->compare('feedback_id',$this->feedback_id);
		$criteria->compare('reply_content',$this->reply_content,true);
		$criteria->compare('reply_to',$this->reply_to,true);
		$criteria->compare('reply_to_email',$this->reply_to_email,true);
		$criteria->compare('reply_from',$this->reply_from,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FeedbackReply the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
