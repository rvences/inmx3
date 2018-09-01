<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cfactores_psicosociales".
 *
 * @property int $id
 * @property string $factor_psicosocial Factor Psicosocial
 */
class CfactoresPsicosociales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cfactores_psicosociales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['factor_psicosocial'], 'required'],
            [['factor_psicosocial'], 'string', 'max' => 40],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'factor_psicosocial' => 'Factor Psicosocial',
        ];
    }
}
