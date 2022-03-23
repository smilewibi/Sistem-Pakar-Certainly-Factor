<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnosa".
 *
 * @property string $kode_diagnosa
 * @property string $nama_diagnosa
 * @property string $solusi
 *
 * @property Konsultasi[] $konsultasis
 * @property Pakar[] $pakars
 */
class Diagnosa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_diagnosa', 'nama_diagnosa', 'solusi'], 'required'],
            [['solusi'], 'string'],
            [['kode_diagnosa'], 'string', 'max' => 10],
            [['nama_diagnosa'], 'string', 'max' => 255],
            [['kode_diagnosa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_diagnosa' => 'Kode',
            'nama_diagnosa' => 'Nama Diagnosa',
            'solusi' => 'Solusi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKonsultasis()
    {
        return $this->hasMany(Konsultasi::className(), ['kkode_diagnosa' => 'kode_diagnosa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPakars()
    {
        return $this->hasMany(Pakar::className(), ['pkode_diagnosa' => 'kode_diagnosa']);
    }
}
