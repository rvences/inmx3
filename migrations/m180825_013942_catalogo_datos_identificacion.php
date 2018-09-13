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
                ['Violencia Psicologica'],
                ['Violencia Física'],
                ['Violencia Económica'],
                ['Violencia Sexual'],
                ['Violencia Patrimonial'],
                ['Violencia Obstétrica'],
                ['Modalidad Familiar'],
                ['Modalidad Familiar Equiparada'],
                ['Modalidad Laboral'],
                ['Modalidad Institucional'],
                ['Modalidad Comunitaria'],
                ['Modalidad Escolar'],
                ['Modalidad Feminicida'],
                ['Modalidad De Género'],
                ['Modalidad Política'],
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
                ['Cruz Roja'],
                ['Cruz Verde'],
                ['Cruz Ambar'],
                ['Tránsito del Estado'],
                ['Tránsito Municipal'],
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
                /*
                ['AMBULANCIAS', 'CRUZ ROJA'],
                ['AMBULANCIAS', 'CRUZ ÁMBAR'],
                ['AMBULANCIAS', 'CRUZ VERDE'],
                */
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

        $this->batchInsert('ccolonias', array('id', 'colonia'), array(
            ['9999', 'NO EXISTE EN CATALOGO DE COLONIAS DE XALAPA'],
            ['9998', 'FORÁNEO DE XALAPA'],
        ));

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
        $this->createTable('{{%cniveles_riesgos}}', [
            'id' => $this->primaryKey(),
            'nivel_riesgo' => $this->string(50)->notNull() . " COMMENT 'Nivel de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('cniveles_riesgos', array('nivel_riesgo'), array(
            ['Bajo'],
            ['Medio'],
            ['Alto']
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

        ## CATALOGO DE MADRE SOLTERA
        $this->createTable('cmadres_solteras_apartir_de', [
            'id' => $this->primaryKey(),
            'apartir_de' => $this->string(20)->notNull(),
        ], $tableOptions);
        $this->batchInsert('cmadres_solteras_apartir_de', array('apartir_de'), array(
            ['Embarazo'],
            ['Adolescencia'],
            ['Divorcio'],
            ['Viudez'],
            ['Otro'],
        ));

        ## CATALOGO DE MUERTE EMBARAZO
        $this->createTable('ccausas_muertes_embarazos', [
            'id' => $this->primaryKey(),
            'causa_muerte' => $this->string(20)->notNull(),
        ], $tableOptions);
        $this->batchInsert('ccausas_muertes_embarazos', array('causa_muerte'), array(
            ['Violencia'],
            ['Violencia de género'],
            ['Enfermedad'],
            ['Accidente'],
            ['Otro'],
        ));

        ##CATALOGO DE ESTADOS CIVILES
        $this->createTable('{{%cestados_civiles}}', [
            'id' => $this->primaryKey(),
            'estado_civil' => $this->string(40)->notNull() . " COMMENT 'Estado Civil' ",

        ], $tableOptions
        );

        $this->batchInsert('cestados_civiles',
            array('estado_civil'),
            array(
                ['Casada(o)'],
                ['Concubina(o) ( Unión Libre)'],
                ['Divorciada(o)'],
                ['Soltera(o)'],
                ['Viuda(o)'],
                ['Amasiato'],
                ['Separada(o)'],
                ['Se Desconoce'],
                ['Noviazgo'],
            )
        );

        ##CATALOGO DE CONVIVENCIA
        $this->createTable('{{%cconvivencias}}', [
            'id' => $this->primaryKey(),
            'convivencia' => $this->string(40)->notNull() . " COMMENT 'Convivencias' ",

        ], $tableOptions
        );
        $this->batchInsert('cconvivencias',
            array('convivencia'),
            array(
                ['Sola'],
                ['Hijas(os)'],
                ['Amigas(os)'],
                ['Hermana(o)'],
                ['Padres'],
                ['Madre'],
                ['Padre'],
                ['Familia extensa'],
                ['Otros'],
            )
        );

        ##CATALOGO TIPOS DE VIVIENDAS
        $this->createTable('ctipos_viviendas', [
            'id' => $this->primaryKey(),
            'tipo_vivienda' => $this->string(100)
        ], $tableOptions);
        $this->batchInsert('ctipos_viviendas',
            array('tipo_vivienda'),
            array(
                ['Prestada'],
                ['Rentada'],
                ['Propia'],
                ['Pensión'],
                ['De mi pareja'],
                ['De un familiar'],
                ['No tengo']

            ));

        #CATALOGO DE SERVICIOS BASICOS
        $this->createTable('cservicios_basicos', [
            'id' => $this->primaryKey(),
            'servicio_basico' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cservicios_basicos',
            array('servicio_basico'),
            array(
                ['Agua potable'],
                ['Drenaje'],
                ['Recolección de basura'],
                ['Alumbrado público'],
                ['Energía eléctrica'],
                ['Teléfonos Públicos'],
            ));


        ##CATALOGO DE NIVELES DE ESTUDIO
        $this->createTable('cniveles_estudios', [
            'id' => $this->primaryKey(),
            'nivel_estudio' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cniveles_estudios',
            array('nivel_estudio'),
            array(
                ['Primaria'],
                ['Secundaria'],
                ['Preparatoria / Bachillerato'],
                ['Preescolar o Kinder'],
                ['Carrera Técnica o Comercial'],
                ['Licenciatura'],
                ['Posgrado'],
                ['Maestria'],
                ['Doctorado'],
                ['Analfabeta'],
                ['Sabe leer - escribir']
            ));


        ## CATALOGO ESTADO DE ESTUDIOS
        $this->createTable('cstatus_estudios', [
            'id' => $this->primaryKey(),
            'status_estudio' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cstatus_estudios',
            array('status_estudio'),
            array(
                ['Terminado'],
                ['Inconcluso']
            ));

        ## CATALOGO DE OCUPACIONES
        $this->createTable('cocupaciones', [
            'id' => $this->primaryKey(),
            'ocupacion' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cocupaciones',
            array('ocupacion'),
            array(
                ['Agricultura'],
                ['Explotación Forestal'],
                ['Ganadería'],
                ['Pesca'],
                ['Construcción'],
                ['Electricidad, Gas y Agua'],
                ['Industria Manufacturera'],
                ['Mineria'],
                ['Comercio'],
                ['Comunicaciones'],
                ['Servicios'],
                ['Transporte'],
                ['Labores del hogar'],
                ['Empleado(a)'],
                ['Estudia'],
                ['Empleada del hogar'],
                ['Cuidado de hijas(os)'],
                ['Cuidado de nietas(os)'],
                ['Cuidado de enfermas(os)']


            ));

        ##CATALOGO DE FUENTES DE INGRESOS
        $this->createTable('cfuentes_ingresos', [
            'id' => $this->primaryKey(),
            'fuente_ingresos' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cfuentes_ingresos',
            array('fuente_ingresos'),
            array(
                ['Autoconsumo'],
                ['Pago en especie'],
                ['Jubilada(o)'],
                ['Pensionada(o)'],
                ['Beca'],
                ['Empleada(o)'],
                ['Comercio informal'],
                ['Comercio formal'],
                ['Autoempleada']
            ));

        ##CATALOGO DE PROGRAMAS SOCIALES
        $this->createTable('cprogramassociales', [
            'id' => $this->primaryKey(),
            'programa_social' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cprogramassociales',
            array('programa_social'),
            array(
                ['Prospera ( Programa de Inclusión Social )'],
                ['Seguro de Vida para Jefas de Familia'],
                ['Programa de Apoyo Alimentario ( PAL )'],
                ['Pensión para Adultos Mayores'],
                ['Estancias Infantiles'],
                ['Programa de Abasto Rural ( DICONSA )'],
                ['Abasto Social de Leche ( LICONSA )'],
                ['Personas Adultas Mayores'],
                ['Programa de Empleo Temporal'],
                ['Programa de Atención a Jornaleros Agrícolas'],
                ['3x1 Para migrantes'],
                ['Fomento de las Artesanías'],
                ['Desarrollo de Zonas Prioritarias'],
                ['Opciones Productivas'],
                ['Programa de Conversión Social'],
                ['Seguro Popular'],
                ['Educación para Adultos']
            ));

        ## CATALOGO DE SERVICIOS MEDICOS
        $this->createTable('cserviciosmedicos', [
            'id' => $this->primaryKey(),
            'servicio_medico' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cserviciosmedicos',
            array('servicio_medico'),
            array(
                ['IMSS'],
                ['IMSS Oportunidades'],
                ['ISSSTE'],
                ['PEMEX'],
                ['Secretaria de Salud'],
                ['SEDENA'],
                ['Seguro Popular'],
                ['Seguro Privado'],
                ['SEMAR'],
                ['Medicina Tradicional'],
                ['Casa de Salud']
            ));

        ## CATALOGO DE ENFERMEDADES
        $this->createTable('cenfermedades', [
            'id' => $this->primaryKey(),
            'enfermedad' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cenfermedades',
            array('enfermedad'),
            array(
                ['Artritis'],
                ['Cancer'],
                ['Asma'],
                ['Diabetes'],
                ['Enfermedades Cardiovasculares'],
                ['Enfermedades Renales'],
                ['Epilepsia'],
                ['Gastritis'],
                ['Gota'],
                ['Hepatitis'],
                ['Hipertensión'],
                ['ITS'],
                ['SIDA'],
                ['Trastorno Psiquiátrico'],
                ['Desnutrición'],
                ['Cancer de Mama'],
                ['Cancer Cervicouterino'],
                ['Lucemia']
            ));

        ## CATALOGO DE AUTOCUIDADO
        $this->createTable('cautocuidados', [
            'id' => $this->primaryKey(),
            'autocuidado' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cautocuidados',
            array('autocuidado'),
            array(
                ['Sexual y reproductiva'],
                ['Preventiva'],
                ['Desarrollo humano'],
            ));

        ## CATALOGO DE DISCAPACIDADES
        $this->createTable('cdiscapacidades', [
            'id' => $this->primaryKey(),
            'discapacidad' => $this->string(100)
        ], $tableOptions);

        $this->batchInsert('cdiscapacidades',
            array('discapacidad'),
            array(
                ['Auditiva'],
                ['Cognitiva'],
                ['Lenguaje'],
                ['Motriz'],
                ['Visual'],
            ));

        ## CATALOGO TIPO VIOLENCIA GENERO
        $this->createTable('{{%ctipos_violencias}}', [
            'id' => $this->primaryKey(),
            'tipo_violencia' => $this->string(20)->notNull() . " COMMENT 'Tipos de Violencia' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipos_violencias',
            array('tipo_violencia'),
            array(
                ['Psicologica'],
                ['Física'],
                ['Económica'],
                ['Sexual'],
                ['Patrimonial'],
                ['Obstétrica']
            ));

        $this->createTable('{{%cmodalidades_violencias}}', [
            'id' => $this->primaryKey(),
            'modalidad_violencia' => $this->string(30)->notNull() . " COMMENT 'Modalidad Violenta' ",

        ], $tableOptions);

        $this->batchInsert('cmodalidades_violencias',
            array('modalidad_violencia'),
            array(
                ['Familiar'],
                ['Familiar Equiparada'],
                ['Laboral'],
                ['Institucional'],
                ['Comunitaria'],
                ['Escolar'],
                ['Feminicida'],
                ['De Género'],
                ['Política'],
            ));

        $this->createTable('{{%clugares_violencias}}', [
            'id' => $this->primaryKey(),
            'lugar_violencia' => $this->string(45)->notNull() . " COMMENT 'Lugar de Violencia' ",

        ], $tableOptions);

        $this->batchInsert('clugares_violencias',
            array('lugar_violencia'),
            array(
                ['Espacio particular'],
                ['Espacio público'],
                ['Transporte privado'],
                ['Transporte urbano'],
                ['Centro de Trabajo'],
                ['Institución Pública'],
                ['Institución Privada'],
                ['Instituciones Gubernamentales'],
                ['Bares y Antros'],
                ['Centro Comercial'],
                ['Centro Deportivo'],
                ['Centro Cultural'],
                ['Escuela o Colegio'],
                ['Hospital'],
                ['Templo / Iglesia'],
                ['Parque'],
                ['Mercado'],
                ['Aeropuerto'],
                ['Central de Autobuses'],
                ['Estacionamiento'],
                ['Empresa'],
                ['Negocio'],
                ['Institución'],
                ['Organismo Gubernamental'],
                ['Calle'],
                ['Salón Social / Ejidal'],
                ['Camino Vecinal'],
                ['Terreno Baldío'],
                ['Sembradío'],
                ['Playa'],
                ['Rio'],
                ['Autobus'],
                ['Taxi'],
                ['Microbus'],
                ['Combis'],
                ['Lancha'],
                ['Barco'],
                ['Avión'],
                ['Ferrocarril'],
                ['Camión'],
                ['Camión de Carga/Trailer'],
                ['Camioneta'],
                ['Ninguno'],
            ));

        $this->createTable('{{%csintomatologias_emocionales}}', [
            'id' => $this->primaryKey(),
            'sintomatologia_emocional' => $this->string(40)->notNull() . " COMMENT 'Sintomatología Emocional' ",

        ], $tableOptions
        );

        $this->batchInsert('csintomatologias_emocionales',
            array('sintomatologia_emocional'),
            array(
                ['Baja Autoestima'],
                ['Ansiedad'],
                ['Estrés'],
                ['Depresión'],
                ['Trastorno del Sueño'],
                ['Dependencia Emocional'],
                ['Afectación Emocional'],
                ['Miedo'],
                ['Trastorno de Alimentación'],
                ['Sentimientos de Indefinición'],
                ['Persecución'],
                ['Sumisión'],
                ['Falta de Habilidades Sociales'],
                ['Somatizaciones'],
                ['Perplejidad'],
                ['Bloqueo Cognitivo'],
                ['Descontrol'],
                ['Verguenza'],
                ['Agotamiento Psíquico'],
                ['Sentimiento de Culpa'],
            )
        );

        $this->createTable('{{%csintomatologias_fisicas}}', [
            'id' => $this->primaryKey(),
            'sintomatologia_fisica' => $this->string(40)->notNull() . " COMMENT 'Sintomatología Física' ",

        ], $tableOptions
        );

        $this->batchInsert('csintomatologias_fisicas',
            array('sintomatologia_fisica'),
            array(
                ['Cefalea'],
                ['Dolor Crónico en General'],
                ['Cervicalgia'],
                ['Mareo'],
                ['Molestias Gastrointestinales'],
                ['Molestias Pélvicas'],
            )
        );

        $this->createTable('{{%ccreencias}}', [
            'id' => $this->primaryKey(),
            'creencia' => $this->string(50)->notNull() . " COMMENT 'Creencia' ",

        ], $tableOptions
        );

        $this->batchInsert('ccreencias',
            array('creencia'),
            array(
                ['Justificación de agresiones'],
                ['Creencia real de lo que dice el otro'],
                ['Creencias tradicionales roles de género'],
                ['Resignación'],
                ['Fatalismo'],
                ['Voluntad poco firme de superación'],
            )
        );

        $this->createTable('{{%cfactores_psicosociales}}', [
            'id' => $this->primaryKey(),
            'factor_psicosocial' => $this->string(40)->notNull() . " COMMENT 'Factor Psicosocial' ",

        ], $tableOptions
        );

        $this->batchInsert('cfactores_psicosociales',
            array('factor_psicosocial'),
            array(
                ['Hijos'],
                ['Su propia familia no la apoya'],
                ['No trabaja'],
                ['No tiene un lugar dode vivir'],
                ['Revictimización'],
                ['Tratamiento psiquiátrico'],
                ['Otro'],
            )
        );

        $this->createTable('{{%crelaciones_parejas}}', [
            'id' => $this->primaryKey(),
            'relacion_pareja' => $this->string(50)->notNull() . " COMMENT 'Relación de Pareja' ",

        ], $tableOptions
        );

        $this->batchInsert('crelaciones_parejas',
            array('relacion_pareja'),
            array(
                ['Roles de pareja desiguales'],
                ['Ambivalencia afectiva en el agresor'],
                ['Falta de libertad'],
                ['Autonomía'],
                ['Ciclo de la violencia'],
                ['Tiempo de convivencia'],
                ['Agresiones previas a la denuncia'],
                ['Adaptación psicológica'],

            )
        );

        $this->createTable('{{%crelatos}}', [
            'id' => $this->primaryKey(),
            'relato' => $this->string(50)->notNull() . " COMMENT 'Relato' ",

        ], $tableOptions
        );

        $this->batchInsert('crelatos',
            array('relato'),
            array(
                ['Credibilidad del relato'],
                ['Coherente'],
                ['Con afectación emocional'],
                ['Con lagunas'],
                ['Discurso sobre la relación de pareja'],
                ['Resistencia a evocar recuerdos negativos'],
                ['Riqueza de detalles'],
            )
        );

        $this->createTable('{{%crelaciones_sociales}}', [
            'id' => $this->primaryKey(),
            'relacion_social' => $this->string(30)->notNull() . " COMMENT 'Relación Social' ",

        ], $tableOptions
        );

        $this->batchInsert('crelaciones_sociales',
            array('relacion_social'),
            array(
                ['Aislamiento'],
                ['Desadaptación Social'],
                ['Desadaptación Laboral'],
                ['Círculo relacional'],
            )
        );

        $this->createTable('{{%ctipos_demandas}}', [
            'id' => $this->primaryKey(),
            'tipo_demanda' => $this->string(20)->notNull() . " COMMENT 'Tipo Demanda' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipos_demandas',
            array('tipo_demanda'),
            array(
                ['Penal'],
                ['Civil'],
                ['Laboral'],
                ['Mercantil'],
                ['Otra']
            )
        );

        $this->createTable('{{%cdrogas_agresiones}}', [
            'id' => $this->primaryKey(),
            'droga_agresion' => $this->string(40)->notNull() . " COMMENT 'Droga en la Agresión' ",

        ], $tableOptions
        );

        $this->batchInsert('cdrogas_agresiones',
            array('droga_agresion'),
            array(
                ['Alcohol'],
                ['Droga Ilegal'],
                ['Droga por indicación Médica'],
                ['Ninguna']
            )
        );

        $this->createTable('{{%cfrecuencias_agresiones}}', [
            'id' => $this->primaryKey(),
            'frecuencia_agresion' => $this->string(40)->notNull() . " COMMENT 'Frecuencia en la Agresión' ",

        ], $tableOptions
        );

        $this->batchInsert('cfrecuencias_agresiones',
            array('frecuencia_agresion'),
            array(
                ['Diario'],
                ['Varias veces a la semana'],
                ['Varias veces al mes'],
                ['Ocasionalmente'],
                ['Cada mes'],
                ['Única vez']
            )
        );

        $this->createTable('{{%carmas_agresores}}', [
            'id' => $this->primaryKey(),
            'arma_agresor' => $this->string(40)->notNull() . " COMMENT 'Armas del Agresor' ",

        ], $tableOptions
        );

        $this->batchInsert('carmas_agresores',
            array('arma_agresor'),
            array(
                ['Arma de fuego corta'],
                ['Arma de fuego larga'],
                ['Cuchillo'],
                ['Hacha'],
                ['Machete'],
                ['Navaja'],
                ['Picahielos'],
                ['Tijeras'],
                ['Ninguna'],
                ['Se ignora'],
                ['Otra']
            )
        );

        $this->createTable('{{%clesiones_fisicas}}', [
            'id' => $this->primaryKey(),
            'lesion_fisica' => $this->string(40)->notNull() . " COMMENT 'Lesión Física' ",

        ], $tableOptions
        );

        $this->batchInsert('clesiones_fisicas',
            array('lesion_fisica'),
            array(
                ['Contusión / Golpe'],
                ['Hematoma ( Moretón)'],
                ['Corte o Desgarre de la piel'],
                ['Fractura'],
                ['Quemadura'],
                ['Mordedura'],
                ['Raspadura'],
                ['Tentativa de Ahorcamiento']
            )
        );

        $this->createTable('{{%clesiones_agentes}}', [
            'id' => $this->primaryKey(),
            'lesion_agente' => $this->string(40)->notNull() . " COMMENT 'Agente' ",

        ], $tableOptions
        );

        $this->batchInsert('clesiones_agentes',
            array('lesion_agente'),
            array(
                ['Arma de fuego ( Bala)'],
                ['Arma Punzocortante'],
                ['Automóvil/Motocicleta'],
                ['Pie/Mano'],
            )
        );

        $this->createTable('{{%careas_lesionadas}}', [
            'id' => $this->primaryKey(),
            'area_lesionada' => $this->string(40)->notNull() . " COMMENT 'Area lesionada' ",

        ], $tableOptions
        );

        $this->batchInsert('careas_lesionadas',
            array('area_lesionada'),
            array(
                ['Cabeza'],
                ['Cara'],
                ['Cuello'],
                ['Extremidades Inferiores'],
                ['Extremidades Superiores']
            )
        );

        $this->createTable('{{%cdanos_psicologicos}}', [
            'id' => $this->primaryKey(),
            'dano_psicologico' => $this->string(40)->notNull() . " COMMENT 'Dano Psicologico' ",

        ], $tableOptions
        );

        $this->batchInsert('cdanos_psicologicos',
            array('dano_psicologico'),
            array(
                ['Angustia o Miedo'],
                ['Depresión'],
                ['Estrés Postraumático'],
                ['Insomnio'],
                ['Intento de Suicidio'],
                ['Peonso Suicidarse'],
                ['Trastornos Alimenticios'],
                ['Trastornos de Ansiedad'],
                ['Trastornos Psiquiátricos'],
                ['Tristeza o Aflicción'],
                ['Pérdida de Autonomía']
            )
        );

        $this->createTable('{{%cdanos_economicos}}', [
            'id' => $this->primaryKey(),
            'dano_economico' => $this->string(45)->notNull() . " COMMENT 'Dano Economico' ",

        ], $tableOptions
        );

        $this->batchInsert('cdanos_economicos',
            array('dano_economico'),
            array(
                ['Interrupción de Estudios'],
                ['No le da contribución económica'],
                ['La explota laboralmente'],
                ['Le quita su dinero'],
                ['Perdió propiedades'],
                ['Perdió trabajo'],
                ['No la deja trabajar']
            )
        );

        $this->createTable('{{%cindicadores_riesgos}}', [
            'id' => $this->primaryKey(),
            'indicador_riesgo' => $this->string()->notNull() . " COMMENT 'Indicador de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('cindicadores_riesgos',
            array('indicador_riesgo'),
            array(
                ['* Ataques previos con riesgo mortal'],
                ['* Amenazas de muerte a la victima'],
                ['* El agresor irrespeta las medidas de protección'],
                ['* El agresor es convicto o exconvicto por delitos contra las personas'],
                ['* El agresor tiene una acusación o condena previa por delitos contra la integridad fisica o sexual de las personas'],
                ['* Intento o amenaza de suicidio de parte del agresor'],
                ['* La víctima considera que el agresor es capaz de matarla'],
                ['* La víctima está aislada o retenida por el agresor contra su propia voluntad o lo ha estado previamente'],
                ['* Abuso sexual del agresor contra los hijos u otras personas menores de edad de la familia cercana, asi como tentativa de realizarlo'],
                ['El agresor pertenece a una institución policial, fuerzas armadas o procuración de justicia'],
                ['Hay abuso físico contra los hijos/as o la víctima y/o hijos/jas han sido amenazados o heridos con arma de fuego o blanca'],
                ['La víctima es recientemente separada, ha anunciado que piensa separarse, ha puesto una denuncia penal o han solicitado medidas de protección'],
                ['Abuso de alcohol o drogas por parte del agresor'],
                ['Aumento de la frecuencia y gravedad de la violencia'],
                ['La víctima ha recibido atención en salud como consecuencia de la agresiones o ha recibido atención psiquiátrica'],
                ['El agresor tiene antecedentes psiquiátricos'],
                ['El agresor es una persona que tiene conocimiento en el uso, acceso, trabaja o porta armas de fuego'],
                ['Resistencia violenta a la intervención policial o a la de otras figuras de autoridad'],
                ['Acoso, control o amedrentamiento sistemático de la víctima'],
                ['Que haya matado mascotas'],
            )
        );

        $this->createTable('{{%ctipos_canalizaciones}}', [
            'id' => $this->primaryKey(),
            'tipo_canalizacion' => $this->string(20)->notNull() . " COMMENT 'Tipos de Canalizaciones' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipos_canalizaciones',
            array('tipo_canalizacion'),
            array(
                ['Psicologica'],
                ['Jurídica'],
            ));

        $this->createTable('{{%ctipos_seguimientos}}', [
            'id' => $this->primaryKey(),
            'tipo_seguimiento' => $this->string(20)->notNull() . " COMMENT 'Tipos de Seguimiento' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipos_seguimientos',
            array('tipo_seguimiento'),
            array(
                ['Psicologico'],
                ['Jurídico'],
                ['Telefónico'],
                ['Presencial'],
            ));

        $this->createTable('{{%cencuesta_calificaciones}}', [
            'id' => $this->primaryKey(),
            'calificacion' => $this->string(20)->notNull() . " COMMENT 'Calificaciones' ",

        ], $tableOptions
        );

        $this->batchInsert('cencuesta_calificaciones',
            array('calificacion'),
            array(
                ['EXCELENTE'],
                ['BUENA'],
                ['REGULAR'],
                ['MALA'],
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
