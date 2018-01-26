<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resep".
 *
 * @property int $ID_RESEP
 * @property string $TOTAL_HARGA
 * @property int $ID_OBAT
 * @property int $ID_PERIKSA
 *
 * @property Pembayaran[] $pembayarans
 * @property Obat $oBAT
 * @property Periksa $pERIKSA
 */
class Resep extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resep';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_OBAT', 'ID_PERIKSA'], 'integer'],
            [['TOTAL_HARGA'], 'string', 'max' => 20],
            [['ID_OBAT'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::className(), 'targetAttribute' => ['ID_OBAT' => 'ID_OBAT']],
            [['ID_PERIKSA'], 'exist', 'skipOnError' => true, 'targetClass' => Periksa::className(), 'targetAttribute' => ['ID_PERIKSA' => 'ID_PERIKSA']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_RESEP' => 'Id  Resep',
            'TOTAL_HARGA' => 'Total  Harga',
            'ID_OBAT' => 'Id  Obat',
            'ID_PERIKSA' => 'Id  Periksa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::className(), ['ID_RESEP' => 'ID_RESEP']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOBAT()
    {
        return $this->hasOne(Obat::className(), ['ID_OBAT' => 'ID_OBAT']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERIKSA()
    {
        return $this->hasOne(Periksa::className(), ['ID_PERIKSA' => 'ID_PERIKSA']);
    }
}
