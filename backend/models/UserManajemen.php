<?php

namespace app\models;
 
use Yii;
use common\models\Staff;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class UserManajemen extends \yii\db\ActiveRecord
{
    public $password_repeat;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['status'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['username'], 'string', 'min' => 2,'max' => 20],
            [['password_hash'], 'string', 'min' => 6],
            [['email'], 'email'],
            [['auth_key'], 'string', 'max' => 32],
            [['password_repeat'], 'compare', 'compareAttribute'=>'password_hash', 'message'=>"Passwords don't match"],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'role' => 'Jabatan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['user_id' => 'id']);
    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    
    
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function beforeSave($insert) {
        if(isset($this->password_hash)) 
            $this->password = Yii::$app->security->generatePasswordHash($password_hash);
        return parent::beforeSave($insert);
    }
}
