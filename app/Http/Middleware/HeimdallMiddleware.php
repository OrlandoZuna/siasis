<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Closure;
use Modules\Heimdall\Entities\Heimdalleye;
use App\Helpers\UserSystemInfoHelper;
use App\RolUser;
use App\Roles;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HeimdallMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $route = Route::getRoutes()->match($request);

      $route->getActionName();
      //dd($route);
      $getip = UserSystemInfoHelper::get_ip();
      //dd($getip);
      $getbrowser = UserSystemInfoHelper::get_browsers();
      $getdevice = UserSystemInfoHelper::get_device();
      $getos = UserSystemInfoHelper::get_os();
      $user=Auth::user();
      //dd($user);
      $value=[];

      // dd($route);
       array_push(
         $value,
         [
           'metod' => $route->methods,
           'ruta' => $route->uri,
           'action' => $route->action,
         ]

       );
       //dd($value);
       $aux=$value[0];
       //dd($aux);
       $prefix=$aux['action'];
       //dd($prefix);
       $dda=$prefix['prefix'];
       if($dda=='api'){
        return $next($request);
       }else{
        if($user == null)
        {
          return $next($request);
        }
        else{

          $r=$value[0];
          $ru=$r['ruta'];
          $metod=$r['metod'];
          $action=$r['action'];
          $rd=$action['uses'];
          $date = Carbon::now();
          $gestion=$date->format('Y');
          $fecha=$date->format('Y-m-d');
          $hora=$date->toTimeString();
          $new=new Heimdalleye();
          $new->tipo='vista_interna';
          $new->accion=$metod['0'];
          if($metod != 'POST')
          {
            $new->acceso='sin cabecera';
          }else{
            $new->acceso=$metod['1'];
          }
          $new->accionador=$dda;
          $new->user_id=$user->id;
          $new->personal_id=$user->personal_id;
          $rolus=RolUser::where('user_id',$user->id)->first();

          if($rolus==null){
            $rou='no tiene rol';

          }else{
            $ro=Roles::findOrfail($rolus->role_id);
            $rou=$ro->name;
          }
          $new->rol=$rou;
          $new->ruta=$ru;
          $new->ip_addres=$getip;
          $new->sistema_operativo=$getos;
          $new->navegador=$getbrowser;
          $new->tipo_de_dispositivo=$getdevice;
          $new->fecha=$fecha;
          $new->hora=$hora;
          $new->gestion=$gestion;
          $new->save();
          return $next($request);
        }
       }

    }
}
