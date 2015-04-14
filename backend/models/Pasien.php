<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property integer $id
 * @property integer $user_id
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
 * @property User $user
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
            [['notelp'], 'string', 'max' => 15],
            [['nama', 'nama_ayah', 'nama_ibu', 'nama_pasangan'], 'string', 'max' => 25],
            [['tempat_lahir'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'no_rm' => Yii::t('app', 'No Rm'),
            'nama' => Yii::t('app', 'Nama'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tgl_lahir' => Yii::t('app', 'Tgl Lahir'),
            'jenkel' => Yii::t('app', 'Jenkel'),
            'goldar' => Yii::t('app', 'Goldar'),
            'agama' => Yii::t('app', 'Agama'),
            'pekerjaan' => Yii::t('app', 'Pekerjaan'),
            'warga_negara' => Yii::t('app', 'Warga Negara'),
            'alamat' => Yii::t('app', 'Alamat'),
            'notelp' => Yii::t('app', 'Notelp'),
            'nama_ayah' => Yii::t('app', 'Nama Ayah'),
            'pekerjaan_ayah' => Yii::t('app', 'Pekerjaan Ayah'),
            'nama_ibu' => Yii::t('app', 'Nama Ibu'),
            'pekerjaan_ibu' => Yii::t('app', 'Pekerjaan Ibu'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'nama_pasangan' => Yii::t('app', 'Nama Pasangan'),
            'pekerjaan_pasangan' => Yii::t('app', 'Pekerjaan Pasangan'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getRegistrasis()
    {
        return $this->hasMany(Registrasi::className(), ['pasien_id' => 'id']);
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