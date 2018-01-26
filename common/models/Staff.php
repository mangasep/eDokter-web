<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "staff".
 *
 * @property int $ID_STAFF
 * @property int $user_id
 * @property string $NAMA_STAFF
 * @property string $EMAIL
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $NO_TELPN
 * @property string $ALAMAT
 * @property string $AGAMA
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property string $JOB_DESC
 * @property int $STATUS
 * @property string $pic
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'staff';
    }

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
            [['user_id'], 'required'],
            [['user_id', 'STATUS'], 'integer'],
            [['TANGGAL_LAHIR', 'created_at', 'updated_at'], 'safe'],
            [['NAMA_STAFF', 'EMAIL', 'USERNAME', 'ALAMAT', 'TEMPAT_LAHIR'], 'string', 'max' => 40],
            [['PASSWORD', 'AGAMA', 'JOB_DESC'], 'string', 'max' => 20],
            [['NO_TELPN'], 'string', 'max' => 12],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['pic'], 'file', 'skipOnEmpty' => false, 'extensions' => ['png', 'jpg','gif'], 'maxSize'=>1024*1024, 'on' => 'update-pic'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_STAFF' => 'Id Staff',
            'user_id' => 'User ID',
            'NAMA_STAFF' => 'Nama Staff',
            'EMAIL' => 'Email',
            'USERNAME' => 'Username',
            'PASSWORD' => 'Password',
            'NO_TELPN' => 'No Telpn',
            'ALAMAT' => 'Alamat',
            'AGAMA' => 'Agama',
            'TEMPAT_LAHIR' => 'Tempat Lahir',
            'TANGGAL_LAHIR' => 'Tanggal Lahir',
            'JOB_DESC' => 'Job Deskripsi',
            'STATUS' => 'Status',
            'pic' => 'Pic',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ]; 
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStaffIdLink() 
    { 
        $url = Url::to(['staff/update', 'ID_STAFF'=>$this->ID_STAFF]); 
        $options = []; 
        return Html::a($this->ID_STAFF, $url, $options); 
    } 


}
