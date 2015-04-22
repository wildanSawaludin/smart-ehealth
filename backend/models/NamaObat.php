<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nama_obat".
 *
 * @property integer $id
 * @property string $latin
 * @property string $lazim
 */
class NamaObat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nama_obat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latin', 'lazim'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'latin' => 'Latin',
            'lazim' => 'Lazim',
        ];
    }
}
