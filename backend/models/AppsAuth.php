<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "apps_auth".
 *
 * @property integer $user_id
 * @property string $code
 * @property integer $pasien_id
 * @property string $created_date
 * @property string $expired_date
 */
class AppsAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apps_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'code', 'pasien_id'], 'required'],
            [['user_id', 'pasien_id'], 'integer'],
            [['created_date', 'expired_date'], 'safe'],
            [['code'], 'string', 'max' => 32],
            [['user_id', 'code', 'pasien_id'], 'unique', 'targetAttribute' => ['user_id', 'code', 'pasien_id'], 'message' => 'The combination of User  ID, Code and Pasien ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User  ID'),
            'code' => Yii::t('app', 'Code'),
            'pasien_id' => Yii::t('app', 'Pasien ID'),
            'created_date' => Yii::t('app', 'Created Date'),
            'expired_date' => Yii::t('app', 'Expired Date'),
        ];
    }
}
