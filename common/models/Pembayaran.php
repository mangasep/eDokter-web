<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $ID_PEMBAYARAN
 * @property string $BIAYA_PERIKSA
 * @property string $TOTAL
 * @property int $ID_RESEP
 * @property int $ID_PERIKSA
 * @property string $BAYAR
 * @property string $KEMBALI
 * @property int $STATUS
 *
 * @property Resep $rESEP
 * @property Periksa $pERIKSA
 */

class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_RESEP', 'ID_PERIKSA', 'STATUS'], 'integer'],
            [['ID_PERIKSA','TOTAL'], 'required'],
            [['BIAYA_PERIKSA', 'TOTAL','KEMBALI'],'number'],
            [['BIAYA_PERIKSA', 'TOTAL', 'BAYAR', 'KEMBALI'], 'string', 'max' => 20],
            [['ID_RESEP'], 'exist', 'skipOnError' => true, 'targetClass' => Resep::className(), 'targetAttribute' => ['ID_RESEP' => 'ID_RESEP']],
            [['ID_PERIKSA'], 'exist', 'skipOnError' => true, 'targetClass' => Periksa::className(), 'targetAttribute' => ['ID_PERIKSA' => 'ID_PERIKSA']],
        ];
        
    
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PEMBAYARAN' => 'Id  Pembayaran',
            'BIAYA_PERIKSA' => 'Biaya  Periksa',
            'TOTAL' => 'Biaya Obat',
            //'ID_RESEP' => 'Biaya Obat',
            'ID_PERIKSA' => 'Nama Pasien',
            'BAYAR' => 'Total',
            'KEMBALI' => 'Bayar',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRESEP()
    {
        return $this->hasOne(Resep::className(), ['ID_RESEP' => 'ID_RESEP']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERIKSA()
    {
        return $this->hasOne(Periksa::className(), ['ID_PERIKSA' => 'ID_PERIKSA']);
    }

    public function kembali($bayar,$total)
    {
        $kembali = (int)($bayar-$total);
        return $kembali;
    }
}
