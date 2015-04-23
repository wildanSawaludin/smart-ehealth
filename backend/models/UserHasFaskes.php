<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_has_faskes".
 *
 * @property integer $user_id
 * @property integer $faskes_id
 *
 * @property User $user
 * @property FasilitasKesehatan $faskes
 */
class UserHasFaskes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_has_faskes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'faskes_id'], 'required'],
            [['user_id', 'faskes_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'faskes_id' => Yii::t('app', 'Faskes ID'),
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
    public function getFaskes()
    {
        return $this->hasOne(FasilitasKesehatan::className(), ['id' => 'faskes_id']);
    }
}
