<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resep_nonracikan_detail".
 *
 * @property integer $id
 * @property integer $resep_nonracikan_id
 * @property string $nama_obat
 * @property string $kek_isi
 * @property string $sediaan
 * @property string $jumlah
 * @property integer $aturan_pakai_sehari
 * @property string $aturan_pakai_jumlah
 *
 * @property ResepNonracikan $resepNonracikan
 */
class ResepNonracikanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resep_nonracikan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resep_nonracikan_id'], 'required'],
            [['resep_nonracikan_id', 'aturan_pakai_sehari'], 'integer'],
            [['aturan_pakai_jumlah'], 'number'],
            [['nama_obat'], 'string', 'max' => 100],
            [['kek_isi', 'sediaan'], 'string', 'max' => 10],
            [['jumlah'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resep_nonracikan_id' => 'Resep Nonracikan ID',
            'nama_obat' => 'Nama Obat',
            'kek_isi' => 'Kek Isi',
            'sediaan' => 'Sediaan',
            'jumlah' => 'Jumlah',
            'aturan_pakai_sehari' => 'Aturan Pakai Sehari',
            'aturan_pakai_jumlah' => 'Aturan Pakai Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepNonracikan()
    {
        return $this->hasOne(ResepNonracikan::className(), ['id' => 'resep_nonracikan_id']);
    }
}
