<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asuransi_provider".
 *
 * @property integer $id
 * @property string $nama
 * @property string $notelp
 * @property string $alamat
 */
class AsuransiProvider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asuransi_provider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'notelp', 'alamat'], 'required'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 50],
            [['notelp'], 'string', 'max' => 20]
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
            'notelp' => 'Notelp',
            'alamat' => 'Alamat',
        ];
    }
}
