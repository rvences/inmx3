<?php

use yii\db\Migration;

/**
 * Class m180912_164432_encuesta_seguimiento
 */
class m180912_164432_encuesta_seguimiento extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('encuesta_telefonica',[
            'id' => $this->primaryKey(),
            'cedula_identificacion_id' => $this->integer(),
            'asesoria_correcta' => $this->char(1),
            'asesoria_correcta_info' => $this->text(),
            'atencion_correcta_id' => $this->integer(),
            'atencion_correcta_info' => $this->text(),
            'volver_llamar' => $this->char(1),
            'volver_llamar_info' => $this->text(),
            'recomienda_linea' => $this->char(1),
            'recomienda_linea_info' => $this->text(),
            'como_entero' => $this->text(),
            'ayuda_adicional' => $this->char(1),
            'observaciones' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);


        $this->addForeignKey('KF_encuestatelefonica_cedulas', 'encuesta_telefonica', 'cedula_identificacion_id', 'cedulas_identificaciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('KF_encuestatelefonica_califica', 'encuesta_telefonica', 'atencion_correcta_id', 'cencuesta_calificaciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_encuestatelefonica_user', 'encuesta_telefonica', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_encuestatelefonica_user2', 'encuesta_telefonica', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('encuesta_telefonica_dependencia',[
            'id' => $this->primaryKey(),
            'encuestatelefonica_id' => $this->integer(),
            'institucion_id' => $this->integer(),
            'atencion' => $this->char(1),
            'observaciones' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('FK_encuestatelefonicadeps_cinstituciones', 'encuesta_telefonica_dependencia', 'institucion_id', 'cinstituciones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('KF_encuestatelefonicadeps_telefonica', 'encuesta_telefonica_dependencia', 'encuestatelefonica_id', 'encuesta_telefonica', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_encuestatelefonicadeps_user', 'encuesta_telefonica_dependencia', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_encuestatelefonicadeps_user2', 'encuesta_telefonica_dependencia', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('encuesta_telefonica_dependencia');
        $this->dropTable('encuesta_telefonica');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180912_164432_encuesta_seguimiento cannot be reverted.\n";

        return false;
    }
    */
}
