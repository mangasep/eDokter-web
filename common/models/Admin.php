<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $ID_ADMIN
 * @property int $ID_USER
 * @property string $NAMA_ADMIN
 * @property string $EMAIL
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $NO_TELPN
 * @property string $ALAMAT
 * @property string $AGAMA
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property int $STATUS
 *
 * @property User $uSER
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_USER'], 'required'],
            [['ID_USER', 'STATUS'], 'integer'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['NAMA_ADMIN', 'EMAIL', 'USERNAME', 'PASSWORD', 'ALAMAT', 'TEMPAT_LAHIR'], 'string', 'max' => 40],
            [['NO_TELPN'], 'string', 'max' => 12],
            [['AGAMA'], 'string', 'max' => 20],
            [['ID_USER'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ID_USER' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_ADMIN' => 'Id  Admin',
            'ID_USER' => 'Id  User',
            'NAMA_ADMIN' => 'Nama  Admin',
            'EMAIL' => 'Email',
            'USERNAME' => 'Username',
            'PASSWORD' => 'Password',
            'NO_TELPN' => 'No  Telpn',
            'ALAMAT' => 'Alamat',
            'AGAMA' => 'Agama',
            'TEMPAT_LAHIR' => 'Tempat  Lahir',
            'TANGGAL_LAHIR' => 'Tanggal  Lahir',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['id' => 'ID_USER']);
    }
}
