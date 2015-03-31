<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propinsi".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Kabkota[] $kabkotas
 */
class Propinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id'], 'integer'],
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
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKabkotas()
    {
        return $this->hasMany(Kabkota::className(), ['propinsi_id' => 'id']);
    }
}
