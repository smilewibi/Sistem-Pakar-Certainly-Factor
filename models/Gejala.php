<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gejala".
 *
 * @property string $kode_gejala
 * @property string $nama_gejala
 *
 * @property Aturan[] $aturans
 * @property Pakar[] $pakars
 */
class Gejala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gejala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode_gejala', 'nama_gejala'], 'required'],
            [['kode_gejala'], 'string', 'max' => 10],
            [['nama_gejala'], 'string', 'max' => 255],
            [['kode_gejala'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode_gejala' => 'Kode',
            'nama_gejala' => 'Nama Gejala',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAturans()
    {
        return $this->hasMany(Aturan::className(), ['akode_gejala' => 'kode_gejala']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPakars()
    {
        return $this->hasMany(Pakar::className(), ['pkode_gejala' => 'kode_gejala']);
    }
}
