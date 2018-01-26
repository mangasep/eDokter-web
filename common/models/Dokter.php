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
 *
 * @property DaftarPeriksa[] $daftarPeriksas
 * @property User $uSER
 * @property JadwalDokter[] $jadwalDokters
 * @property Periksa[] $periksas
 */
class Dokter extends \yii\db\ActiveRecord
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
            [['ID_USER'], 'required'],
            [['ID_USER', 'STATUS'], 'integer'],
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
}
