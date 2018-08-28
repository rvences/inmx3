<?php

use yii\db\Migration;

/**
 * Class m180825_013942_catalogo_datos_identificacion
 */
class m180825_013942_catalogo_datos_identificacion extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        ## CATALOGO ESTADO DE LAS CEDULAS
        $this->createTable('cestadocedulas', [
            'id' => $this->primaryKey(),
            'estado_cedula' => $this->string(50),
        ], $tableOptions);

        $this->batchInsert('cestadocedulas',
            array('estado_cedula'),
            array(
                ['Creada sin utilizar'],
                ['Con información básica de Atención'],
            )
        );

        ## CATALOGO TIPO DE LLAMADA
        $this->createTable('{{%ctiposllamadas}}', [
            'id' => $this->primaryKey(),
            'tipo_llamada' => $this->string(20)->notNull()
        ], $tableOptions);
        $this->batchInsert('ctiposllamadas', array('tipo_llamada'),
            array(
                ['Activa'],
                ['Información'],
                ['Broma'],
                ['Colgaron'],
                ['Obscena']
            )
        );

        ## CATALOGO DE TIPIFICACION
        $this->createTable('{{%ctipificaciones}}', [
            'id' => $this->primaryKey(),
            'tipificacion' => $this->string(40)->notNull()
        ], $tableOptions);
        $this->batchInsert('ctipificaciones', array('tipificacion'),
            array(
                ['Tipo de violencia'],
                ['Modalidad de Violencia'],
                ['Emergencia'],
            )
        );

        ## CATALOGO TIPO DE EMERGENCIAS
        $this->createTable('ctiposemergencias', [
            'id' => $this->primaryKey(),
            'tipo_emergencia' => $this->string(120)->notNull(),
            'prioridad' => $this->string(20),
        ], $tableOptions);

        $this->execute(file_get_contents('migrations/ctiposemergencias.sql'));

        ## CATALGO DE COORPORACION
        $this->createTable('{{%ccoorporaciones}}', [
            'id' => $this->primaryKey(),
            'coorporacion' => $this->string(40)->notNull()
        ], $tableOptions);
        $this->batchInsert('ccoorporaciones', array('coorporacion'),
            array(
                ['Policia Municipal'],
                ['Policia Estatal'],
                ['Policia Ministerial'],
                ['Protección Civil Municipal'],
                ['Bomberos'],
                ['Canalizar a Institución'],
            )
        );

        ## CATALOGO DE INSTITUCION A CANALIZAR
        $this->createTable('{{%cinstituciones}}', [
            'id' => $this->primaryKey(),
            'institucion' => $this->string(100)->notNull(),
            'institucion_area' => $this->string(150)->notNull(),
        ], $tableOptions);
        $this->batchInsert('cinstituciones', array('institucion', 'institucion_area'),
            array(
                ['DIF ESTATAL', 'DIRECCIÓN JURÍDICA Y CONSULTIVA'],
                ['DIF ESTATAL', 'DIRECCIÓN DE ASISTENCIA E INTEGRACIÓN SOCIAL'],
                ['DIF ESTATAL', 'DIRECCIÓN DE ATENCIÓN A POBLACIÓN VULNERABLE'],
                ['DIF ESTATAL', 'PROCURADURÍA ESTATAL DE PROTECCIÓN DE NIÑAS, NIÑOS Y ADOLESCENTES'],
                ['DIF ESTATAL', 'DIRRECCIÓN DEL CENTRO DE REAHIBILITACIÓN E INCLUSIÓN SOCIAL (CRISVER)'],
                ['DIF ESTATAL', 'UNIDAD DE GÉNERO'],
                ['DIF MUNICIPAL', 'PROCURADURÍA MUNICIPAL DE PROTECCIÓN DE NIÑAS, NIÑOS Y ADOLESCENTES'],
                ['INSTITUTO VERACRUZANO DE LAS MUJERES', 'DIRECCIÓN GENERAL'],
                ['INSTITUTO VERACRUZANO DE LAS MUJERES', 'ASUNTOS JURÍDICOS'],
                ['INSTITUTO VERACRUZANO DE LAS MUJERES', 'SUBDIRECCIÓN DE VINCULACIÓN INSTITUCIONAL Y FORTALECIMIENTO MUNICIPAL'],
                ['INSTITUTO MUNICIPAL DE LAS MUJERES DE XALAPA', 'SUBDIRECCIÓN DE ATENCIÓN PSICOLÓGICA Y SALUD INTEGRAL'],
                ['INSTITUTO MUNICIPAL DE LAS MUJERES DE XALAPA', 'SUBDIRECCIÓN DE PREVENCIÓN Y ATENCIÓN DE LA VIOLENCIA'],
                ['POLICÍA FEDERAL', 'POLICÍA FEDERAL SECCIÓN XALAPA'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'POLICÍA ESTATAL CONURBACIÓN XALAPA (PECX)'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'UNIDAD DE GÉNERO'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'FUERZA CIVIL'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'C4'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', '911'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'Dirección General de Prevención y Reinserción Social'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'Dirección General de Transporte del Estado'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'Dirección General de Tránsito y Seguridad Vial del Estado'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'Dirección General de Ejecución de Medidas Sancionadoras'],
                ['SECRETARÍA DE SEGURIDAD PÚBLICA ESTATAL', 'Dirección General del Centro de Evaluación y Control de Confianza'],
                ['ISSSTE', 'EMERGENCIA'],
                ['ISSSTE', 'DELEGACIÓN ISSSTE'],
                ['AMBULANCIAS', 'CRUZ ROJA'],
                ['AMBULANCIAS', 'CRUZ ÁMBAR'],
                ['AMBULANCIAS', 'CRUZ VERDE'],
                ['CRISVER', 'UNIDAD DE GÉNERO CRISVER'],
                ['CENTROS DE SALUD', 'CENTRO DE ALTA ESPECIALIDAD DR RAFAEL LUCIO (CEM)'],
                ['CENTROS DE SALUD', 'HOSPITAL REGIONAL DE XALAPA DR LUIS F NACHÓN'],
                ['CENTROS DE SALUD', 'CENTRO DE REHABILITACION EN SALUD MENTAL Hospital psiquiátrico (incluye granjas)'],
                ['CENTROS DE SALUD', 'DR GASTON MELO Urbano de 12 núcleos básicos y más'],
                ['CENTROS DE SALUD', 'CAPASITS (CENTRO AMBULATORIO SSA)'],
                ['CENTROS DE SALUD', 'CENTRO DE REHABILITACIÓN EN SALUD MENTAL'],
                ['CENTROS DE SALUD', 'IMSS'],
                ['SECRETARÍA DE SALUD', 'DIRECCIÓN GENERAL '],
                ['CANALIZACIÓN JURÍDICA CIVIL', 'FISCALÍA GENERAL DEL ESTADO'],
                ['CANALIZACIÓN JURÍDICA CIVIL', 'INSTITUTO VERACRUZANO DE LA DEFENSORÍA PÚBLICA'],
                ['CANALIZACIÓN JURÍDICA CIVIL', 'DIF ESTATAL'],
                ['CANALIZACIÓN JURÍDICA CIVIL', 'DIF MUNICIPAL'],
                ['CANALIZACIÓN JURÍDICA CIVIL', 'BUFET JURÍDICO UV (GRATUITO)'],
                ['CANALIZACIÓN JURÍDICA CIVIL', 'JUZGADO ESPECIALIZADO EN MATERIA FAMILIAR'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'FISCALÍA GENERAL DEL ESTADO'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'FISCALÍA COORDINADORA ESPECIALIZADA EN INVESTIGACIÓN CONTRA LA FAMILIA, MUJERES, NIÑAS, NIÑOS Y TRATA DE PERSONAS'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'COMISIÓN EJECUTIVA ESTATAL DE ATENCIÓN INTEGRAL A VÍCTIMAS'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'UNIDAD DE ATENCIÓN TEMPRANA DE LA FISCALÍA GENERAL DE JUSTICIA DEL ESTADO'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'FISCALIA DESAPARECIDOS'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'FISCALIA COORDINADORA ESPECIALIZADA EN ASUNTOS INDIGENAS Y DE DERECHOS HUMANOS'],
                ['CANALIZACIÓN JURÍDICA PENAL', 'UNIDAD INTEGRAL DE PROCURACION DE JUSTICIA ZONA XALAPA'],
                ['CANALIZACIÓN JURÍDICA LABORAL', 'PROCURADURÍA DE LA DEFENSA DEL TRABAJO'],
                ['CANALIZACIÓN JURÍDICA LABORAL', 'FISCALÍA COORDINADORA ESPECIALIZADA EN INVESTIGACIÓN CONTRA LA FAMILIA, MUJERES, NIÑAS, NIÑOS Y TRATA DE PERSONAS'],
                ['CANALIZACIÓN VIOLENCIA INSTITUCIONAL', 'FISCALÍA COORDINADORA ESPECIALIZADA EN INVESTIGACIÓN CONTRA LA FAMILIA, MUJERES, NIÑAS, NIÑOS Y TRATA DE PERSONAS'],
                ['CANALIZACIÓN JURÍDICA VIOLENCIA OBSTÉTRICA', 'COMISIÓN DE ARBITRAJE MÉDICO'],
                ['CANALIZACIÓN JURÍDICA POR DELITOS DE SERVIDORES PÚBLICOS', 'FISCALÍAS ESPECIALIZADAS EN DELITOS RELACIONADOS CON HECHOS DE CORRUPCION Y COMETIDOS POR SERVIDORES PÚBLICOS'],
                ['ALBERGUES XALAPA', 'DIF ESTATAL'],
                ['ALBERGUES XALAPA', 'DIF MUNICIPAL'],
                ['ALBERGUES XALAPA', 'CASA DEL NIÑO XALAPEÑO'],
                ['ALBERGUES XALAPA', 'CIUDAD ASISTENCIAL CONECALLI'],
                ['ALBERGUES XALAPA', 'CASA HOGAR TEPEYAC'],
                ['ALBERGUES XALAPA', 'CÁRITAS'],
                ['ALBERGUES XALAPA', 'COMEDOR GRATUITO AYUDEMOS A LOS QUE MENOS TIENEN'],
                ['ALBERGUES XALAPA', 'MATRACA'],
                ['H AYUNTAMIENTO', 'DIF MUNICIPAL'],
                ['H AYUNTAMIENTO', 'DIRECCIÓN DE ASUNTOS JURÍDICOS'],
                ['H AYUNTAMIENTO', 'DIRECCIÓN DE SEGURIDAD CIUDADANA Y TRÁNSITO MUNICIPAL'],
                ['CANALIZACIÓN DEFENSA DE DERECHOS HUMANOS', 'COMISIÓN ESTATAL DE DERECHOS HUMANOS'],
                ['CANALIZACIÓN VIOLENCIA ESCOLAR', 'SEV'],
                ['CANALIZACIÓN VIOLENCIA ESCOLAR', 'FISCALÍA COORDINADORA ESPECIALIZADA EN INVESTIGACIÓN CONTRA LA FAMILIA, MUJERES, NIÑAS, NIÑOS Y TRATA DE PERSONAS'],
            )
        );

        ## CATALOGO TIPO DE ATENCIÓN
        $this->createTable('{{%ctiposatencion}}', [
            'id' => $this->primaryKey(),
            'tipoatencion' => $this->string(20)->notNull() . " COMMENT 'Tipo de Atención' ",

        ], $tableOptions
        );
        $this->batchInsert('ctiposatencion',
            array('tipoatencion'),
            array(
                ['Presencial'],
                ['Telefónica'],
            )
        );

        ## CATALOGO TIPO DE ASESORIA
        $this->createTable('{{%ctiposasesorias}}', [
            'id' => $this->primaryKey(),
            'tipoasesoria' => $this->string(20)->notNull() . " COMMENT 'Tipo de Asesoría' ",

        ], $tableOptions
        );
        $this->batchInsert('ctiposasesorias',
            array('tipoasesoria'),
            array(
                ['Psicológica'],
                ['Jurídica'],
            )
        );

        ## CATALOGO DE SEXO
        $this->createTable('csexos', [
            'id' => $this->primaryKey(),
            'sexo' => $this->string(20)->notNull(),
        ], $tableOptions);
        $this->batchInsert('csexos', array('sexo'), array(
            ['Mujer'],
            ['Hombre'],
            ['Transexual'],
            ['Transgénero'],
        ));

        ## CATALOGO COLONIAS - CODIGO POSTAL Y DELEGACION
        $this->createTable('ccolonias', [
            'id' => $this->primaryKey(),
            'colonia' => $this->string(120)->notNull(),
            'cp' => $this->string(5),
            'delegacion' => $this->string(20),
        ], $tableOptions);

        $this->execute(file_get_contents('migrations/ccolonias.sql'));

        ## CATALOGO DE ESTADO - ENTIDAD FEDERATIVA
        $this->createTable('{{%centidadesfederativas}}', [
            'id' => $this->primaryKey(),
            'entidad' => $this->string(100)->notNull() . " COMMENT 'Entidad Federativa' ",

        ], $tableOptions
        );

        $this->batchInsert('centidadesfederativas',
            array('entidad'),
            array(
                ['Aguascalientes'],
                ['Baja California'],
                ['Baja California Sur'],
                ['Campeche'],
                ['Coahuila'],
                ['Colima'],
                ['Chiapas'],
                ['Chihuahua'],
                ['Ciudad de Mexico'],
                ['Durango'],
                ['Guanajuato'],
                ['Guerrero'],
                ['Hidalgo'],
                ['Jalisco'],
                ['Estado de México'],
                ['Michoacan'],
                ['Morelos'],
                ['Nayarit'],
                ['Nuevo Leon'],
                ['Oaxaca'],
                ['Puebla'],
                ['Queretaro'],
                ['Quintana Roo'],
                ['San Luis Potosi'],
                ['Sinaloa'],
                ['Sonora'],
                ['Tabasco'],
                ['Tamaulipas'],
                ['Tlaxcala'],
                ['Veracruz'],
                ['Yucatan'],
                ['Zacatecas'],
            )
        );

        ## CATALOGO CONGREGACIONES
        $this->createTable('ccongregaciones', [
            'id' => $this->primaryKey(),
            'congregacion' => $this->string(120)->notNull(),
            'cp' => $this->string(5),
            'delegacion' => $this->string(20),
        ], $tableOptions);

        $this->execute(file_get_contents('migrations/ccongregaciones.sql'));

        ## CATALOGO DE ZONAS
        $this->createTable('{{%czonas}}', [
            'id' => $this->primaryKey(),
            'zona' => $this->string(40)->notNull() . " COMMENT 'Zonas' ",

        ], $tableOptions
        );

        $this->batchInsert('czonas',
            array('zona'),
            array(
                ['Urbana'],
                ['Rural'],
            )
        );

        ## CATALOGO DE RELIGIONES
        $this->createTable('{{%creligiones}}', [
            'id' => $this->primaryKey(),
            'religion' => $this->string(40)->notNull() . " COMMENT 'Religión' ",

        ], $tableOptions
        );

        $this->batchInsert('creligiones',
            array('religion'),
            array(
                ['Adventista del Séptimo Día'],
                ['Budista'],
                ['Católica'],
                ['Espiritualista'],
                ['Evangelista'],
                ['Islamica'],
                ['Judaica'],
                ['Mormona'],
                ['Nativista'],
                ['Pentecostal'],
                ['Protestante Histórica'],
                ['Testigo de Jehova'],
                ['Sin Religión'],
                ['Otra'],
                ['Cristiana'],
            )
        );

        ## CATALGO DE NACIONALIDADES
        $this->createTable('{{%cnacionalidades}}', [
            'id' => $this->primaryKey(),
            'nacionalidad' => $this->string(50)->notNull() . " COMMENT 'Nacionalidad' ",

        ], $tableOptions
        );

        $this->batchInsert('cnacionalidades',
            array('nacionalidad'),
            array(
                ['Mexicana / Mexicano'],
                ['Española / Español'],
                ['Estadounidense'],
                ['Argentina / Argentino'],
                ['Guatemalteca / Guatemalteco'],
                ['China / Chino'],
                ['Hondureña / Hondureño'],
                ['Colombiana / Colombiano'],
                ['Costarricense'],
                ['Cubana / Cubano'],
                ['Chilena / Chileno'],
                ['Salvadoreña / Salvadoreño'],
                ['Nicaraguense'],
                ['Puertoriqueña / Puertoriqueño'],
                ['Alemana / Aleman'],
                ['Otras Nacionalidades'],

            )
        );

        ## CATALGO DE ZONA DE RIESGO
        $this->createTable('{{%czonasderiesgos}}', [
            'id' => $this->primaryKey(),
            'zona_riesgo' => $this->string(50)->notNull() . " COMMENT 'Zona de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('czonasderiesgos', array('zona_riesgo'), array(
            ['Area verde abandonada'],
            ['Casa abandonada'],
            ['Pocos transeuntes'],
            ['Poco alumbrado'],
            ['Falta de pavimentación']
        ));

        ## CATALGO DE HORARIO DE RIESGO
        $this->createTable('{{%chorariosderiesgos}}', [
            'id' => $this->primaryKey(),
            'horario_riesgo' => $this->string(50)->notNull() . " COMMENT 'Horario de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('chorariosderiesgos', array('horario_riesgo'), array(
            ['Mañana'],
            ['Tarde'],
            ['Noche']
        ));

        ## CATALOGO DE TIPO DE RIESGO
        $this->createTable('{{%ctiposderiesgos}}', [
            'id' => $this->primaryKey(),
            'tipo_riesgo' => $this->string(50)->notNull() . " COMMENT 'Tipo de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('ctiposderiesgos', array('tipo_riesgo'), array(
            ['Violación'],
            ['Secuestro'],
            ['Feminicidio'],
            ['Asalto'],
            ['Asalto a mano armada'],
            ['Trata de personas']
        ));

        ## CATALOGO DE RELACION-PARENTEZCO
        $this->createTable('{{%crelacioparentezco}}', [
            'id' => $this->primaryKey(),
            'relacion_parentezco' => $this->string(40)->notNull() . " COMMENT 'Relación - Parentezco' ",

        ], $tableOptions
        );

        $this->batchInsert('crelacioparentezco',
            array('relacion_parentezco'),
            array(
                ['Amiga / Amigo'],
                ['Compañera / Compañero'],
                ['Amasio'],
                ['Hermana / Hermano'],
                ['Hija / Hijo'],
                ['Jefa / Jefe'],
                ['Novio'],
                ['Madrastra / Padrastro'],
                ['Madre'],
                ['Padre'],
                ['Profesora / Profesor'],
                ['Suegra / Suegro'],
                ['Tia / Tio'],
                ['Vecina / Vecino'],
                ['Ex Pareja'],
                ['Concubinario'],
                ['Esposo'],
                ['Se desconoce'],
                ['Ninguna']

            )
        );

        ## CATALOGO DE COMO SE ENTERO DE LOS SERVICIOS
        $this->createTable('{{%centeroservicios}}', [
            'id' => $this->primaryKey(),
            'entero_servicio' => $this->string(50)->notNull() . " COMMENT 'Entero de los servicios' ",

        ], $tableOptions
        );
        $this->batchInsert('centeroservicios', array('entero_servicio'), array(
            ['Redes sociales'],
            ['Familiar'],
            ['Conocida(o)'],
            ['Folletería'],
        ));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180825_013942_catalogo_datos_identificacion cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180825_013942_catalogo_datos_identificacion cannot be reverted.\n";

        return false;
    }
    */
}
