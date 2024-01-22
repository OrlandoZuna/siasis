<?php

use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Permission;
class PermissionADMINTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Permission::create([
		    'name'			=>	'subsistema.list',
		    'slug'			=>	'subsistema.list',
		    'description'	=>	'Listar Los Subsistemas',
		    'model'			=>	'Public - Administracion y Sub Sistemas de UATF'
		]);


  		Permission::create([
		    'name'			=>	'subsistematele.acceso',
		    'slug'			=>	'subsistematele.acceso',
		    'description'	=>	'Acceso Teletrabajo',
		    'model'			=>	'Public - Sub Sistemas de UATF '
		]);

  		Permission::create([
		    'name'			=>	'subsistemaalmacen.acceso',
		    'slug'			=>	'subsistemaalmacen.acceso',
		    'description'	=>	'Acceso Almacen',
		    'model'			=>	'Public - Sub Sistemas de UATF '
		]);
   		Permission::create([
		    'name'			=>	'subsistemadaf.acceso',
		    'slug'			=>	'subsistemadaf.acceso',
		    'description'	=>	'Acceso DAF',
		    'model'			=>	'Public - Sub Sistemas de UATF '
		]);        
   		Permission::create([
		    'name'			=>	'subsistemapresupuestos.acceso',
		    'slug'			=>	'subsistemapresupuestos.acceso',
		    'description'	=>	'Acceso Presupuestos',
		    'model'			=>	'Public - Sub Sistemas de UATF '
		]);
		Permission::create([
		    'name'			=>	'subsistemagesamb.acceso',
		    'slug'			=>	'subsistemagesamb.acceso',
		    'description'	=>	'Acceso Gestion Ambientes',
		    'model'			=>	'Public - Sub Sistemas de UATF '
		]); 
    	Permission::create([
		    'name'			=>	'administracion.list',
		    'slug'			=>	'administracion.list',
		    'description'	=>	'Listar la Administracion',
		    'model'			=>	'Public - Administracion y Sub Sistemas de UATF'
		]);
		Permission::create([
		    'name'			=>	'unidadesdeadministracion.mostrar',
		    'slug'			=>	'unidadesdeadministracion.mostrar',
		    'description'	=>	'Mostrar Unidades',
		    'model'			=>	'Public - Administracion de Unidades'
		]);
		Permission::create([
		    'name'			=>	'unidadesdeadministracion.list',
		    'slug'			=>	'unidadesdeadministracion.list',
		    'description'	=>	'Listar Unidades',
		    'model'			=>	'Public - Administracion de Unidades'
		]);
		Permission::create([
		    'name'			=>	'unidadesdeadministracion.crear',
		    'slug'			=>	'unidadesdeadministracion.crear',
		    'description'	=>	'Crear Unidades',
		    'model'			=>	'Public - Administracion de Unidades'
		]);    
		Permission::create([
		    'name'			=>	'administracionadminroles.list',
		    'slug'			=>	'administracionadminroles.list',
		    'description'	=>	'Listar roles',
		    'model'			=>	'Public - Administracion Admin Roles'
		]);


		Permission::create([
		    'name'			=>	'administracionadminroles.crear',
		    'slug'			=>	'administracionadminroles.crear',
		    'description'	=>	'Crear Roles',
		    'model'			=>	'Public - Administracion Admin Roles'
		]);
		Permission::create([
		    'name'			=>	'administracionadminroles.asignar',
		    'slug'			=>	'administracionadminroles.asignar',
		    'description'	=>	'Asignar Permisos',
		    'model'			=>	'Public - Administracion Admin Roles'
		]);

		Permission::create([
		    'name'			=>	'administracionadminpersonal.list',
		    'slug'			=>	'administracionadminpersonal.list',
		    'description'	=>	'Listar Personal',
		    'model'			=>	'Public - Administracion Personal'
		]);
		Permission::create([
		    'name'			=>	'administracionadminpersonal.crear',
		    'slug'			=>	'administracionadminpersonal.crear',
		    'description'	=>	'Crear Personal',
		    'model'			=>	'Public - Administracion Personal'
		]);
		Permission::create([
		    'name'			=>	'administracionadminpersonal.asignar',
		    'slug'			=>	'administracionadminpersonal.asignar',
		    'description'	=>	'Asignar Personal',
		    'model'			=>	'Public - Administracion Personal'
		]);
		Permission::create([
		    'name'			=>	'administracionadminpersonal.reasignar',
		    'slug'			=>	'administracionadminpersonal.reasignar',
		    'description'	=>	'Reasignar Personal',
		    'model'			=>	'Public - Administracion Personal'
		]);
		Permission::create([
		    'name'			=>	'administracionadminpersonal.edit',
		    'slug'			=>	'administracionadminpersonal.edit',
		    'description'	=>	'Editar Personal',
		    'model'			=>	'Public - Administracion Personal'
		]);
        Permission::create([
            'name'          =>  'pedidos.mostrar',
            'slug'          =>  'pedidos.mostrar',
            'description'   =>  'bandeja de pedidos',
            'model'         =>  'Public - bandeja de pedidos'
        ]);
        Permission::create([
            'name'          =>  'user.perfil',
            'slug'          =>  'user.perfil',
            'description'   =>  'user perfil',
            'model'         =>  'Public - perfil usuario'
        ]);
        Permission::create([
            'name'          =>  'credenciales.acceso',
            'slug'          =>  'credenciales.acceso',
            'description'   =>  'Acceso Modulo credenciales',
            'model'         =>  'Public - Sub Sistemas de UATF '
        ]);
        Permission::create([
            'name'          =>  'funcionarios.list',
            'slug'          =>  'funcionarios.list',
            'description'   =>  'Funcionarios',
            'model'         =>  'AppCredenciales - modulo appcredenciales'
        ]);
        Permission::create([
            'name'          =>  'funcionarios.create',
            'slug'          =>  'funcionarios.create',
            'description'   =>  'Crear funcionarios',
            'model'         =>  'AppCredenciales - modulo appcredenciales'
        ]);
        Permission::create([
            'name'          =>  'funcionarios.dowload',
            'slug'          =>  'funcionarios.dowload',
            'description'   =>  'descargar qr',
            'model'         =>  'AppCredenciales - modulo appcredenciales'
        ]);
        Permission::create([
            'name'          =>  'funcionarios.edit',
            'slug'          =>  'funcionarios.edit',
            'description'   =>  'editar datos',
            'model'         =>  'AppCredenciales - modulo appcredenciales'
        ]);
    }
}
