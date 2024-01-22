<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='usuarios';
        $users = User::all();
        $roles=Roles::all();
        return view('admin.user.index', compact('users','roles','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $new=new User($request->all());
        $new['password'] = bcrypt($new['password']);
        $new->save();
        $new->attachRole($request->rol);
        $notify = [
          "type" => "success",
          "message" => "Se creo un nuevo usuario"
        ];
        return redirect()->back()->with("notify", $notify);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Roles::all();
        $users = User::findOrFail($id);
        //dd($users);
        return view('users.edit',compact('roles','users'));
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
        $new=User::findOrFail($id);
        $new->fill($request->all());


        $new->save();
        $new->synchRole($request->rol);

        $notify = [
          "type" => "success",
          "message" => "Se creo un nuevo usuario"
        ];
        return redirect()->back()->with("notify", $notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user=User::findOrFail($id);
        if($user->estado=="ACTIVO"){
            $user->estado="BAJA";
            $notify=[
                "type"=>"success",
                "message"=>"EL usuario se dio de baja correctamente"
            ];
        }else{
            $user->estado="ACTIVO";
            $notify=[
                "type"=>"success",
                "message"=>"EL usuario se dio de alta correctamente"
            ];
        }

        $user->save();

        return redirect()->back()->with("notify",$notify);

    }
    public function asignar_rol($id){

    }
}
