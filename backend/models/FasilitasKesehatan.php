<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "fasilitas_kesehatan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
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
	public $kecnama;
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
            [['nama', 'alamat'], 'required'],
            [['kecamatan_id'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'alamat' => Yii::t('app', 'Alamat'),
            'kecamatan_id' => Yii::t('app', 'Kecamatan ID'),
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
