<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $ID_PASIEN
 * @property int $ID_USER
 * @property string $NAMA_PASIEN
 * @property string $EMAIL
 * @property string $USERNAME
 * @property string $PASSWORD
 * @property string $NO_TELPN
 * @property string $ALAMAT
 * @property string $AGAMA
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property int $BERAT_BADAN
 * @property int $TINGGI_BADAN
 * @property string $GOL_DARAH
 * @property int $STATUS
 *
 * @property DaftarPeriksa[] $daftarPeriksas
 * @property User $uSER
 * @property Periksa[] $periksas
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_USER','NAMA_PASIEN','NO_TELPN','ALAMAT', 'TEMPAT_LAHIR','BERAT_BADAN', 'TINGGI_BADAN','AGAMA','GOL_DARAH','TANGGAL_LAHIR'], 'required'],
            [['ID_USER', 'BERAT_BADAN', 'TINGGI_BADAN', 'STATUS','NO_TELPN'], 'integer'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['EMAIL'], 'email'],
            [['NAMA_PASIEN', 'EMAIL', 'USERNAME', 'PASSWORD', 'ALAMAT', 'TEMPAT_LAHIR'], 'string', 'max' => 40],
            [['NO_TELPN'], 'string', 'max' => 12],
            [['AGAMA'], 'string', 'max' => 20],
            [['GOL_DARAH'], 'string', 'max' => 2],
            [['ID_USER'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['ID_USER' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PASIEN' => Yii::t('app', 'Id  Pasien'),
            'ID_USER' => Yii::t('app', 'Id  User'),
            'NAMA_PASIEN' => Yii::t('app', 'Nama  Pasien'),
            'EMAIL' => Yii::t('app', 'Email'),
            'USERNAME' => Yii::t('app', 'Username'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'NO_TELPN' => Yii::t('app', 'No  Telpn'),
            'ALAMAT' => Yii::t('app', 'Alamat'),
            'AGAMA' => Yii::t('app', 'Agama'),
            'TEMPAT_LAHIR' => Yii::t('app', 'Tempat  Lahir'),
            'TANGGAL_LAHIR' => Yii::t('app', 'Tanggal  Lahir'),
            'BERAT_BADAN' => Yii::t('app', 'Berat  Badan'),
            'TINGGI_BADAN' => Yii::t('app', 'Tinggi  Badan'),
            'GOL_DARAH' => Yii::t('app', 'Gol  Darah'),
            'STATUS' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDaftarPeriksas()
    {
        return $this->hasMany(DaftarPeriksa::className(), ['ID_PASIEN' => 'ID_PASIEN']);
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
    public function getPeriksas()
    {
        return $this->hasMany(Periksa::className(), ['ID_PASIEN' => 'ID_PASIEN']);
    }
}
