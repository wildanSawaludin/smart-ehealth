<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "racikan_obat".
 *
 * @property integer $id
 * @property integer $resep_racikan_detail_id
 * @property string $nama_obat
 * @property string $kek_isi
 *
 * @property ResepRacikan $resepRacikan
 */
class RacikanObat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'racikan_obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resep_racikan_detail_id'], 'integer'],
            [['nama_obat'], 'string', 'max' => 100],
            [['kek_isi'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resep_racikan_detail_id' => 'Resep Racikan ID',
            'nama_obat' => 'Nama Obat',
            'kek_isi' => 'Kek Isi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepRacikan()
    {
        return $this->hasOne(ResepRacikan::className(), ['id' => 'resep_racikan_id']);
    }
}
