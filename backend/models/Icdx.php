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
 * @property integer $penyakit_primer
 * @property string $nama_lazim
 * @property string $anamnesa
 * @property string $pemeriksaan_fisik
 * @property string $pemeriksaan_penunjang
 * @property string $terapi_tindakan
 * @property string $gizi_nutrisi
 *
 * @property Anamnesa[] $anamnesas
 * @property Anamnesa[] $anamnesas0
 * @property Diagnosa[] $diagnosas
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
            [['penyakit_primer'], 'integer'],
            [['anamnesa', 'pemeriksaan_fisik', 'pemeriksaan_penunjang', 'terapi_tindakan', 'gizi_nutrisi'], 'string'],
            [['kode'], 'string', 'max' => 10],
            [['inggris', 'indonesia', 'nama_lazim'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'inggris' => 'Inggris',
            'indonesia' => 'Indonesia',
            'penyakit_primer' => 'Penyakit Primer',
            'nama_lazim' => 'Nama Lazim',
            'anamnesa' => 'Anamnesa',
            'pemeriksaan_fisik' => 'Pemeriksaan Fisik',
            'pemeriksaan_penunjang' => 'Pemeriksaan Penunjang',
            'terapi_tindakan' => 'Terapi Tindakan',
            'gizi_nutrisi' => 'Gizi Nutrisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas()
    {
        return $this->hasMany(Anamnesa::className(), ['riwayatsakit_icdx_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnamnesas0()
    {
        return $this->hasMany(Anamnesa::className(), ['riwayatkel_icdx_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosas()
    {
        return $this->hasMany(Diagnosa::className(), ['icdx_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasis()
    {
        return $this->hasMany(Registrasi::className(), ['icdx_id' => 'id']);
    }
}
