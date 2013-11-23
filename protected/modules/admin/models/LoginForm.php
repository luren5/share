<?php
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	private $_identity;

	public function rules()
	{
		return array(
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			//array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
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

	public function authenticate($attribute,$params)
	{
		$this->_identity=new AdministratorIdentity($this->username,$this->password);
		if(!$this->_identity->authenticate())
			$this->addError('password','Incorrect username or password.');
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new AdministratorIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
        
		if($this->_identity->errorCode ===  AdministratorIdentity::ERROR_NONE)
		{
			//$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity);
            Yii::app()->user->name = $this->username;
			return true;
		}
		else
			return false;
	}
}
