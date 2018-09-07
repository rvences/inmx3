<?php

use yii\db\Migration;

/**
 * Class m180830_184714_violencia_genero
 */
class m180830_184714_violencia_genero extends Migration
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

        $this->createTable('cedulas_violencia_genero', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(), // Folio de la Cedula
            'tipo_victima' => $this->char(9),
            'tipo_violencia_ids' => $this->string(100),
            'tipo_modalidad_ids' => $this->string(100),
            'lugar_violencia_id' => $this->integer(),
            'domicilio_victima' => $this->char(1),
            'calle' => $this->string(100),
            'no_int' => $this->string(50),
            'no_ext' => $this->string(50),
            'colonia_id' => $this->integer(),
            'colonia_nueva' => $this->string(100),
            'colonia_foranea' => $this->string(100),
            'localidad' => $this->string(100),
            'municipio' => $this->string(100),
            'entidad_id' => $this->integer(),
            'observaciones' => $this->text(),
            'consume_alcohol' => $this->char(1),
            'penso_suicidarse'  => $this->char(1),
            'intento_suicidarse'  => $this->char(1),
            'hospitalizada_anteriormente' => $this->char(1),
            'requiere_hospitalizacion' => $this->char(1),
            'vigilancia_agresor' => $this->char(1),
            'llamadas_libremente' => $this->char(1),
            'visitas_libremente' => $this->char(1),
            'recibio_amenazas' => $this->char(1),
            'vive_agresor' => $this->char(1),
            'vive_familia_agresor' => $this->char(1),
            'vive_cerca_agresor' => $this->char(1),
            'abandono_casa' => $this->char(1),
            'lugar_vivir' => $this->char(1),
            'evaluacion_psicologica' => $this->text(),
            'tiempo_agresion_servicio' =>$this->string(100),
            'lugar_agresion' => $this->string(100),
            'solicito_ayuda' => $this->char(1),
            'tipo_atencion' => $this->string(100),
            'aplicaron_nom046' => $this->char(1),
            'horas_despues_agresion' => $this->integer(),
            'explicaron_derechos' => $this->string(100),
            'institucion_atendio' => $this->string(100),
            'sintomatologia_emocional_ids' => $this->string(100),
            'sintomatologia_fisica_ids' => $this->string(100),
            'creencias_ids' => $this->string(100),
            'factores_psicosociales_ids' => $this->string(100),
            'relacion_pareja_ids' => $this->string(100),
            'tiempo_convivencia_anios' => $this->integer(),
            'tiempo_convivencia_meses' => $this->integer(),
            'adaptacion_psicologica' => $this->char(1),
            'agresiones_previas' => $this->char(1),
            'autonomia' => $this->char(1),
            'relato_ids' => $this->string(100),
            'relaciones_sociales_ids' => $this->string(100),
            'tratamiento' => $this->text(),
            'tipo_demanda_ids' => $this->string(100),
            'relato_juridico' => $this->text(),
            'situacion_problematica' => $this->text(),
            'procedimiento_legal' => $this->text(),
            'alcance_resultados' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('KF_cedulaviolencia_cedulas', 'cedulas_violencia_genero', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_clugarviolencia', 'cedulas_violencia_genero', 'lugar_violencia_id', 'clugares_violencias', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_ccolonias', 'cedulas_violencia_genero', 'colonia_id', 'ccolonias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_centidadesfederativas', 'cedulas_violencia_genero', 'entidad_id', 'centidadesfederativas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_generales_hijos_user', 'cedulas_violencia_genero', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_generales_hijos_user2', 'cedulas_violencia_genero', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


        $this->createTable('cedulas_violencia_genero_ruta', [
            'id' => $this->primaryKey(),
            'cedulas_violencia_genero_id' => $this->integer(), // Folio de la Cedula
            'institucion' => $this->string(100),
            'servicio' => $this->string(100),
            'calidad' => $this->char(1),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('KF_cedulaviolencia_ruta_cedulas', 'cedulas_violencia_genero_ruta', 'cedulas_violencia_genero_id', 'cedulas_violencia_genero', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_ruta_user', 'cedulas_datos_generales_hijos', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaviolencia_ruta_user2', 'cedulas_datos_generales_hijos', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180830_184714_violencia_genero cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180830_184714_violencia_genero cannot be reverted.\n";

        return false;
    }
    */
}
