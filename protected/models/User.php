<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $status
 * @property string $create_time
 */
class User extends CActiveRecord
{
    public $repassword;
    public $varifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
        return array(
                array('username', 'required', 'message' => '用户名不能为空'),
                array('username', 'length', 'max' => 24, 'message' => '用户名长度不能超过24'),
                array('username', 'unique', 'message' => '该用户名已经被注册'),
                array('password', 'required', 'message' => '密码不能为空'),
                array('password', 'length', 'min' => 6,'max' => 15,'message' => '密码长度应该在6-15位之间'),
                array('repassword', 'compare', 'compareAttribute' => 'password', 'message'=> '两次密码不一致'),
                array('email', 'email','allowEmpty' => false, 'message' => '邮箱格式不正确'),
                array('varifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message' => '验证码错误'),
                //array( 'username, email, status, create_time', 'safe', 'on'=>'search'),
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

    public function beforeSave() {
        if(parent::beforeSave()){
            if($this->isNewRecord){
                $this->password = md5($this->password);  //这里在用户修改密码的过程中可能会出问题
            }
            return true;
        }else{   
            return false;
        }
    }
    
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'status' => 'Status',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
