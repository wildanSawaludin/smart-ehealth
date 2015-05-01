<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $kabkota_id
 *
 * @property FasilitasKesehatan[] $fasilitasKesehatans
 * @property Kabkota $kabkota
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['kabkota_id'], 'integer'],
            [['nama'], 'string', 'max' => 50]
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
            'kabkota_id' => Yii::t('app', 'Kabkota ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFasilitasKesehatans()
    {
        return $this->hasMany(FasilitasKesehatan::className(), ['kecamatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabkota()
    {
        return $this->hasOne(Kabkota::className(), ['id' => 'kabkota_id']);
    }
}
