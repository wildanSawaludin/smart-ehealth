<?php

namespace backend\models;

use dektrium\user\models\User;
use Yii;

/**
 * This is the model class for table "resep_nonracikan".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $registrasi_id
 * @property string $status
 * @property string $iter
 * @property integer $label_etiket
 *
 * @property User $user
 * @property Registrasi $registrasi
 * @property ResepNonracikanDetail[] $resepNonracikanDetails
 */
class ResepNonracikan extends \yii\db\ActiveRecord
{
    public $no_resep;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resep_nonracikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'registrasi_id', 'label_etiket'], 'integer'],
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
            'status' => 'Status',
            'iter' => 'Iter',
            'label_etiket' => 'Label Etiket',
        ];
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
    public function getRegistrasi()
    {
        return $this->hasOne(Registrasi::className(), ['id' => 'registrasi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResepNonracikanDetails()
    {
        return $this->hasMany(ResepNonracikanDetail::className(), ['resep_nonracikan_id' => 'id']);
    }

    public function afterFind()
    {
        $this->no_resep = str_pad($this->id, 6, "NR-000000", STR_PAD_LEFT);
    }
}
