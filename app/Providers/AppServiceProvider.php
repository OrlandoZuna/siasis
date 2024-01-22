<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
//use Validator;
//use Modules\Almacen\Entities\Stock;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        setlocale(LC_TIME, config('app.locale'));
        \Date::setLocale('es');
      /*
      Validator::extend('stock',function($attribute,$value,$parameters){
        $stock=Stock::where('almacene_id',$parameters[0])
            ->where('articulo_id',$parameters[1])
            ->where('tabla','ingresos')->first();
        if ($value>$stock->entrada) {
            return $value='cantidad pedida';
        }
      });*/
    }
}
