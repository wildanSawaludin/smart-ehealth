<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resep_racikan".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $registrasi_id
 * @property integer $no_resep
 * @property string $status
 * @property string $iter
 * @property integer $label_etiket
 *
 * @property Registrasi $registrasi
 * @property User $user
 * @property ResepRacikanDetail[] $resepRacikanDetails
 */
class ResepRacikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resep_racikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'registrasi_id', 'no_resep'], 'required'],
            [['user_id', 'registrasi_id', 'no_resep', 'label_etiket'], 'integer'],
            [['status', 'iter'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'registrasi_id' => 'Registrasi ID',
            'no_resep' => 'No Resep',
            'status' => 'Status',
            'iter' => 'Iter',
            'label_etiket' => 'Label Etiket',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepRacikanDetails()
    {
        return $this->hasMany(ResepRacikanDetail::className(), ['resep_racikan_id' => 'id']);
    }
}
