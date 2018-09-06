<?php

use yii\db\Migration;

/**
 * Class m180825_015034_cedula_datos_identificacion
 */
class m180825_015034_cedula_datos_identificacion extends Migration
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

        ## REGISTRO DE TODAS LAS CEDULAS CREADAS TELEFONICAS, PRESENCIALES O FALSAS
        $this->createTable('cedulas', [
            'id' => $this->primaryKey(),
            'status_id' => $this->integer()->notNull(),
            'tipoatencion_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(), // Fecha se creo la cedula
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(), // CT o CP
            'updated_by' => $this->integer()->notNull(),

        ], $tableOptions);
        $this->addForeignKey('KF_cedula_estado', 'cedulas', 'status_id', 'cestadocedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_tipoatencion', 'cedulas', 'tipoatencion_id', 'ctiposatencion', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_user', 'cedulas', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_user2', 'cedulas', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


        // select FROM_UNIXTIME(created_at) from cedula;
        $this->createTable('cedulas_identificaciones', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(), // Folio de la Cedula
            'tel_llamada' => $this->string(10),
            'created_at' => $this->integer()->notNull(),
            'hora_inicio' => $this->time(), // CP
            'hora_termino' => $this->time(), // CP
            'fecha_ult_incidente' => $this->integer()->notNull(),
            'tipo_llamada_id' => $this->integer(), // CT
            'tipificacion_ids' => $this->string(100), // CT
            'tipo_emergencia_id' => $this->integer(), // CT
            'coorporacion_ids' => $this->string(100), // CT
            'institucion_id' => $this->integer(), // CT
            'tipoasesoria_ids' => $this->string(100),
            'sexo_id' => $this->integer(), // CT
            'nombre' => $this->string(100),
            'apaterno' => $this->string(100),
            'amaterno' => $this->string(100),
            'calle' => $this->string(100),
            'no_int' => $this->string(50),
            'no_ext' => $this->string(50),
            'colonia_id' => $this->integer(),
            'colonia_nueva' => $this->string(100),
            'colonia_foranea' => $this->string(100),
            'localidad' => $this->string(100),
            'municipio' => $this->string(100),
            'entidad_id' => $this->integer(),
            'zona_id' => $this->integer(),
            'congregacion_id' => $this->integer(),
            'religion_id' => $this->integer(),
            'nacionalidad_id' => $this->integer(),
            'zona_riesgo_ids' => $this->string(100),
            'horario_riesgo_ids' => $this->string(100),
            'nivel_riesgo_id' => $this->integer(),
            'lugar_nacimiento' => $this->string(100),
            'violencia_pareja_anterior' => $this->char(1),
            'created_by' => $this->integer()->notNull(), // CT o CP
            'contacto_emergencia1' => $this->string(100),
            'tel_emergencia1' => $this->string(10),
            'contacto_emergencia2' => $this->string(100),
            'tel_emergencia2' => $this->string(10),
            'situacion_desencadenante' => $this->text(),
            'menor_18' => $this->char(1),
            'nombre_tutela' => $this->string(100),
            'relacion_parentezco_id' => $this->integer(),
            'tel_tutela' => $this->string(10),
            'direccion_tutela' => $this->string(100),
            'observaciones' => $this->text(),
            //'entero_servicio_id' => $this->integer(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('KF_cedulaidentificacion_cedulas', 'cedulas_identificaciones', 'cedula_id', 'cedulas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_ctiposllamadas', 'cedulas_identificaciones', 'tipo_llamada_id', 'ctiposllamadas', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_ctiposemergencias', 'cedulas_identificaciones', 'tipo_emergencia_id', 'ctiposemergencias', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_cinstituciones', 'cedulas_identificaciones', 'institucion_id', 'cinstituciones', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_csexos', 'cedulas_identificaciones', 'sexo_id', 'csexos', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_ccolonias', 'cedulas_identificaciones', 'colonia_id', 'ccolonias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_centidadesfederativas', 'cedulas_identificaciones', 'entidad_id', 'centidadesfederativas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_zonas', 'cedulas_identificaciones', 'zona_id', 'czonas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_ccongregaciones', 'cedulas_identificaciones', 'congregacion_id', 'ccongregaciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_creligiones', 'cedulas_identificaciones', 'religion_id', 'creligiones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_cnacionalidades', 'cedulas_identificaciones', 'nacionalidad_id', 'cnacionalidades', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_cnivelriesgo', 'cedulas_identificaciones', 'nivel_riesgo_id', 'cniveles_riesgos', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_user', 'cedulas_identificaciones', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_crelacioparentezco', 'cedulas_identificaciones', 'relacion_parentezco_id', 'crelacioparentezco', 'id', 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('FK_cedulaidentificacion_centeroservicios', 'cedulas_identificaciones', 'entero_servicio_id', 'centeroservicios', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedulaidentificacion_user2', 'cedulas_identificaciones', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180825_015034_cedula_datos_identificacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180825_015034_cedula_datos_identificacion cannot be reverted.\n";

        return false;
    }
    */
}
