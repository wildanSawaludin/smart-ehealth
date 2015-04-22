<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "diagnosa".
 *
 * @property integer $id
 * @property integer $registrasi_id
 * @property string $jenis_diagnosa
 * @property integer $icdx_id
 *
 * @property Icdx $icdx
 * @property Registrasi $registrasi
 */
class Diagnosa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnosa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['registrasi_id'], 'required'],
            [['registrasi_id', 'icdx_id'], 'integer'],
            [['jenis_diagnosa'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'registrasi_id' => 'Registrasi ID',
            'jenis_diagnosa' => 'Jenis Diagnosa',
            'icdx_id' => 'Icdx ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIcdx()
    {
        return $this->hasOne(Icdx::className(), ['id' => 'icdx_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }
}
