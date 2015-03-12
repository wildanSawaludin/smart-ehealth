<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "icdx".
 *
 * @property integer $id
 * @property string $kode
 * @property string $inggris
 * @property string $indonesia
 *
 * @property Anamnesa[] $anamnesas
 * @property Registrasi[] $registrasis
 */
class Icdx extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icdx';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['inggris', 'indonesia'], 'string', 'max' => 200],
            [['kode'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'inggris' => Yii::t('app', 'Inggris'),
            'indonesia' => Yii::t('app', 'Indonesia'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas()
    {
        return $this->hasMany(Anamnesa::className(), ['riwayatkel_icdx_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasis()
    {
        return $this->hasMany(Registrasi::className(), ['icdx_id' => 'id']);
    }
}
