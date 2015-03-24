<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "riwayat_pengobatan".
 *
 * @property integer $id
 * @property integer $anamnesa_id
 * @property string $nama_obat
 * @property string $frekuensi
 * @property integer $lama_pengobatan
 * @property string $lama_pengobatan_waktu
 *
 * @property Anamnesa[] $anamnesas
 * @property Anamnesa $anamnesa
 */
class RiwayatPengobatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_pengobatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anamnesa_id', 'lama_pengobatan'], 'integer'],
            [['frekuensi', 'lama_pengobatan_waktu'], 'string'],
            [['nama_obat'], 'string', 'max' => 50]
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
            'frekuensi' => 'Frekuensi',
            'lama_pengobatan' => 'Lama Pengobatan',
            'lama_pengobatan_waktu' => 'Lama Pengobatan Waktu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas()
    {
        return $this->hasMany(Anamnesa::className(), ['riwayat_pengobatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesa()
    {
        return $this->hasOne(Anamnesa::className(), ['id' => 'anamnesa_id']);
    }
}
