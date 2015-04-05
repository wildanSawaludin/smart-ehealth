<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabkota".
 *
 * @property integer $id
 * @property integer $propinsi_id
 * @property string $nama
 *
 * @property Propinsi $propinsi
 */
class Kabkota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabkota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'propinsi_id'], 'integer'],
            [['nama'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propinsi_id' => 'Propinsi ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropinsi()
    {
        return $this->hasOne(Propinsi::className(), ['id' => 'propinsi_id']);
    }
}
