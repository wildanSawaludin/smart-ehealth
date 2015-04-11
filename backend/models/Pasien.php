<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property integer $id
 * @property string $nama
 * @property string $tempat_lahir
 * @property string $tgl_lahir
 * @property string $jenkel
 * @property string $goldar
 * @property string $agama
 * @property string $pekerjaan
 * @property string $warga_negara
 * @property string $alamat
 * @property string $notelp
 * @property string $nama_ayah
 * @property string $pekerjaan_ayah
 * @property string $nama_ibu
 * @property string $pekerjaan_ibu
 * @property string $marital_status
 * @property string $nama_pasangan
 * @property string $pekerjaan_pasangan
 *
 * @property Registrasi[] $registrasis
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
            [['nama', 'tempat_lahir', 'tgl_lahir', 'jenkel', 'goldar', 'agama', 'pekerjaan', 'warga_negara', 'alamat', 'notelp'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['jenkel', 'goldar', 'agama', 'pekerjaan', 'warga_negara', 'alamat', 'pekerjaan_ayah', 'pekerjaan_ibu', 'marital_status', 'pekerjaan_pasangan'], 'string'],
            [['nama', 'nama_ayah', 'nama_ibu', 'nama_pasangan'], 'string', 'max' => 25],
            [['tempat_lahir'], 'string', 'max' => 30],
            [['notelp'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'jenkel' => 'Jenis Kelamin',
            'goldar' => 'Golongan Darah',
            'agama' => 'Agama',
            'pekerjaan' => 'Pekerjaan',
            'warga_negara' => 'Warga Negara',
            'alamat' => 'Alamat',
            'notelp' => 'No Telepon',
            'nama_ayah' => 'Nama Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'nama_ibu' => 'Nama Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'marital_status' => 'Status Pernikahan',
            'nama_pasangan' => 'Nama Pasangan',
            'pekerjaan_pasangan' => 'Pekerjaan Pasangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasis()
    {
        return $this->hasMany(Registrasi::className(), ['pasienId' => 'id']);
    }

    public function getUsia() {
        try {
            $birthDay = new \DateTime($this->tgl_lahir);
            $now = new \DateTime();
            $diff = $now->diff($birthDay);
            return $diff->format('%y'); 
        }
        catch(\Exception $e) {
            return 0;
        }
    }
}
