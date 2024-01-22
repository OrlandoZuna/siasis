<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Almacen\Entities\Stock;
use Modules\Almacen\Entities\Articulo;
use Modules\Almacen\Entities\Categoria;
use Validator;
use Modules\Almacen\Entities\Regulator;
use Modules\Almacen\Entities\Almacen;
use Illuminate\Validation\Rule;
class PedidoRequest extends FormRequest
{

    protected function getValidatorInstance()
    {
        if ($this->request->get('nameart')) {
          $func=function($valor){
            return mb_strtolower($valor,'UTF-8');
          };
          $valueArt=array_map($func,$this->request->get('nameart'));
          $this->request->set('nameart',$valueArt);
        }
        return parent::getValidatorInstance();
    }
    public function rules()
    {

        $input=$this->request->all();
        if ($this->request->get('dateAlm') != 'obsListPed') {
            $artid=explode(',',$input['artid']);
        }
        $item_type=$this->request->get('dateAlm');
       switch ($item_type) {
            case 'dateExist':
                $rules=[
                   'para_uso'=>'required|max:191',
                   'tipo_pedido'=>'required|in:1,2,3',
                   'financiamiento'=>'required'
                ];
                foreach ($artid as $key => $art) {
                    $artic=Articulo::findOrfail($art);
                    $stock=Stock::where([['almacene_id',$input['almacen']],
                        ['articulo_id',$artic->id]])->get();
                    if ($artic->limitinf !=null && $artic->limitsup != null) {
                        $rules['cantidadpedida.'.$key]='required|numeric|between:'.$artic->limitinf.','.$artic->limitsup.'|min:1|max:'.$stock->sum('total');
                    }else{
                        $rules['cantidadpedida.'.$key]='required|numeric|min:1|max:'.$stock->sum('total');
                    }
                }
                if(array_key_exists('estructList',$input)){
                    $rules['estructList']='required';
                }
                break;
            case 'dateExistDe':
                $rules=[
                   'para_uso'=>'required|max:191',
                   'tipo_pedido'=>'required|in:1,2,3',
                   'financiamiento'=>'required'
                ];
                foreach ($artid as $key => $art) {
                    $artic=Articulo::findOrfail($art);
                    $stock=Stock::where([['almacene_id',$input['almacen']],
                        ['articulo_id',$artic->id]])->get();
                    if ($artic->limitinf !=null && $artic->limitsup != null) {
                        $rules['cantidadpedida.'.$key]='required|numeric|between:'.$artic->limitinf.','.$artic->limitsup.'|min:1|max:'.$stock->sum('total');
                    }else{
                        $rules['cantidadpedida.'.$key]='required|numeric|min:1|max:'.$stock->sum('total');
                    }
                }
                if(array_key_exists('estructList',$input)){
                    $rules['estructList']='required';
                }
                break;
            case 'obsListPed':
                $rules=[
                    'tipo'=>'required',
                    'para_uso'=>'required|max:191',
                    'financiamiento'=>'required',
                    'observacion'=>'required|max:191'
                ];
                if(array_key_exists('estruct',$input)){
                    $rules['estruct']='required';
                }
                break;
            case 'dateExistNot' || 'dateExistNotPed':
                $rules=[
                    'cantidadpedida.*'=>'required|numeric|min:1',
                    'para_uso'=>'required|max:191',
                    'tipo_pedido'=>'required|in:1,2,3',
                    'financiamiento'=>'required'
                ];
                if(array_key_exists('estructList',$input)){
                    $rules['estructList']='required';
                }
                break;
            
        }
        $validation=Validator::make($input,$rules,$this->messages());
        if ($validation->fails()) {
            return $validation->validate();
        }else{
            return $rules;
        }
    }
    public function messages(){
        return[
           'cantidadpedida.*.max'=>'1',
            'cantidadpedida.*.required'=>'El campo es requerido',
            'cantidadpedida.*.numeric'=>'El campo debe ser numérico',
            'cantidadpedida.*.integer'=>'cantidad pedida debe ser entero',
            'cantidadpedida.*.min'=>'cantidad pedida como mínimo 1',
            'artid.*.required'=>'El campo es requerido',
            'artid.*.in'=>'Valor de material inválido',
            'artid.*.distinct'=>'Registro duplicado',
            'catid.*.required'=>'El campo es requerido',
            'catid.*.in'=>'Valor de partida inválido',
            'unidid.*.required'=>'El campo es requirido',
            'nameart.*.required'=>'El campo es requerido',
            'nameart.*.max'=>'Cantidad máxima de caracteres excedida',
            'nameart.*.unique'=>'El nombre de articulo ya está en uso',
            'usoArt.*.required'=>'El campo es requerido',
            'usoArt.*.max'=>'Cantidad máxima de caracteres excedida',
            'para_uso.required'=>'El campo es requerido',
            'para_uso.max'=>'Cantidad máxima de caracteres excedida',
            'tipo_pedido.required'=>'El campo tipo de pedido es requerido',
            'tipo.required'=>'El campo tipo de pedido es requerido',
            'observaciones.required'=>'El campo observaciones es requerido',
            'observaciones.max'=>'El campo observaciones no debe exceder los 191 caracteres',
            'tipo_pedido.in'=>'El tipo de pedido es inválido',
            'al_almacen_id.required'=>'El campo almacen es requerido',
            'al_almacen_id.in'=>'Valor de almacen invalido',
            'estructList.required'=>'El campo estructura programática es requerido',
            'estruct.required'=>'El campo estructura programática es requerido',
            'financiamiento.required'=>'El campo financiamiento es requirido',
            'observacion.required'=>'El campo observacion es requerido',
            'observacion.max'=>'El campo excede la cantidad de caracteres permitidos'

        ];
    }

     public function authorize()
    {
        return true;
    }

}
