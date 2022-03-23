<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "konsultasi".
 *
 * @property int $id_konsultasi
 * @property string $nama_penderita
 * @property string $jenkel
 * @property int $usia_penderita
 * @property string $alamat_penderita
 * @property string $kkode_diagnosa
 * @property double $hasil_cf
 * @property string $tanggal
 * @property int $id_user
 *
 * @property HasilKonsultasi[] $hasilKonsultasis
 * @property Diagnosa $kodeDiagnosa
 */
class Konsultasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konsultasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_penderita', 'jenkel', 'usia_penderita', 'alamat_penderita', 'tanggal'], 'required'],
            [['usia_penderita', 'id_user'], 'integer'],
            [['alamat_penderita'], 'string'],
            [['hasil_cf'], 'number'],
            [['tanggal'], 'safe'],
            [['nama_penderita'], 'string', 'max' => 255],
            [['jenkel'], 'string', 'max' => 12],
            [['kkode_diagnosa'], 'string', 'max' => 10],
            [['kkode_diagnosa'], 'exist', 'skipOnError' => true, 'targetClass' => Diagnosa::className(), 'targetAttribute' => ['kkode_diagnosa' => 'kode_diagnosa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_konsultasi' => 'Id Konsultasi',
            'nama_penderita' => 'Nama Penderita',
            'jenkel' => 'Jenis Kelamin',
            'usia_penderita' => 'Usia Penderita',
            'alamat_penderita' => 'Alamat Penderita',
            'kkode_diagnosa' => 'Kode Diagnosa',
            'hasil_cf' => 'Hasil Cf',
            'tanggal' => 'Tanggal',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHasilKonsultasis()
    {
        return $this->hasMany(HasilKonsultasi::className(), ['id_konsultasi' => 'id_konsultasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeDiagnosa()
    {
        return $this->hasOne(Diagnosa::className(), ['kode_diagnosa' => 'kkode_diagnosa']);
    }
}
