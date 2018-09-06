<?php

use yii\db\Migration;

/**
 * Class m180905_001513_datos_agresor
 */
class m180905_001513_datos_agresor extends Migration
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

        $this->createTable('cedulas_datos_agresor', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'numero_agresores' => $this->integer(),
            'nombre' => $this->string(100),
            'apellidos' => $this->string(100),
            'sexo_id' => $this->integer(),
            'fecha_nac' => $this->date(),
            'edad' => $this->integer(),
            'relacion_parentezco_id' => $this->integer(),
            'estado_civil_id' => $this->integer(),
            'calle' => $this->string(100),
            'no_int' => $this->string(50),
            'no_ext' => $this->string(50),
            'colonia_id' => $this->integer(),
            'colonia_nueva' => $this->string(100),
            'colonia_foranea' => $this->string(100),
            'localidad' => $this->string(100),
            'municipio' => $this->string(100),
            'entidad_id' => $this->integer(),
            'nacionalidad_id' => $this->integer(),
            'lugar_nacimiento' => $this->string(100),
            'religion_id' => $this->integer(),
            'vivienda_id' => $this->integer(),
            'servicios_basicos_ids' => $this->integer(),
            'nivel_estudio_id' => $this->integer(),
            'status_estudio_id' => $this->integer(),
            'idioma' => $this->string(100),
            'ocupacion_ids' => $this->string(100),
            'fuente_ingresos_ids' => $this->string(100),
            'ingreso_mensual' => $this->integer(),
            'servidor_publico' => $this->char(1),
            'servidor_publico_cargo' => $this->string(100),
            'servidor_publico_institucion' => $this->string(100),
            'programas_sociales_ids' => $this->string(100),
            'servicios_medicos_ids' => $this->string(100),
            'padece_discapacidades_ids' => $this->string(100),
            'droga_agresion_id' => $this->integer(),
            'frecuencia_agresion_id' => $this->integer(),
            'arma_agresor_id' => $this->integer(),
            'lugar_violencia_id' => $this->integer(),
            'lesion_fisica_ids' => $this->string(100),
            'lesion_agente_ids' => $this->string(100),
            'lesion_area_ids' => $this->string(100),
            'danos_psicologicos_ids' => $this->string(100),
            'danos_economicos_ids' => $this->string(100),
            'indicador_riesgo_ids' => $this->string(100),
            'victima_canalizada' => $this->char(1),
            'tipo_canalizacion_id' => $this->integer(),
            'tipo_seguimiento_ids' => $this->string(100),
            'requiere_orden_proteccion' => $this->char(1),
            'informo_proteccion_utilizar' => $this->char(1),
            'fuero_federal' => $this->char(1),
            'solicita_informacion_proteccion' => $this->char(1),
            'banesvim' => $this->string(15),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('KF_cedulaagresor_cedulas', 'cedulas_datos_agresor', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_csexos', 'cedulas_datos_agresor', 'sexo_id', 'csexos', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_crelacioparentezco', 'cedulas_datos_agresor', 'relacion_parentezco_id', 'crelacioparentezco', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_generales_ctipificaciones', 'cedulas_datos_agresor', 'estado_civil_id', 'cestados_civiles', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_ccolonias', 'cedulas_datos_agresor', 'colonia_id', 'ccolonias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_centidadesfederativas', 'cedulas_datos_agresor', 'entidad_id', 'centidadesfederativas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_cnacionalidades', 'cedulas_datos_agresor', 'nacionalidad_id', 'cnacionalidades', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_creligiones', 'cedulas_datos_agresor', 'religion_id', 'creligiones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_ccoorporaciones', 'cedulas_datos_agresor', 'vivienda_id', 'ctipos_viviendas', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_cinstituciones', 'cedulas_datos_agresor', 'nivel_estudio_id', 'cniveles_estudios', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_cstatus_estudios', 'cedulas_datos_agresor', 'status_estudio_id', 'cstatus_estudios', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_cdrogas_agresiones', 'cedulas_datos_agresor', 'droga_agresion_id', 'cdrogas_agresiones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_cfrecuencias_agresiones', 'cedulas_datos_agresor', 'frecuencia_agresion_id', 'cfrecuencias_agresiones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_carmas_agresores', 'cedulas_datos_agresor', 'arma_agresor_id', 'carmas_agresores', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_clugarviolencia', 'cedulas_datos_agresor', 'lugar_violencia_id', 'clugares_violencias', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_ctipos_canalizaciones', 'cedulas_datos_agresor', 'tipo_canalizacion_id', 'ctipos_canalizaciones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_user', 'cedulas_datos_agresor', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaagresor_user2', 'cedulas_datos_agresor', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180905_001513_datos_agresor cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180905_001513_datos_agresor cannot be reverted.\n";

        return false;
    }
    */
}
