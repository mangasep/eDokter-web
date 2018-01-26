<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $role;
    public $password;
    public $password_repeat;


    /**
     * @inheritdoc
     */ 
    public function rules()
    {
        return [
            
            [['username'], 'trim'],
            [['username','role','password','password_repeat'], 'required'],
            [['username'], 'unique', 'targetClass' => User::className(),'targetAttribute' => ['username'], 'message' => 'This username has already been taken.'],
            [['username'], 'string', 'min' => 2, 'max' => 20],
            

            [['role'], 'integer'],
            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique', 'targetClass' => User::className(),'targetAttribute' => ['email'], 'message' => 'This email has already been taken.'],

            [['password','password_repeat'], 'required'],
            [['password'], 'string', 'min' => 6,'max'=> 20],
            [['password_repeat'], 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],  
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
