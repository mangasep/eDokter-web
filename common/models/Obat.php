<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $ID_OBAT
 * @property string $NAMA_OBAT
 * @property int $HARGA
 * @property string $PRODUKSI
 * @property int $JUMLAH_STOK
 * @property string $TANGGAL_MASUK
 *
 * @property Resep[] $reseps
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_OBAT','TANGGAL_MASUK','HARGA', 'JUMLAH_STOK','PRODUKSI'], 'required'],
            [['HARGA', 'JUMLAH_STOK'], 'integer'],
            [['TANGGAL_MASUK'], 'safe'],
            [['NAMA_OBAT'], 'string', 'max' => 40],
            [['PRODUKSI'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_OBAT' => 'Id  Obat',
            'NAMA_OBAT' => 'Nama  Obat',
            'HARGA' => 'Harga',
            'PRODUKSI' => 'Produksi',
            'JUMLAH_STOK' => 'Jumlah  Stok',
            'TANGGAL_MASUK' => 'Tanggal  Masuk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReseps()
    {
        return $this->hasMany(Resep::className(), ['ID_OBAT' => 'ID_OBAT']);
    }
}
