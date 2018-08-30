<?php

use yii\db\Migration;

/**
 * Class m180828_185407_datos_generales
 */
class m180828_185407_datos_generales extends Migration
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

        $this->createTable('cedulas_datos_generales', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(), // Folio de la Cedula
            'edad' => $this->integer(),
            'fecha_nac' => $this->date(),
            'grupo_etnico' => $this->char(1),
            'no_hijos' => $this->integer(),
            'vive_hijos' => $this->char(1),
            'edad_primer_embarazo' => $this->integer(),
            'embarazo_violencia' => $this->integer(),
            'madre_soltera' => $this->integer(),
            'madre_soltera_apartir_de_id' => $this->integer(),
            'embarazada_actualmente' => $this->char(1),
            'meses_embarazo' => $this->integer(),
            'violencia_obstetrica' => $this->char(),
            'violencia_obstetrica_institucion' => $this->string(100),
            'denuncio' => $this->char(1),
            'no_gestaciones' => $this->integer(),
            'mortalidad_hijo' => $this->char(1),
            'mortalidad_hijo_edad' => $this->integer(),
            'mortalidad_hijo_sexo_id' => $this->integer(),
            'observaciones' => $this->text(),
            'estado_civil_id' => $this->integer(),
            'convivencia_id' => $this->integer(),
            'vivienda_id' => $this->integer(),
            'servicios_basicos_ids' => $this->integer(),
            'nivel_estudio_id' => $this->integer(),
            'status_estudio_id' => $this->integer(),
            'ocupacion_ids' => $this->string(100),
            'fuente_ingresos_ids' => $this->string(100),
            'numero_jornadas' => $this->integer(),
            'numero_ingresos' => $this->integer(),
            'horas_labor_hogar' => $this->integer(),
            'horas_cuidado_otros' => $this->integer(),
            'horas_trabajo' => $this->integer(),
            'horas_recreacion' => $this->integer(),
            'horas_autocuidado' => $this->integer(),
            'horas_descanso' => $this->integer(),
            'horas_autoempleo' => $this->integer(),
            'ingreso_mensual' => $this->integer(),
            'quien_administra_dinero' => $this->string(100),
            'servidor_publico' => $this->char(1),
            'servidor_publico_cargo' => $this->string(100),
            'servidor_publico_institucion' => $this->string(100),
            'programas_sociales_ids' => $this->string(100),
            'servicios_medicos_ids' => $this->string(100),
            'padece_enfermedades_ids' => $this->string(100),
            'autocuidado' => $this->char(1),
            'autocuidado_ids' => $this->string(100),
            'padece_discapacidades_ids' => $this->string(100),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);



        $this->addForeignKey('KF_cedulas_datos_generales_cedulas', 'cedulas_datos_generales', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_apartirde', 'cedulas_datos_generales', 'madre_soltera_apartir_de_id', 'cmadres_solteras_apartir_de', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_hijo_sexo', 'cedulas_datos_generales', 'mortalidad_hijo_sexo_id', 'csexos', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_ctipificaciones', 'cedulas_datos_generales', 'estado_civil_id', 'cestados_civiles', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_ctiposemergencias', 'cedulas_datos_generales', 'convivencia_id', 'cconvivencias', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_ccoorporaciones', 'cedulas_datos_generales', 'vivienda_id', 'ctipos_viviendas', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_cinstituciones', 'cedulas_datos_generales', 'nivel_estudio_id', 'cniveles_estudios', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_csexos', 'cedulas_datos_generales', 'status_estudio_id', 'cstatus_estudios', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_user', 'cedulas_datos_generales', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_user2', 'cedulas_datos_generales', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


        $this->createTable('cedulas_datos_generales_hijos', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(), // Folio de la Cedula
            'hijo_edad' => $this->integer(),
            'hijo_sexo_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('KF_cedulas_datos_generales_hijos_cedulas', 'cedulas_datos_generales_hijos', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_hijos_user', 'cedulas_datos_generales_hijos', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulas_datos_generales_hijos_user2', 'cedulas_datos_generales_hijos', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180828_185407_datos_generales cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180828_185407_datos_generales cannot be reverted.\n";

        return false;
    }
    */
}
