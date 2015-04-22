<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kebiasaan_obat".
 *
 * @property integer $id
 * @property integer $anamnesa_id
 * @property string $nama_obat
 * @property integer $awal_pemakaian_nil
 * @property string $awal_pemakaian_waktu
 * @property integer $lama_pemakaian_nil
 * @property string $lama_pemakaian_waktu
 * @property string $waktu_pemakaian
 *
 * @property Anamnesa[] $anamnesas
 * @property Anamnesa $anamnesa
 */
class KebiasaanObat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kebiasaan_obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anamnesa_id', 'awal_pemakaian_nil', 'lama_pemakaian_nil'], 'integer'],
            [['awal_pemakaian_waktu', 'lama_pemakaian_waktu', 'waktu_pemakaian'], 'string'],
            [['nama_obat'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'anamnesa_id' => 'Anamnesa ID',
            'nama_obat' => 'Nama Obat',
            'awal_pemakaian_nil' => 'Awal Pemakaian Nil',
            'awal_pemakaian_waktu' => 'Awal Pemakaian Waktu',
            'lama_pemakaian_nil' => 'Lama Pemakaian Nil',
            'lama_pemakaian_waktu' => 'Lama Pemakaian Waktu',
            'waktu_pemakaian' => 'Waktu Pemakaian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas()
    {
        return $this->hasMany(Anamnesa::className(), ['kebiasaan_obat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesa()
    {
        return $this->hasOne(Anamnesa::className(), ['id' => 'anamnesa_id']);
    }
}