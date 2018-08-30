<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cprogramassociales".
 *
 * @property int $id
 * @property string $programa_social
 */
class Cprogramassociales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cprogramassociales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['programa_social'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'programa_social' => 'Programa Social',
        ];
    }
}
