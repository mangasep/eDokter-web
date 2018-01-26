<?php

namespace app\common\models;

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
            [['ID_USER', 'STATUS', 'STATUS_AKUN'], 'integer'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['NAMA_DOKTER', 'EMAIL', 'USERNAME', 'ALAMAT', 'TEMPAT_LAHIR'], 'string', 'max' => 40],
            [['PASSWORD', 'AGAMA', 'NO_PRAKTEK'], 'string', 'max' => 20],
            [['NO_TELPN'], 'string', 'max' => 12],
            [['SPESIALIS'], 'string', 'max' => 30],
            [['ID_USER'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ID_USER' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DOKTER' => Yii::t('app', 'Id  Dokter'),
            'ID_USER' => Yii::t('app', 'Id  User'),
            'NAMA_DOKTER' => Yii::t('app', 'Nama  Dokter'),
            'EMAIL' => Yii::t('app', 'Email'),
            'USERNAME' => Yii::t('app', 'Username'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'NO_TELPN' => Yii::t('app', 'No  Telpn'),
            'ALAMAT' => Yii::t('app', 'Alamat'),
            'AGAMA' => Yii::t('app', 'Agama'),
            'TEMPAT_LAHIR' => Yii::t('app', 'Tempat  Lahir'),
            'TANGGAL_LAHIR' => Yii::t('app', 'Tanggal  Lahir'),
            'NO_PRAKTEK' => Yii::t('app', 'No  Praktek'),
            'SPESIALIS' => Yii::t('app', 'Spesialis'),
            'STATUS' => Yii::t('app', 'Status'),
            'STATUS_AKUN' => Yii::t('app', 'Status  Akun'),
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
}
