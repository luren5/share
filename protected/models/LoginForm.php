<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	//public $rememberMe;
	private $_identity = null;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
            array('username', 'required', 'message' => '用户名不能为空'),
            array('password', 'required', 'message' => '密码不能为空'),
        );
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			//'rememberMe'=>'Remember me next time',
		);
	}

	public function login()
	{
        if(!$this->hasErrors()) {
            $this->_identity=new UserIdentity($this->username,$this->password);
            if($this->_identity->authenticate() === UserIdentity::ERROR_NONE) {
                Yii::app()->user->setState('identity','user');//设为已登录 
                Yii::app()->user->setState('name',$this->username);//设为已登录 
                /*
                $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
                Yii::app()->user->login($this->_identity,$duration);
                */
                return true;
            } else {
                $this->addError('wrongpassword','用户名或密码错误');
            }
        }
	}
}
