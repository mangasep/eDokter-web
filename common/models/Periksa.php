<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "periksa".
 *
 * @property int $ID_PERIKSA
 * @property string $DIAGNOSA
 * @property string $CATATAN
 * @property int $ID_DOKTER
 * @property int $ID_PASIEN
 * @property int $ID_DAFTAR
 * @property int $STATUS
 *
 * @property Pembayaran[] $pembayarans
 * @property Dokter $dOKTER
 * @property Pasien $pASIEN
 * @property DaftarPeriksa $dAFTAR
 * @property Resep[] $reseps
 */
class Periksa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periksa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DIAGNOSA', 'CATATAN'], 'string'],
            [['ID_DOKTER', 'ID_PASIEN', 'ID_DAFTAR','STATUS'], 'integer'],
            [['ID_DOKTER'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['ID_DOKTER' => 'ID_DOKTER']],
            [['ID_PASIEN'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['ID_PASIEN' => 'ID_PASIEN']],
            [['ID_DAFTAR'], 'exist', 'skipOnError' => true, 'targetClass' => DaftarPeriksa::className(), 'targetAttribute' => ['ID_DAFTAR' => 'ID_DAFTAR']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PERIKSA' => 'Id  Periksa',
            'DIAGNOSA' => 'Diagnosa',
            'CATATAN' => 'Catatan',
            'ID_DOKTER' => 'Nama Dokter',
            'ID_PASIEN' => 'Nama  Pasien',
            'ID_DAFTAR' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::className(), ['ID_PERIKSA' => 'ID_PERIKSA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOKTER()
    {
        return $this->hasOne(Dokter::className(), ['ID_DOKTER' => 'ID_DOKTER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPASIEN()
    {
        return $this->hasOne(Pasien::className(), ['ID_PASIEN' => 'ID_PASIEN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDAFTAR()
    {
        return $this->hasOne(DaftarPeriksa::className(), ['ID_DAFTAR' => 'ID_DAFTAR']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReseps()
    {
        return $this->hasMany(Resep::className(), ['ID_PERIKSA' => 'ID_PERIKSA']);
    }
}
