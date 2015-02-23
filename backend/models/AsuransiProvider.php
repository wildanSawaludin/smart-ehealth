<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "asuransi_provider".
 *
 * @property integer $id
 * @property integer $pasien_id
 * @property string $alamat
 * @property string $penanggung_jawab
 * @property string $no_pks
 * @property string $tgl_mulai_ks
 * @property string $tgl_selesai_ks
 *
 * @property Pasien $pasien
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
    public $pasienNama;
    public function rules()
    {
        return [
            [['pasien_id', 'penanggung_jawab', 'no_pks'], 'required'],
            [['pasien_id'], 'integer'],
            [['tgl_mulai_ks', 'tgl_selesai_ks'], 'safe'],
            [['alamat'], 'string', 'max' => 200],
            [['penanggung_jawab'], 'string', 'max' => 100],
            [['no_pks'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pasien_id' => Yii::t('app', 'Pasien ID'),
            'alamat' => Yii::t('app', 'Alamat'),
            'penanggung_jawab' => Yii::t('app', 'Penanggung Jawab'),
            'no_pks' => Yii::t('app', 'No Perjanjian'),
            'tgl_mulai_ks' => Yii::t('app', 'Mulai Kerjasama'),
            'tgl_selesai_ks' => Yii::t('app', 'Selesai Kerjasama'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::className(), ['id' => 'pasien_id']);
    }
}
