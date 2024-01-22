<?php

namespace Modules\Rrhh\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use jeremykenedy\LaravelRoles\Models\Permission;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([
            'name'          =>  'subsistemarrhhpersonal.acceso',
            'slug'          =>  'subsistemarrhhpersonal.acceso',
            'description'   =>  'Acceso RRHH personal',
            'model'         =>  'Public - Sub Sistemas de UATF '
        ]);
        Permission::create([
            'name'          =>  'administracion.listrrhh',
            'slug'          =>  'administracion.listrhh',
            'description'   =>  'accseso a administracion',
            'model'         =>  'RRHH - administracion'
        ]);
        Permission::create([
            'name'          =>  'administracion.personalrrhh',
            'slug'          =>  'administracion.personalrrhh',
            'description'   =>  'accseso a personal',
            'model'         =>  'RRHH - personal'
        ]);
        Permission::create([
            'name'          =>  'administracion.crearpersonal',
            'slug'          =>  'administracion.crearpersonal',
            'description'   =>  'accseso a crear personal',
            'model'         =>  'RRHH - personal'
        ]);
        Permission::create([
            'name'          =>  'administracion.editpersonal',
            'slug'          =>  'administracion.editpersonal',
            'description'   =>  'accseso a edit personal',
            'model'         =>  'RRHH - personal'
        ]);
        Permission::create([
            'name'          =>  'administracion.kardexpersonal',
            'slug'          =>  'administracion.kardexpersonal',
            'description'   =>  'accseso a kardex personal',
            'model'         =>  'RRHH - personal'
        ]);
        Permission::create([
            'name'          =>  'administracion.cargos',
            'slug'          =>  'administracion.cargos',
            'description'   =>  'accseso a cargos',
            'model'         =>  'RRHH - cargos'
        ]);
        Permission::create([
            'name'          =>  'administracion.admincargos',
            'slug'          =>  'administracion.admincargos',
            'description'   =>  'accseso a administracion de cargos',
            'model'         =>  'RRHH - cargos'
        ]);
        Permission::create([
            'name'          =>  'administracion.desginaciones',
            'slug'          =>  'administracion.desginaciones',
            'description'   =>  'accseso a designaciones',
            'model'         =>  'RRHH - Designaciones'
        ]);
        Permission::create([
            'name'          =>  'administracion.planilap',
            'slug'          =>  'administracion.planilap',
            'description'   =>  'accseso a planila presupuestaria',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.deudas',
            'slug'          =>  'administracion.deudas',
            'description'   =>  'accseso a Deudas',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.creardeuda',
            'slug'          =>  'administracion.creardeuda',
            'description'   =>  'accseso a crear deuda',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.editdeuda',
            'slug'          =>  'administracion.editdeuda',
            'description'   =>  'accseso a editar deuda',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.listmencion',
            'slug'          =>  'administracion.listmencion',
            'description'   =>  'accseso a listar mencion',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.creartmencion',
            'slug'          =>  'administracion.crearmencion',
            'description'   =>  'accseso a crear mencion',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.editmencion',
            'slug'          =>  'administracion.editmencion',
            'description'   =>  'accseso a editar mencion',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.crearcalculo',
            'slug'          =>  'administracion.crearcalculo',
            'description'   =>  'accseso a crear calculo',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.imprimircalculo',
            'slug'          =>  'administracion.imprimircalculo',
            'description'   =>  'accseso a imprimir calculo',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);
        Permission::create([
            'name'          =>  'administracion.vercalculo',
            'slug'          =>  'administracion.vercalculo',
            'description'   =>  'accseso a  vista previa calculo',
            'model'         =>  'RRHH - Planila Presupuestaria'
        ]);

    }
}
