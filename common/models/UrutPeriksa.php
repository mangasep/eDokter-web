<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "urut_periksa".
 *
 * @property int $ID_URUT
 * @property int $NO_URUT
 * @property string $WAKTU_PERIKSA
 *
 * @property DaftarPeriksa[] $daftarPeriksas
 */
class UrutPeriksa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'urut_periksa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO_URUT'], 'integer'],
            [['WAKTU_PERIKSA'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_URUT' => 'Id  Urut',
            'NO_URUT' => 'No  Urut',
            'WAKTU_PERIKSA' => 'Waktu  Periksa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaftarPeriksas()
    {
        return $this->hasMany(DaftarPeriksa::className(), ['ID_URUT' => 'ID_URUT']);
    }
}
