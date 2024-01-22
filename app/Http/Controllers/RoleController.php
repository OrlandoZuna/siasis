<?php

namespace App\Http\Controllers;
use App\Roles;
use App\Permissions;
use App\PermissionRole;
use Illuminate\Http\Request;
use App\User;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='lista de roles';
        $rol=Roles::all();
        $Permiso=Permissions::all();
        $PerRole=PermissionRole::all();
        return view('admin.roles.index',compact('rol','Permiso','PerRole','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function permisos($id)
    {
       $Permiso=Permission::all();
       return view('admin.roles.asignar', compact('Permiso')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new=new Roles(request()->all());
        //dd($new);
        
        $new->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title='Asignar de roles';
        $per=Permissions::all()
            ->groupBy('tipo');

        $rol=Roles::with("permisos")->find($id);
        $permi=$rol->permisos->pluck("id");
        $ap=[];

        foreach ($permi as $key => $value) {

            array_push($ap, $value);
        }
        
        return view('admin.roles.asignar',compact('per',"rol","ap",'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users=User::with(["role"=>function($query)use($id){
            $query->where("role_id",$id);
        }])->get();
        foreach($users as $user){
            if(count($user->role)){
                $user->syncPermissions($request->lista);     
            }
        }
        $rol=config('roles.models.role')::find($id); 
        $rol->syncPermissions($request->lista);
        $notify=[
            "type"=>"success",
            "message"=>"la sincronizacion de permisos fue exitosa"
        ];
        return redirect()->back()->with("notify",$notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('hola');
    }

     public function rol_academico()
     {
        $title='lista de roles academicos';
        $rol=Roles::where('typo','academico')->get();
        //dd($rol);
        $Permiso=Permissions::all();
        $PerRole=PermissionRole::all();
        return view('admin.roles.academico',compact('rol','Permiso','PerRole','title'));
     }
     public function rol_administrativo()
     {
        $title='lista de roles administrativos';
        $rol=Roles::where('typo','administrativo')->get();
        //dd($rol);
        $Permiso=Permissions::all();
        $PerRole=PermissionRole::all();
        return view('admin.roles.administrativo',compact('rol','Permiso','PerRole','title'));
     }
     public function show_academic($id)
     {
        $title='Asignar de roles';
        $per=Permissions::where('typo','academico')->get()
            ->groupBy('tipo');
        //dd($per);
        $rol=Roles::with("permisos")->find($id);
        $permi=$rol->permisos->pluck("id");
        $ap=[];

        foreach ($permi as $key => $value) {

            array_push($ap, $value);
        }
        
        return view('admin.roles.asignar',compact('per',"rol","ap",'title'));
     }
     public function show_administrativo($id)
     {
        $title='Asignar de roles';
        $per=Permissions::where('typo','administrativo')->get()
            ->groupBy('tipo');
        //dd($per);
        $rol=Roles::with("permisos")->find($id);
        $permi=$rol->permisos->pluck("id");
        $ap=[];

        foreach ($permi as $key => $value) {

            array_push($ap, $value);
        }
        
        return view('admin.roles.asignar',compact('per',"rol","ap",'title'));
     }
}
