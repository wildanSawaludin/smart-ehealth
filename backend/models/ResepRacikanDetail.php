<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resep_racikan_detail".
 *
 * @property integer $id
 * @property integer $resep_racikan_id
 * @property string $m_f
 * @property string $jumlah
 * @property integer $aturan_pakai_sehari
 * @property string $aturan_pakai_jumlah
 *
 * @property RacikanObat[] $racikanObats
 * @property ResepRacikan $resepRacikan
 */
class ResepRacikanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resep_racikan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resep_racikan_id'], 'required'],
            [['resep_racikan_id', 'aturan_pakai_sehari'], 'integer'],
            [['m_f'], 'string'],
            [['aturan_pakai_jumlah'], 'number'],
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
            'resep_racikan_id' => 'Resep Racikan ID',
            'm_f' => 'M F',
            'jumlah' => 'Jumlah',
            'aturan_pakai_sehari' => 'Aturan Pakai Sehari',
            'aturan_pakai_jumlah' => 'Aturan Pakai Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRacikanObats()
    {
        return $this->hasMany(RacikanObat::className(), ['resep_racikan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepRacikan()
    {
        return $this->hasOne(ResepRacikan::className(), ['id' => 'resep_racikan_id']);
    }
}
