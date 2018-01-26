<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $ID_DOKTER
 * @property int $ID_USER
 * @property string $NAMA_DOKTER
 * @property string $EMAIL
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $NO_TELPN
 * @property string $ALAMAT
 * @property string $AGAMA
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property string $NO_PRAKTEK
 * @property string $SPESIALIS
 * @property int $STATUS
 * @property int $STATUS_AKUN
 *
 * @property DaftarPeriksa[] $daftarPeriksas
 * @property User $uSER
 * @property JadwalDokter[] $jadwalDokters
 * @property Periksa[] $periksas
 */
class DokterUser extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_DOKTER = 0;
    const ROLE_PASIEN = 1;
    public $PASSWORD_REPEAT;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USERNAME'], 'required'],
            [['USERNAME'], 'trim'],
            [['ID_USER', 'STATUS'], 'integer'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['EMAIL'], 'email'],
            [['NAMA_DOKTER', 'EMAIL', 'USERNAME', 'ALAMAT', 'TEMPAT_LAHIR'], 'string', 'max' => 40],
            [['AGAMA', 'NO_PRAKTEK'], 'string', 'max' => 20],
            [['USERNAME'], 'string', 'min' => 2,'max' => 20],
            [['PASSWORD'], 'string', 'min' => 6,'max' => 20],
            [['NO_TELPN'], 'string', 'max' => 12],
            [['SPESIALIS'], 'string', 'max' => 30],
            [['ID_USER'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ID_USER' => 'id']],
            [['USERNAME'], 'unique', 'targetClass' => DokterUser::className(),'targetAttribute' => ['USERNAME'], 'message' => 'This username has already been taken.'],
            [['EMAIL'], 'unique', 'targetClass' => DokterUser::className(),'targetAttribute' => ['EMAIL'], 'message' => 'This email has already been taken.'],
            [['PASSWORD_REPEAT'], 'compare', 'compareAttribute'=>'PASSWORD', 'message'=>"Passwords don't match"],
            ['STATUS_AKUN', 'default', 'value' => self::STATUS_ACTIVE],
            ['STATUS_AKUN', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['STATUS', 'default', 'value' => 0],
            ['STATUS', 'in', 'range' => [self::ROLE_DOKTER, self::ROLE_PASIEN]],  
        ];
    }
 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DOKTER' => 'Id  Dokter',
            'ID_USER' => 'Id  User',
            'NAMA_DOKTER' => 'Nama  Dokter',
            'EMAIL' => 'Email',
            'USERNAME' => 'Username',
            'PASSWORD' => 'Password',
            'NO_TELPN' => 'No  Telpn',
            'ALAMAT' => 'Alamat',
            'AGAMA' => 'Agama',
            'TEMPAT_LAHIR' => 'Tempat  Lahir',
            'TANGGAL_LAHIR' => 'Tanggal  Lahir',
            'NO_PRAKTEK' => 'No  Praktek',
            'SPESIALIS' => 'Spesialis',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaftarPeriksas()
    {
        return $this->hasMany(DaftarPeriksa::className(), ['ID_DOKTER' => 'ID_DOKTER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(User::className(), ['id' => 'ID_USER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalDokters()
    {
        return $this->hasMany(JadwalDokter::className(), ['ID_DOKTER' => 'ID_DOKTER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriksas()
    {
        return $this->hasMany(Periksa::className(), ['ID_DOKTER' => 'ID_DOKTER']);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->PASSWORD);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    
    
    public function setPassword($password)
    {
        $this->PASSWORD = Yii::$app->security->generatePasswordHash($password);
    }


}
