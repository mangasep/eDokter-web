<?php

namespace app\common\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'JOB_DESC', 'pic', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'STATUS'], 'integer'],
            [['TANGGAL_LAHIR', 'created_at', 'updated_at'], 'safe'],
            [['NAMA_STAFF', 'EMAIL', 'USERNAME', 'ALAMAT', 'TEMPAT_LAHIR', 'pic'], 'string', 'max' => 40],
            [['PASSWORD', 'AGAMA', 'JOB_DESC'], 'string', 'max' => 20],
            [['NO_TELPN'], 'string', 'max' => 12],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'NAMA_STAFF' => Yii::t('app', 'Nama  Staff'),
            'EMAIL' => Yii::t('app', 'Email'),
            'USERNAME' => Yii::t('app', 'Username'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'NO_TELPN' => Yii::t('app', 'No  Telpn'),
            'ALAMAT' => Yii::t('app', 'Alamat'),
            'AGAMA' => Yii::t('app', 'Agama'),
            'TEMPAT_LAHIR' => Yii::t('app', 'Tempat  Lahir'),
            'TANGGAL_LAHIR' => Yii::t('app', 'Tanggal  Lahir'),
            'JOB_DESC' => Yii::t('app', 'Job  Desc'),
            'STATUS' => Yii::t('app', 'Status'),
            'pic' => Yii::t('app', 'Pic'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
