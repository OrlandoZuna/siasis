<?php

use Illuminate\Database\Seeder;

class ClasificadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Clasificador::create([
            'codigo'=>'10000',
            'descripcion'=>'SERVICIOS PERSONALES',
            'codigo_minimo'=>'1',
            'clasificador_id'=>0,
            'nivel'=>'General'
        ]);//1
        \App\Clasificador::create([
            'codigo'=>'20000',
            'descripcion'=>'SERVICIOS GENERALES',
            'codigo_minimo'=>'2',
            'clasificador_id'=>0,
            'nivel'=>'General'
        ]);//2
        \App\Clasificador::create([
            'codigo'=>'30000',
            'descripcion'=>'MATERIALES Y SUMINISTROS',
            'codigo_minimo'=>'3',
            'clasificador_id'=>0,
            'nivel'=>'General'
        ]);//3
        \App\Clasificador::create([
            'codigo'=>'40000',
            'descripcion'=>'ACTIVOS REALES',
            'codigo_minimo'=>'4',
            'clasificador_id'=>0,
            'nivel'=>'General'
        ]);//4
        \App\Clasificador::create([
            'codigo'=>'80000',
            'descripcion'=>'PARTICIPACIONES Y APORTACIONES',
            'codigo_minimo'=>'8',
            'clasificador_id'=>0,
            'nivel'=>'General'
        ]);//5
        \App\Clasificador::create([
            'codigo'=>'41000',
            'descripcion'=>'INMOBILIARIOS',
            'codigo_minimo'=>'41',
            'clasificador_id'=>4,
            'nivel'=>'Clasificador'
        ]);//6
        \App\Clasificador::create([
            'codigo'=>'42000',
            'descripcion'=>'CONSTRUCCIONES',
            'codigo_minimo'=>'42',
            'clasificador_id'=>4,
            'nivel'=>'Clasificador'
        ]);//7
        \App\Clasificador::create([
            'codigo'=>'43000',
            'descripcion'=>'MAQUINARIA Y EQUIPO',
            'codigo_minimo'=>'43',
            'clasificador_id'=>4,
            'nivel'=>'Clasificador'
        ]);//8
        \App\Clasificador::create([
            'codigo'=>'46000',
            'descripcion'=>'ESTUDIOS Y PROYECTOS PARA INVERSIÓN',
            'codigo_minimo'=>'46',
            'clasificador_id'=>4,
            'nivel'=>'Clasificador'
        ]);//9
        \App\Clasificador::create([
            'codigo'=>'49000',
            'descripcion'=>'OTROS ACTIVOS',
            'codigo_minimo'=>'49',
            'clasificador_id'=>4,
            'nivel'=>'Clasificador'
        ]);//10
        \App\Clasificador::create([
            'codigo'=>'41100',
            'descripcion'=>'EDIFICIOS',
            'codigo_minimo'=>'411',
            'clasificador_id'=>6,
            'nivel'=>'Grupo'
        ]);//11
        \App\Clasificador::create([
            'codigo'=>'41200',
            'descripcion'=>'TIERRAS Y TERRENOS',
            'codigo_minimo'=>'412',
            'clasificador_id'=>6,
            'nivel'=>'Grupo'
        ]);//12
        \App\Clasificador::create([
            'codigo'=>'41300',
            'descripcion'=>'OTRAS ADQUISICIONES',
            'codigo_minimo'=>'413',
            'clasificador_id'=>6,
            'nivel'=>'Grupo'
        ]);//13
        \App\Clasificador::create([
            'codigo'=>'42200',
            'descripcion'=>'CONSTRUCCIONES Y MEJORAS DE BIENES PÚBLICOS NACIONALES DE DOMINIO PRIVADO',
            'codigo_minimo'=>'422',
            'clasificador_id'=>7,
            'nivel'=>'Grupo'
        ]);//14
        \App\Clasificador::create([
            'codigo'=>'42300',
            'descripcion'=>'CONSTRUCCIONES Y MEJORAS DE BIENES NACIONALES DE DOMINIO PÚBLICO',
            'codigo_minimo'=>'423',
            'clasificador_id'=>7,
            'nivel'=>'Grupo'
        ]);//15
        \App\Clasificador::create([
            'codigo'=>'43100',
            'descripcion'=>'EQUIPO DE OFICINA Y MUEBLES',
            'codigo_minimo'=>'431',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//16
        \App\Clasificador::create([
            'codigo'=>'43200',
            'descripcion'=>'MAQUINARIA Y EQUIPO DE PRODUCCIÓN',
            'codigo_minimo'=>'432',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//17
        \App\Clasificador::create([
            'codigo'=>'43300',
            'descripcion'=>'EQUIPO DE TRANSPORTE, TRACCIÓN Y ELEVACIÓN',
            'codigo_minimo'=>'433',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//18
        \App\Clasificador::create([
            'codigo'=>'43400',
            'descripcion'=>'EQUIPO MÉDICO Y DE LABORATORIO',
            'codigo_minimo'=>'434',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//19
        \App\Clasificador::create([
            'codigo'=>'43500',
            'descripcion'=>'EQUIPO DE COMUNICACIÓN',
            'codigo_minimo'=>'435',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//20
        \App\Clasificador::create([
            'codigo'=>'43600',
            'descripcion'=>'EQUIPO EDUCACIONAL Y RECREATIVO',
            'codigo_minimo'=>'436',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//21
        \App\Clasificador::create([
            'codigo'=>'43700',
            'descripcion'=>'OTRA MAQUINARIA Y EQUIPO',
            'codigo_minimo'=>'437',
            'clasificador_id'=>8,
            'nivel'=>'Grupo'
        ]);//22
        \App\Clasificador::create([
            'codigo'=>'46100',
            'descripcion'=>'PARA CONSTRUCCIONES DE BIENES PÚBLICOS DE DOMINIO PRIVADO',
            'codigo_minimo'=>'461',
            'clasificador_id'=>9,
            'nivel'=>'Grupo'
        ]);//23
        \App\Clasificador::create([
            'codigo'=>'46200',
            'descripcion'=>'PARA CONSTRUCCIONES DE BIENES DE DOMINIO PÚBLICO',
            'codigo_minimo'=>'462',
            'clasificador_id'=>9,
            'nivel'=>'Grupo'
        ]);//24
        \App\Clasificador::create([
            'codigo'=>'46300',
            'descripcion'=>'CONSULTORÍA PARA CAPACITACIÓN, TRANSFERENCIA DE TECNOLOGÍA Y ORGANIZACIÓN PARA PROCESOS PRODUCTIVOS, EN PROYECTOS DE INVERSIÓN ESPECÍFICOS',
            'codigo_minimo'=>'463',
            'clasificador_id'=>9,
            'nivel'=>'Grupo'
        ]);//25
        \App\Clasificador::create([
            'codigo'=>'49100',
            'descripcion'=>'ACTIVOS INTANGIBLES',
            'codigo_minimo'=>'491',
            'clasificador_id'=>10,
            'nivel'=>'Grupo'
        ]);//26
        \App\Clasificador::create([
            'codigo'=>'49300',
            'descripcion'=>'SEMOVIENTES Y OTROS ANIMALES',
            'codigo_minimo'=>'493',
            'clasificador_id'=>10,
            'nivel'=>'Grupo'
        ]);//27
        \App\Clasificador::create([
            'codigo'=>'49400',
            'descripcion'=>'ACTIVOS MUSEOLÓGICOS Y CULTURALES',
            'codigo_minimo'=>'494',
            'clasificador_id'=>10,
            'nivel'=>'Grupo'
        ]);//28
        \App\Clasificador::create([
            'codigo'=>'49900',
            'descripcion'=>'OTROS',
            'codigo_minimo'=>'499',
            'clasificador_id'=>10,
            'nivel'=>'Grupo'
        ]);//29
        \App\Clasificador::create([
            'codigo'=>'11000',
            'descripcion'=>'EMPLEADOS PERMANENTES',
            'codigo_minimo'=>'11',
            'clasificador_id'=>1,
            'nivel'=>'Clasificador'
        ]);//30
        \App\Clasificador::create([
            'codigo'=>'11100',
            'descripcion'=>'HABERES BASICOS',
            'codigo_minimo'=>'111',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//31
        \App\Clasificador::create([
            'codigo'=>'11200',
            'descripcion'=>'BONO ANTIGUEDAD',
            'codigo_minimo'=>'112',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//32
        \App\Clasificador::create([
            'codigo'=>'11210',
            'descripcion'=>'CATEGORIA MAGISTERIO',
            'codigo_minimo'=>'1121',
            'clasificador_id'=>32,
            'nivel'=>'Grupo'
        ]);//33
        \App\Clasificador::create([
            'codigo'=>'11220',
            'descripcion'=>'BONO ANTIGUEDAD',
            'codigo_minimo'=>'1122',
            'clasificador_id'=>32,
            'nivel'=>'Grupo'
        ]);//34
        \App\Clasificador::create([
            'codigo'=>'11300',
            'descripcion'=>'BONIFICACIONES',
            'codigo_minimo'=>'113',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//35
        \App\Clasificador::create([
            'codigo'=>'11310',
            'descripcion'=>'BONO FRONTERA',
            'codigo_minimo'=>'1131',
            'clasificador_id'=>35,
            'nivel'=>'Grupo'
        ]);//36
        \App\Clasificador::create([
            'codigo'=>'11320',
            'descripcion'=>'RENUMERACION COLATERALES MEDICAS Y DE TRABAJ EN SALUD',
            'codigo_minimo'=>'1121',
            'clasificador_id'=>35,
            'nivel'=>'Grupo'
        ]);//37
        \App\Clasificador::create([
            'codigo'=>'11321',
            'descripcion'=>'CATEGORIAS MEDICAS',
            'codigo_minimo'=>'11321',
            'clasificador_id'=>37,
            'nivel'=>'Grupo'
        ]);//38
        \App\Clasificador::create([
            'codigo'=>'11322',
            'descripcion'=>'ESCALAFON MEDICO',
            'codigo_minimo'=>'11322',
            'clasificador_id'=>37,
            'nivel'=>'Grupo'
        ]);//39
        \App\Clasificador::create([
            'codigo'=>'11323',
            'descripcion'=>'ESCALAFON DE TRABAJO EN SALUD',
            'codigo_minimo'=>'11323',
            'clasificador_id'=>37,
            'nivel'=>'Grupo'
        ]);//40
        \App\Clasificador::create([
            'codigo'=>'11324',
            'descripcion'=>'OTRAS RENUMERACIONES',
            'codigo_minimo'=>'11324',
            'clasificador_id'=>37,
            'nivel'=>'Grupo'
        ]);//41
        \App\Clasificador::create([
            'codigo'=>'11330',
            'descripcion'=>'OTRAS BONIFICACIONES',
            'codigo_minimo'=>'1133',
            'clasificador_id'=>35,
            'nivel'=>'Grupo'
        ]);//42
        \App\Clasificador::create([
            'codigo'=>'11400',
            'descripcion'=>'AGUINALDOS',
            'codigo_minimo'=>'114',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//43
        \App\Clasificador::create([
            'codigo'=>'11500',
            'descripcion'=>'PRIMAS Y BONOS DE PRODUCCION',
            'codigo_minimo'=>'115',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//44
        \App\Clasificador::create([
            'codigo'=>'11510',
            'descripcion'=>'PRIMAS',
            'codigo_minimo'=>'1151',
            'clasificador_id'=>44,
            'nivel'=>'Grupo'
        ]);//45
        \App\Clasificador::create([
            'codigo'=>'11520',
            'descripcion'=>'BONO DE PRODUCCION',
            'codigo_minimo'=>'1152',
            'clasificador_id'=>36,
            'nivel'=>'Grupo'
        ]);//46
        \App\Clasificador::create([
            'codigo'=>'11600',
            'descripcion'=>'ASIGNACIONES FAMILIARES',
            'codigo_minimo'=>'116',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//47
        \App\Clasificador::create([
            'codigo'=>'11700',
            'descripcion'=>'SUELDOS',
            'codigo_minimo'=>'117',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//48
        \App\Clasificador::create([
            'codigo'=>'11800',
            'descripcion'=>'DIETAS',
            'codigo_minimo'=>'118',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//49
        \App\Clasificador::create([
            'codigo'=>'11810',
            'descripcion'=>'DIETAS DE DIRECTORIO',
            'codigo_minimo'=>'1181',
            'clasificador_id'=>49,
            'nivel'=>'Grupo'
        ]);//50
        \App\Clasificador::create([
            'codigo'=>'11820',
            'descripcion'=>'OTRAS DIETAS',
            'codigo_minimo'=>'1182',
            'clasificador_id'=>49,
            'nivel'=>'Grupo'
        ]);//51
        \App\Clasificador::create([
            'codigo'=>'11900',
            'descripcion'=>'OTROS SERVICIOS PERSONALES',
            'codigo_minimo'=>'119',
            'clasificador_id'=>30,
            'nivel'=>'Grupo'
        ]);//52
        \App\Clasificador::create([
            'codigo'=>'11910',
            'descripcion'=>'HORAS EXTRAORDINARIAS',
            'codigo_minimo'=>'1191',
            'clasificador_id'=>52,
            'nivel'=>'Grupo'
        ]);//53
        \App\Clasificador::create([
            'codigo'=>'11920',
            'descripcion'=>'VACAIONES NO UTILIZADAS',
            'codigo_minimo'=>'1192',
            'clasificador_id'=>52,
            'nivel'=>'Grupo'
        ]);//54
        \App\Clasificador::create([
            'codigo'=>'11930',
            'descripcion'=>'INCENTIVOS ECONOMICOS',
            'codigo_minimo'=>'1193',
            'clasificador_id'=>52,
            'nivel'=>'Grupo'
        ]);//55
        \App\Clasificador::create([
            'codigo'=>'11940',
            'descripcion'=>'SUPLENCIAS',
            'codigo_minimo'=>'1194',
            'clasificador_id'=>52,
            'nivel'=>'Grupo'
        ]);//56
        \App\Clasificador::create([
            'codigo'=>'12000',
            'descripcion'=>'EMPLADOS NO PERMANENTES',
            'codigo_minimo'=>'12',
            'clasificador_id'=>1,
            'nivel'=>'Clasificador'
        ]);//57
        \App\Clasificador::create([
            'codigo'=>'12100',
            'descripcion'=>'PERSONAL EVENTUAL',
            'codigo_minimo'=>'121',
            'clasificador_id'=>57,
            'nivel'=>'Grupo'
        ]);//58
        \App\Clasificador::create([
            'codigo'=>'13000',
            'descripcion'=>'PREVENCION SOCIAL',
            'codigo_minimo'=>'13',
            'clasificador_id'=>1,
            'nivel'=>'Clasificador'
        ]);//59
        \App\Clasificador::create([
            'codigo'=>'15000',
            'descripcion'=>'PREVENCION DE INSCREMENTO DE GASTOS EN SERVICOS PERSONALES',
            'codigo_minimo'=>'15',
            'clasificador_id'=>1,
            'nivel'=>'Clasificador'
        ]);//60
        \App\Clasificador::create([
            'codigo'=>'21000',
            'descripcion'=>'SERVICIOS BASICOS',
            'codigo_minimo'=>'21',
            'clasificador_id'=>2,
            'nivel'=>'Clasificador'
        ]);//61
        \App\Clasificador::create([
            'codigo'=>'21200',
            'descripcion'=>'ENERGIA ELECTRICA',
            'codigo_minimo'=>'212',
            'clasificador_id'=>61,
            'nivel'=>'Grupo'
        ]);//62
        \App\Clasificador::create([
            'codigo'=>'21300',
            'descripcion'=>'AGUA',
            'codigo_minimo'=>'213',
            'clasificador_id'=>61,
            'nivel'=>'Grupo'
        ]);//63
        \App\Clasificador::create([
            'codigo'=>'21400',
            'descripcion'=>'TELEFONIA',
            'codigo_minimo'=>'214',
            'clasificador_id'=>61,
            'nivel'=>'Grupo'
        ]);//64
        \App\Clasificador::create([
            'codigo'=>'21500',
            'descripcion'=>'GAS DOMICILIARIO',
            'codigo_minimo'=>'215',
            'clasificador_id'=>61,
            'nivel'=>'Grupo'
        ]);//65
        \App\Clasificador::create([
            'codigo'=>'21600',
            'descripcion'=>'INTERNET',
            'codigo_minimo'=>'216',
            'clasificador_id'=>61,
            'nivel'=>'Grupo'
        ]);//66
        \App\Clasificador::create([
            'codigo'=>'22000',
            'descripcion'=>'SERVICIO DE TRANSPORTE Y SEGUROS',
            'codigo_minimo'=>'22',
            'clasificador_id'=>2,
            'nivel'=>'Clasificador'
        ]);//67
        \App\Clasificador::create([
            'codigo'=>'22100',
            'descripcion'=>'PASAJES',
            'codigo_minimo'=>'221',
            'clasificador_id'=>67,
            'nivel'=>'Grupo'
        ]);//68
        \App\Clasificador::create([
            'codigo'=>'22110',
            'descripcion'=>'PASAJES AL INTERIOR DEL PAIS',
            'codigo_minimo'=>'2211',
            'clasificador_id'=>68,
            'nivel'=>'Grupo'
        ]);//69
        \App\Clasificador::create([
            'codigo'=>'22120',
            'descripcion'=>'PASAJES AL EXTERIOR DEL PAIS',
            'codigo_minimo'=>'2212',
            'clasificador_id'=>68,
            'nivel'=>'Grupo'
        ]);//70
        \App\Clasificador::create([
            'codigo'=>'22200',
            'descripcion'=>'VIATICOS',
            'codigo_minimo'=>'222',
            'clasificador_id'=>68,
            'nivel'=>'Grupo'
        ]);//71
        \App\Clasificador::create([
            'codigo'=>'22300',
            'descripcion'=>'FLETES Y ALMACENAIENTO',
            'codigo_minimo'=>'223',
            'clasificador_id'=>68,
            'nivel'=>'Grupo'
        ]);//72
        \App\Clasificador::create([
            'codigo'=>'22400',
            'descripcion'=>'gASTOS DE INSTALACION Y RETORNO',
            'codigo_minimo'=>'224',
            'clasificador_id'=>68,
            'nivel'=>'Grupo'
        ]);//73
        \App\Clasificador::create([
            'codigo'=>'31000',
            'descripcion'=>'ALIMENTOS Y PRODUCTOS AGROFORESTALES',
            'codigo_minimo'=>'31',
            'clasificador_id'=>3,
            'nivel'=>'Clasificador'
        ]);//74
        \App\Clasificador::create([
            'codigo'=>'31100',
            'descripcion'=>'ALIMENTOS Y BEBIDAS PARA EL DESAYUNO ESCOLAR Y OTROS',
            'codigo_minimo'=>'311',
            'clasificador_id'=>74,
            'nivel'=>'Grupo'
        ]);//75
        \App\Clasificador::create([
            'codigo'=>'31110',
            'descripcion'=>'GASTOS POR REFRIGERIO AL PERSONAL PERMANENTE EVENTUAL O CONSULTORES',
            'codigo_minimo'=>'3111',
            'clasificador_id'=>75,
            'nivel'=>'Grupo'
        ]);//76
        \App\Clasificador::create([
            'codigo'=>'31120',
            'descripcion'=>'GASTOS POR ALIMENTOS U OTROS SIMILARES',
            'codigo_minimo'=>'3112',
            'clasificador_id'=>75,
            'nivel'=>'Grupo'
        ]);//77
        \App\Clasificador::create([
            'codigo'=>'31130',
            'descripcion'=>'ALIMENTACION COMPLETEMENTARIA ESCOLAR',
            'codigo_minimo'=>'3113',
            'clasificador_id'=>75,
            'nivel'=>'Grupo'
        ]);//78
        \App\Clasificador::create([
            'codigo'=>'31140',
            'descripcion'=>'ALIMENTACIÓN HOSPITALARIA, PENITENCIARIA, AERONAVES Y OTRAS ESPECÍFICAS',
            'codigo_minimo'=>'3114',
            'clasificador_id'=>75,
            'nivel'=>'Grupo'
        ]);//79
        \App\Clasificador::create([
            'codigo'=>'31150',
            'descripcion'=>'ALIMENTOS Y BEBIDAS PARA LA ATENCIÓN DE EMERGENCIAS Y DESASTRES NATURALES',
            'codigo_minimo'=>'3115',
            'clasificador_id'=>75,
            'nivel'=>'Grupo'
        ]);//80
        \App\Clasificador::create([
            'codigo'=>'31200',
            'descripcion'=>'ALIMENTOS PARA ANIMALES',
            'codigo_minimo'=>'312',
            'clasificador_id'=>74,
            'nivel'=>'Grupo'
        ]);//81
        \App\Clasificador::create([
            'codigo'=>'31300',
            'descripcion'=>'PRODUCTOS AGRÍCOLAS, PECUARIOS Y FORESTALES',
            'codigo_minimo'=>'313',
            'clasificador_id'=>74,
            'nivel'=>'Grupo'
        ]);//82
        \App\Clasificador::create([
            'codigo'=>'32000',
            'descripcion'=>'PRODUCTOS DE PAPEL, CARTÓN E IMPRESOS',
            'codigo_minimo'=>'32',
            'clasificador_id'=>3,
            'nivel'=>'Clasificador'
        ]);//83
        \App\Clasificador::create([
            'codigo'=>'32100',
            'descripcion'=>'PAPEL',
            'codigo_minimo'=>'321',
            'clasificador_id'=>83,
            'nivel'=>'Grupo'
        ]);//84
        \App\Clasificador::create([
            'codigo'=>'32200',
            'descripcion'=>'PRODUCTOS DE ARTES GRÁFICAS',
            'codigo_minimo'=>'322',
            'clasificador_id'=>83,
            'nivel'=>'Grupo'
        ]);//85
        \App\Clasificador::create([
            'codigo'=>'32300',
            'descripcion'=>'LIBROS, MANUALES Y REVISTAS',
            'codigo_minimo'=>'323',
            'clasificador_id'=>83,
            'nivel'=>'Grupo'
        ]);//86
        \App\Clasificador::create([
            'codigo'=>'32400',
            'descripcion'=>'TEXTOS DE ENSEÑANZA',
            'codigo_minimo'=>'324',
            'clasificador_id'=>83,
            'nivel'=>'Grupo'
        ]);//87
        \App\Clasificador::create([
            'codigo'=>'32500',
            'descripcion'=>'PERIÓDICOS Y BOLETINES',
            'codigo_minimo'=>'325',
            'clasificador_id'=>83,
            'nivel'=>'Grupo'
        ]);//88
        \App\Clasificador::create([
            'codigo'=>'33000',
            'descripcion'=>'TEXTILES Y VESTUARIO',
            'codigo_minimo'=>'33',
            'clasificador_id'=>3,
            'nivel'=>'Clasificador'
        ]);//89
        \App\Clasificador::create([
            'codigo'=>'33100',
            'descripcion'=>'HILADOS, TELAS, FIBRAS Y ALGODÓN',
            'codigo_minimo'=>'331',
            'clasificador_id'=>89,
            'nivel'=>'Grupo'
        ]);//90
        \App\Clasificador::create([
            'codigo'=>'33200',
            'descripcion'=>'CONFECCIONES TEXTILES',
            'codigo_minimo'=>'332',
            'clasificador_id'=>89,
            'nivel'=>'Grupo'
        ]);//91
        \App\Clasificador::create([
            'codigo'=>'33300',
            'descripcion'=>'PRENDAS DE VESTIR',
            'codigo_minimo'=>'333',
            'clasificador_id'=>89,
            'nivel'=>'Grupo'
        ]);//92
        \App\Clasificador::create([
            'codigo'=>'33400',
            'descripcion'=>'CALZADOS',
            'codigo_minimo'=>'334',
            'clasificador_id'=>89,
            'nivel'=>'Grupo'
        ]);//93
        \App\Clasificador::create([
            'codigo'=>'34000',
            'descripcion'=>'COMBUSTIBLES, PRODUCTOS QUÍMICOS, FARMACÉUTICOS Y OTRAS FUENTES DE ENERGÍA',
            'codigo_minimo'=>'34',
            'clasificador_id'=>3,
            'nivel'=>'Clasificador'
        ]);//94
        \App\Clasificador::create([
            'codigo'=>'34100',
            'descripcion'=>'COMBUSTIBLES, LUBRICANTES, DERIVADOS Y OTRAS FUENTES DE ENERGÍA',
            'codigo_minimo'=>'341',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//95
        \App\Clasificador::create([
            'codigo'=>'34200',
            'descripcion'=>'PRODUCTOS QUÍMICOS Y FARMACÉUTICOS',
            'codigo_minimo'=>'342',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//96
        \App\Clasificador::create([
            'codigo'=>'34300',
            'descripcion'=>'LLANTAS Y NEUMÁTICOS',
            'codigo_minimo'=>'343',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//97
        \App\Clasificador::create([
            'codigo'=>'34400',
            'descripcion'=>'PRODUCTOS DE CUERO Y CAUCHO',
            'codigo_minimo'=>'344',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//98
        \App\Clasificador::create([
            'codigo'=>'34500',
            'descripcion'=>'PRODUCTOS DE MINERALES NO METÁLICOS Y PLÁSTICOS',
            'codigo_minimo'=>'345',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//99
        \App\Clasificador::create([
            'codigo'=>'34600',
            'descripcion'=>'PRODUCTOS METÁLICOS',
            'codigo_minimo'=>'346',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//100
        \App\Clasificador::create([
            'codigo'=>'34700',
            'descripcion'=>'MINERALES',
            'codigo_minimo'=>'347',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//101
        \App\Clasificador::create([
            'codigo'=>'34800',
            'descripcion'=>'HERRAMIENTAS MENORES',
            'codigo_minimo'=>'348',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//102
        \App\Clasificador::create([
            'codigo'=>'34900',
            'descripcion'=>'MATERIAL Y EQUIPO MILITAR',
            'codigo_minimo'=>'349',
            'clasificador_id'=>94,
            'nivel'=>'Grupo'
        ]);//103
        \App\Clasificador::create([
            'codigo'=>'39000',
            'descripcion'=>'PRODUCTOS VARIOS',
            'codigo_minimo'=>'39',
            'clasificador_id'=>3,
            'nivel'=>'Clasificador'
        ]);//104
        \App\Clasificador::create([
            'codigo'=>'39100',
            'descripcion'=>'MATERIAL DE LIMPIEZA E HIGIENE',
            'codigo_minimo'=>'391',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//105
        \App\Clasificador::create([
            'codigo'=>'39200',
            'descripcion'=>'MATERIAL DEPORTIVO Y RECREATIVO',
            'codigo_minimo'=>'392',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//106
        \App\Clasificador::create([
            'codigo'=>'39300',
            'descripcion'=>'UTENSILIOS DE COCINA Y COMEDOR',
            'codigo_minimo'=>'393',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//107
        \App\Clasificador::create([
            'codigo'=>'39400',
            'descripcion'=>'INSTRUMENTAL MENOR MÉDICO-QUIRÚRGICO',
            'codigo_minimo'=>'394',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//108
        \App\Clasificador::create([
            'codigo'=>'39500',
            'descripcion'=>'ÚTILES DE ESCRITORIO Y OFICINA',
            'codigo_minimo'=>'395',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//109
        \App\Clasificador::create([
            'codigo'=>'39600',
            'descripcion'=>'ÚTILES EDUCACIONALES, CULTURALES Y DE CAPACITACIÓN',
            'codigo_minimo'=>'396',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//110
        \App\Clasificador::create([
            'codigo'=>'39700',
            'descripcion'=>'ÚTILES Y MATERIALES ELÉCTRICOS',
            'codigo_minimo'=>'397',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//111
        \App\Clasificador::create([
            'codigo'=>'39800',
            'descripcion'=>'OTROS REPUESTOS Y ACCESORIOS',
            'codigo_minimo'=>'398',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//112
        \App\Clasificador::create([
            'codigo'=>'39900',
            'descripcion'=>'OTROS MATERIALES Y SUMINISTROS',
            'codigo_minimo'=>'399',
            'clasificador_id'=>104,
            'nivel'=>'Grupo'
        ]);//113
    }
}
