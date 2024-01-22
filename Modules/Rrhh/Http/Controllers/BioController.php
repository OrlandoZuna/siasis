<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rats\Zkteco\Lib\ZKTeco;
use \ZKLib\ZKLib;
use \ZKLib\User;
use App\Unidad;
use  Spatie\PdfToImage\Pdf;
use Modules\Rrhh\Entities\AsistenciaBiometrico;
use Modules\Rrhh\Entities\Biometrico;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\HorarioPersona;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        $ip='192.168.100.94';
        //dd($ip);
        $zk = new ZKTeco($ip, 4370);
        //dd($zk->_ip, $zk->_port);
        //192.168.100.94
        $title="BIOMETRICO";

        if($zk-> connect() != null){
            $zk->connect();
            $ret = $zk->connect();
            //dd($zk);
            $zk1 = new ZKTeco($ip, 4370);
            $ret = $zk1->connect();
            //$capacity = $zk1->getFreeSize();
            $device = $zk1->deviceName();

            $version = $zk1->version();
            $sistem = $zk1->osVersion();
            $plataforma =$zk1->platform();
            $user = $zk1->getUser();
            $serial = $zk1->serialNumber();
            $time = $zk1->getTime();
            $attendance = $zk1->getAttendance();

            //$remove = $zk1->removeUser("10");

           // $setuser = $zk1->setUser(8, 10545771, "juana zuna huaygua", 10545771, 0, 0);
            //dd($setuser);

            //dd($user, $serial, $time, $version, $device, $plataforma, $sistem, $attendance);
            // $remove = $zk1->removeUser();
            // dd($remove);

            //return view('rrhh::administrator.biometric.index ', compact(['title','zk']));
        }
        else{
            return view('rrhh::administrator.biometric.index ', compact('title'));
        }

        dd($user, $serial, $time, $version, $device, $plataforma, $sistem, $attendance);

    }

    public function indexi(Request $request)
    {
        $id_e= $request->id_e;
        $ipb = $request->ip;
        $ip = strval($ipb);
        $puerto= $request->puerto;

        //dd($id);
        $title="BIOMETRICO";

        $zk = new ZKTeco($ip, $puerto);

        if($zk-> connect() != null){
            $ret = $zk->connect();
            $user = $zk->getUser();


             $data = $zk->getAttendance();
             $attendances = $this->paginate($data);
             //dd($data);
             $users = $this->paginate($user);
            //dd(Count($user));


            $biometricos = Biometrico::all();
            $asistencias = AsistenciaBiometrico::paginate(10);
            return [
                'list_asistenciasbiometrico' =>view('rrhh::administrator.biometric.index2 ', compact(['title', 'users', 'ipb','ip', 'puerto','attendances', 'ret', 'zk', 'biometricos', 'asistencias', 'id_e']))->render(),
                'next_page' => $attendances->nextPageUrl()
            ];
        }

        else{

                return response()->json(view('rrhh::administrator.biometric.index2 ', compact(['title', 'users', 'ipb', 'ip', 'puerto']))->render());

        }
        //dd($user, $serial, $time, $version, $device, $plataforma, $sistem, $attendance);

    }
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function rendertablaasistencias(Request $request)
    {

        $id_e= $request->id_e;
        $ipb = $request->ip;
        $ip = strval($ipb);
        $puerto= $request->puerto;

        //dd($ip, $id_e, $puerto);

        $zk = new ZKTeco($ip, $puerto);

        if($zk-> connect() != null){
            $ret = $zk->connect();
            $users = $zk->getUser();


             $data = $zk->getAttendance();
             $attendances = $this->paginate($data);
             //dd($data);


            return [
                'list_asistenciasbiometrico' =>view('rrhh::administrator.biometric.rendertablaasis', compact(['attendances', 'id_e']))->render(),
                'next_page' => $attendances->nextPageUrl()
            ];
        }
    }

    public function rendertablausuarios(Request $request)
    {

        $id_e= $request->id_e;
        $ipb = $request->ip;
        $ip = strval($ipb);
        $puerto= $request->puerto;

        //dd($ip, $id_e, $puerto);

        $zk = new ZKTeco($ip, $puerto);

        if($zk-> connect() != null){
            $ret = $zk->connect();
            $data = $zk->getUser();

             $users = $this->paginate($data);
             //dd($data);


            return [
                "list_usuariosbiometrico"=>view("rrhh::administrator.biometric.modals.usersRender", compact("users", 'puerto', 'ip'))->render(),
                'next_page' => $users->nextPageUrl()
            ];
        }
    }

    public function ImportandoAsistenciasBiometrico(Request $request)
    {
        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        //$horaComparar= Carbon:: create($biometrico->start_input);

        $ipb = $request->ip;
        $ip = strval($ipb);
        $puerto= $request->puerto;

        //dd($id);
        $title="BIOMETRICO";

        $zk = new ZKTeco($ip, $puerto);

        if($zk-> connect() != null){
            $ipg = $zk->_ip;
            $biometrico = Biometrico::where('ip', '=', $ipg)->first();
            $id_bio = $biometrico->id;
            //dd($id_bio);
            $attendances = $zk->getAttendance();
            //dd($attendances[0]['timestamp']);
            //$horaComparar= Carbon:: create($attendances[0]['timestamp'])->format('H:i:s');
            // mañana entrada
            $hora_mañana = Carbon::createFromTime(7, 0, 0)->format('H:i:s');
            $hora_mañanafin= Carbon::createFromTime(13,30 , 0)->format('H:i:s');
            //entrada
            $hora_mañana_puntual = Carbon::createFromTime(8, 15, 0)->format('H:i:s');
            $hora_mañana_atrasado = Carbon::createFromTime(8, 30, 0)->format('H:i:s');
            //salida
            $hora_mañana_salida = Carbon::createFromTime(12, 0, 0)->format('H:i:s');
            $hora_mañana_salidafin = Carbon::createFromTime(13, 30, 0)->format('H:i:s');
            /// tarde
            $hora_tarde = Carbon::createFromTime(14, 0, 0)->format('H:i:s');
            $hora_tardefin= Carbon::createFromTime(22, 0, 0)->format('H:i:s');
            //entrada
            $hora_tarde_puntual = Carbon::createFromTime(14, 45, 0)->format('H:i:s');
            $hora_tarde_atrasado = Carbon::createFromTime(15, 0, 0)->format('H:i:s');
            //salida
            $hora_tarde_salida = Carbon::createFromTime(16, 0, 0)->format('H:i:s');
            $hora_tarde_salidafin = Carbon::createFromTime(18, 30, 0)->format('H:i:s');

            $internetWillBlowUpOn = Carbon::create(2038, 01, 19, 3, 14, 7);
            //dd($attendances[0]['timestamp'], $fecha, $internetWillBlowUpOn, $hora_comparar, $horaComparar);
            //dd($attendance[0]['id']);

            $asisbio = AsistenciaBiometrico::all();

            $ultimoAsistencia=$asisbio->get(count($asisbio)-1);

            if ($ultimoAsistencia==null) {
                foreach ($attendances as $attendance) {
                    $asistenciabiometrico = new AsistenciaBiometrico();

                    $asistenciabiometrico->Nregistro = $attendance['uid'];
                    $asistenciabiometrico->id_biometrico = $id_bio;
                    $asistenciabiometrico->id_user_b = $attendance['id'];
                    $asistenciabiometrico->state = $attendance['state'];
                    $asistenciabiometrico->timestamp = $attendance['timestamp'];
                    $asistenciabiometrico->type = $attendance['type'];

                    $asistenciabiometrico->save();

                  }
                  return response()->json(["resp"=>200]);
            }
            else {
                foreach ($attendances as $attendance) {
                    if ($ultimoAsistencia->timestamp < $attendance['timestamp']) {
                        $asistenciabiometrico = new AsistenciaBiometrico();

                        $asistenciabiometrico->Nregistro = $attendance['uid'];
                        $asistenciabiometrico->id_biometrico = $id_bio;
                        $asistenciabiometrico->id_user_b = $attendance['id'];
                        $asistenciabiometrico->state = $attendance['state'];
                        $asistenciabiometrico->timestamp = $attendance['timestamp'];
                        $asistenciabiometrico->type = $attendance['type'];

                        $asistenciabiometrico->save();
                    }
                  }
                  return response()->json(["resp"=>200]);
            }
        }
        else {

        }
    }

    public function show(AsistenciaBiometrico $asistenciaBiometrico)
    {
        //dd
        $events=AsistenciaBiometrico::All();
        return response()->json($events);
    }

    /////////////////////// DESDE AQUI PARA TABLA BIOMETRICO////////////////
    // $idPerso = Personal::where('ci','=', "10545775")->first();

    // dd($idPerso->id);

    public function indexBiometrico(Request $request)
    {
        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        $biometricos= Biometrico::all();
        $puerto=4370;
        $title="Biometricos";
        return view('rrhh::administrator.biometric.indexbiometrico',compact('biometricos','title', 'puerto', 'fecha',));

    }

    public function store(Request $request)
    {
        $biometricos = new Biometrico($request->all());
        $bool= Validator::make($request->all(),[
            "nombre" => "required",
            "lugar" => "required",
            "ip" => "required",
            "puerto" => "required",
            "estado" => "required",
            "version" => "required",
            "modelo" => "required",
            "Nserie" => "required",
            "fecha_creacion" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        else{
            $biometri= Biometrico::all();
            $cantidad = 0;
            foreach ($biometri as $biome) {
                if($biome->ip == $request->ip){
                    $cantidad ++;
                }
            }
            if ($cantidad < 1) {
                $biometricos->save();
                $notify=[
                    "type"=>"success",
                    "message"=>'El biometrico '.$biometricos->ip.' a sido registrado correctamente'
                ];
            }
            else {
                $notify=[
                    "type"=>"error",
                    "message"=>'El biometrico '.$biometricos->ip.' ya existe'
                ];
            }
        }
        return redirect()->back()->with("notify",$notify);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $biometric= Biometrico::find($id);
        $ip = strval($biometric->ip);
        $puerto = $biometric->puerto;


        if ($biometric->estado == "inactivo") {
            $zk = new ZKTeco($ip, $puerto);

            if($zk-> connect() != null){
                $ipg = $zk->_ip;
                $puertog = $zk->_port;
                $ipgg = strval($ipg);
                $estado="Activo";

                $modelo = $zk->deviceName();
                $version = $zk->version();
                $serial = $zk->serialNumber();

                $biometric->estado = $estado;
                $biometric->version = $version;
                $biometric->modelo = $modelo;
                $biometric->Nserie = $serial;

                $biometric->save();

                return response()->json(["resp"=>200]);

            }
            else{
                return response()->json(["resp"=>250]);
            }
        }
        else{
            return response()->json(["resp"=>2000]);
        }
    }

    public function registrarUsuario(Request $request){
        $ipb = $request->ip;
        $ip = strval($ipb);
        $puerto = $request->puerto;
        $uid= $request->uid;
        $userid= $request->userid;
        $name= $request->name;
        $role= $request->role;
        $cardno= $request->cardno;
        $password= $request->password;
        $zk = new ZKTeco($ip, $puerto);
        if($zk-> connect() != null){
            $personal= Personal::all();
            $pers = Personal::where('ci', '=', $userid)->first();
            if ($pers != null){
                $usersi = $zk->getUser();
                $cantidad=0;
                foreach($usersi as $user){
                    if($user['uid'] == $uid || $user['userid'] == $userid){
                        $cantidad ++;
                    }
                }
                if ($cantidad < 1) {
                    $zk->setUser($uid, $userid, $name, $password, $role, $cardno);
                    $users=$zk->getUser();
                    return response()->json([
                        "resp"=>200,
                        "view"=> view("rrhh::administrator.biometric.modals.usersRenderTable", compact("users", 'puerto', 'ip'))->render()
                    ]);
                }
                else{
                    return response()->json(["resp"=>250]);
                }
            }
            else{
                return response()->json(["resp"=>2000]);
            }
        }
    }

    public function delete(Request $request){
        $id=$request->id;
        $puerto=$request->p;
        $ipb = $request->ip;
        $ip = strval($ipb);

        $zk = new ZKTeco($ip, $puerto);

        if($zk-> connect() != null){
            $zk->removeUser($id);
            $user=$zk->getUser();
            $users = $this->paginate($user);
            return response()->json([
                "resp"=>200,
                "view"=>view("rrhh::administrator.biometric.modals.usersRender", compact("users", 'puerto', 'ip'))->render(),
                'next_page' => $users->nextPageUrl()
            ]);
        }
        else{
            return response()->json(["resp"=>2050]);
        }
    }


  ////////////// DESDE AQUI PARA MODALES DE BIOMETRICO Y ASISTENCIAS ///////////////////////////////////// updateb
    public function pruebamodal(Request $request){
        $tipo = $request->dato;
        $asistencias = AsistenciaBiometrico::where('id_biometrico', '=', $request->id_e)->orderBy('timestamp', 'desc')->paginate(20);
        return response()->json([
            "view" => view('rrhh::administrator.biometric.modals.cuerpoModal',compact('tipo','asistencias'))->render(),
            "letra" => 'mensaje',
            "next_page" => $asistencias->nextPageUrl()
        ]);
    }

    public function pruebamodal2(Request $request){
        //$tipo = $request->dato;
        //dd($request->id_e);
        $asistencias = AsistenciaBiometrico::Where('id_biometrico', '=', $request->id_e)->paginate(10);
        return response()->json([
            "view" => view('rrhh::administrator.biometric.modals.general-asistencias',compact('asistencias'))->render(),
            "letra" => 'mensaje',
            "next_page" => $asistencias->nextPageUrl()
        ]);
    }

    public function pruebamodalrender(Request $request){
        $tipo = $request->dato;
        $asistencias = AsistenciaBiometrico::where('id_biometrico', '=', $request->id_e)->paginate(20);
        return response()->json([
            "view" => view('rrhh::administrator.biometric.modals.cuerpoModal',compact('tipo','asistencias'))->render(),
            "letra" => 'mensaje',
            "next_page" => $asistencias->nextPageUrl()
        ]);
    }

    public function pruebamodal2render(Request $request){
        //$tipo = $request->dato;
        //dd($request->id_e);
        $asistencias = AsistenciaBiometrico::Where('id_biometrico', '=', $request->id_e)->paginate(10);
        //dd($asistencias);
        return response()->json([
            "view" => view('rrhh::administrator.biometric.renderasisactual',compact('asistencias'))->render(),
            "letra" => 'mensaje',
            "next_page" => $asistencias->nextPageUrl()
        ]);
    }

    public function pruebamodal3(Request $request){
        //$tipo = $request->dato;
        $biometricos = Biometrico::all();
        return response()->json([
            "view" => view('rrhh::administrator.biometric.modals.vista-general',compact('biometricos'))->render(),
            "letra" => 'mensaje',
        ]);
    }


    ////////////// DESDE AQUI PARA PDF /////////////////////////////////////

    public function pdf(){
        return view('rrhh::pdf.index');
    }
    public function pdftoimage(Request $request){

        $pdf = new Spatie\PdfToImage\Pdf($request->img);
        dd($pdf);
    }

    ////////////////////////desde aqui para la creacion para la edicion de biometricos/////////////

    public function getbiometrico(Request $request){
        $id=$request->id;

        $biometrico=Biometrico::find($id);

        $json[]=[
            "id" => $biometrico->id,
            "nombre" => $biometrico->nombre,
            "lugar" => $biometrico->lugar,
            "ip" => $biometrico->ip,
            "puerto" => $biometrico->puerto,
            "estado" => $biometrico-> estado,
            "version" =>$biometrico-> version,
            "modelo" => $biometrico-> modelo,
            "Nserie" => $biometrico-> Nserie,
            "fecha_creacion" => $biometrico->fecha_creacion,
        ];
        return $json;
    }

    public function updateb(Request $request)
    {
        $bool= Validator::make($request->all(),[
            "nombre" => "required",
            "lugar" => "required",
            "ip" => "required",
            "puerto" => "required",
            "estado" => "required",
            "version" => "required",
            "modelo" => "required",
            "Nserie" => "required",
            "fecha_creacion" => "required",
        ]);

        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $biometrico = Biometrico::find($request->get('id_b'));
        $biometrico->fill($request->all());
        $biometrico->save();
        $notify=[
            "type"=>"success",
            "message"=>'El Biometrico '.$biometrico->nombre.' a sido Editado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function deletebiometrico(Request $request){
        $id=$request->id;
        $item=Biometrico::find($id);
        $item->delete();

        // return redirect()->back();
        return response()->json(["resp"=>200, "id"=>$id]);
    }

    public function mostrarAsisB(Request $request)
    {
        $id_b = $request->id;
        $asistencias = AsistenciaBiometrico::where('id_biometrico', '=',$id_b)->orderby('timestamp', 'DESC')->paginate(10);
        if (Count($asistencias)>0) {
            return response()->json( [
                'list_personal'=> view('rrhh::administrator.biometric.modals.mostrar-asistencias')->with(compact('asistencias'))->render(),
                'next_page' => $asistencias->nextPageUrl(),
                'resp' => 200
            ]);
        }
        else {
           return response()->json(['resp' => 250]);
        }

    }

    function indexrendera(Request $request)
    {
        if($request->ajax())
        {
            $asistencias = AsistenciaBiometrico::where('id_biometrico', '=',$request->id_biometrico)->paginate(10);
            //dd($asistencias);
            if (Count($asistencias)>0) {
                return response()->json( [
                    'asistencias'=> view('rrhh::administrator.biometric.modals.mostrar-asistencias')->with(compact('asistencias'))->render(),
                    'next_page' => $asistencias->nextPageUrl(),
                    'resp' => 200
                ]);
            }
            else {
               return response()->json(['resp' => 250]);
            }

        }
    }
 }
