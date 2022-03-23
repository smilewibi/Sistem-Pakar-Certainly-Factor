<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aturan".
 *
 * @property int $id_aturan
 * @property string $akode_gejala
 * @property string $ya
 * @property string $tidak
 * @property string $cfuser
 *
 * @property Gejala $kodeGejala
 * @property HasilKonsultasi[] $hasilKonsultasis
 */
class Aturan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aturan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['akode_gejala', 'ya', 'tidak'], 'required'],
            [['cfuser'], 'number'],
            [['akode_gejala'], 'string', 'max' => 10],
            [['ya', 'tidak'], 'string', 'max' => 255],
            [['akode_gejala'], 'exist', 'skipOnError' => true, 'targetClass' => Gejala::className(), 'targetAttribute' => ['kode_gejala' => 'kode']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aturan' => 'Id Aturan',
            'akode_gejala' => 'Kode Gejala',
            'ya' => 'Ya',
            'tidak' => 'Tidak',
            'cfuser' => 'CF User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGejala1()
    {
        return $this->hasOne(Gejala::className(), ['kode_gejala' => 'akode_gejala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHasilKonsultasis()
    {
        return $this->hasMany(HasilKonsultasi::className(), ['id_aturan' => 'id_aturan']);
    }
}
