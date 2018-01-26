<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "daftar_periksa".
 *
 * @property int $ID_DAFTAR
 * @property int $ID_PASIEN
 * @property int $ID_DOKTER
 * @property string $TANGGAL_PERIKAS
 * @property string $KELUHAN
 * @property int $STATUS
 * @property string $WAKTU_DAFTAR
 * @property int $ID_URUT
 *
 * @property Pasien $pasien
 * @property Dokter $dokter
 * @property UrutPeriksa $urut
 */
class DaftarPeriksa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'daftar_periksa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PASIEN', 'ID_DOKTER'], 'required'],
            [['ID_PASIEN', 'ID_DOKTER', 'STATUS', 'ID_URUT'], 'integer'],
            [['TANGGAL_PERIKAS', 'WAKTU_DAFTAR'], 'safe'],
            [['KELUHAN'], 'string'],
            [['ID_PASIEN'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::className(), 'targetAttribute' => ['ID_PASIEN' => 'ID_PASIEN']],
            [['ID_DOKTER'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::className(), 'targetAttribute' => ['ID_DOKTER' => 'ID_DOKTER']],
            [['ID_URUT'], 'exist', 'skipOnError' => true, 'targetClass' => UrutPeriksa::className(), 'targetAttribute' => ['ID_URUT' => 'ID_URUT']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_DAFTAR' => 'Id  Daftar',
            'ID_PASIEN' => 'Nama Pasien',
            'ID_DOKTER' => 'Nama Dokter',
            'TANGGAL_PERIKAS' => 'Tanggal  Periksa',
            'KELUHAN' => 'Keluhan',
            'STATUS' => 'Status',
            'WAKTU_DAFTAR' => 'Waktu  Daftar',
            'ID_URUT' => 'Nomor Antri',
        ];
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
    public function getDOKTER()
    {
        return $this->hasOne(Dokter::className(), ['ID_DOKTER' => 'ID_DOKTER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getURUT()
    {
        return $this->hasOne(UrutPeriksa::className(), ['ID_URUT' => 'ID_URUT']);
    }
    public function getToken ($id)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT token.token from token WHERE id_pasien = '$id' LIMIT 1");

        return $result = $command->queryScalar();
    }

    public function getId ($id)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT ID_PASIEN from daftar_periksa WHERE ID_DAFTAR = '$id'");

        return $result = $command->queryScalar();
    }

    public function getNomorUrut ($id)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT urut_periksa.NO_URUT from daftar_periksa,urut_periksa WHERE daftar_periksa.ID_DAFTAR = '$id' AND urut_periksa.ID_URUT = daftar_periksa.ID_URUT");

        return $result = $command->queryScalar();
    }
}
