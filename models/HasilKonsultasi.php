<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hasil_konsultasi".
 *
 * @property int $id_hasil_konsultasi
 * @property int $hid_konsultasi
 * @property string $hkode_gejala
 * @property int $jawaban
 * @property double $cf_user
 *
 * @property Gejala $kodeGejala
 * @property Konsultasi $konsultasi
 */
class HasilKonsultasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hasil_konsultasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hid_konsultasi', 'hkode_gejala', 'jawaban'], 'required'],
            [['hid_konsultasi'], 'integer'],
            [['cf_user'], 'number'],
            [['hkode_gejala'], 'string', 'max' => 10],
            [['jawaban'], 'string', 'max' => 4],
            [['hkode_gejala'], 'exist', 'skipOnError' => true, 'targetClass' => Gejala::className(), 'targetAttribute' => ['hkode_gejala' => 'kode_gejala']],
            [['hid_konsultasi'], 'exist', 'skipOnError' => true, 'targetClass' => Konsultasi::className(), 'targetAttribute' => ['hid_konsultasi' => 'id_konsultasi']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_hasil_konsultasi' => 'Id Hasil Konsultasi',
            'hid_konsultasi' => 'Id Konsultasi',
            'hkode_gejala' => 'Kode Gejala',
            'jawaban' => 'Jawaban',
            'cf_user' => 'Cf User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeGejala()
    {
        return $this->hasOne(Gejala::className(), ['kode_gejala' => 'hkode_gejala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonsultasi()
    {
        return $this->hasOne(Konsultasi::className(), ['id_konsultasi' => 'hid_konsultasi']);
    }
}
