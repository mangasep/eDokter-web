<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jadwal_dokter".
 *
 * @property int $ID_JADWAL
 * @property string $WAKTU_MULAI
 * @property string $WAKTU_SELESAI
 * @property int $ID_DOKTER
 *
 * @property Dokter $dOKTER
 */
class JadwalDokter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jadwal_dokter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WAKTU_MULAI', 'WAKTU_SELESAI'], 'safe'],
            [['ID_DOKTER'], 'integer'],
            [['ID_DOKTER'], 'required'],
            [['ID_DOKTER'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['ID_DOKTER' => 'ID_DOKTER']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_JADWAL' => 'Id  Jadwal',
            'WAKTU_MULAI' => 'Waktu  Mulai',
            'WAKTU_SELESAI' => 'Waktu  Selesai',
            'ID_DOKTER' => 'Nama Dokter',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDOKTER()
    {
        return $this->hasOne(Dokter::className(), ['ID_DOKTER' => 'ID_DOKTER']);
    }
}
