<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ccausas_muertes_embarazos".
 *
 * @property int $id
 * @property string $causa_muerte
 */
class CcausasMuertesEmbarazos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ccausas_muertes_embarazos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['causa_muerte'], 'required'],
            [['causa_muerte'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'causa_muerte' => 'Causa Muerte',
        ];
    }
}
