<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fasilitas_kesehatan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telepon
 * @property integer $kecamatan_id
 *
 * @property Kecamatan $kecamatan
 * @property Registrasi[] $registrasis
 */
class FasilitasKesehatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fasilitas_kesehatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['kecamatan_id'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 300],
            [['no_telepon'], 'string', 'max' => 20]
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
            'alamat' => 'Alamat',
            'no_telepon' => 'No Telepon',
            'kecamatan_id' => 'Kecamatan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasis()
    {
        return $this->hasMany(Registrasi::className(), ['faskes_id' => 'id']);
    }
}