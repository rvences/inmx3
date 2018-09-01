<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmodalidades_violencias".
 *
 * @property int $id
 * @property string $modalidad_violencia Modalidad Violenta
 */
class CmodalidadesViolencias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cmodalidades_violencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modalidad_violencia'], 'required'],
            [['modalidad_violencia'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'modalidad_violencia' => 'Modalidad Violencia',
        ];
    }
}
