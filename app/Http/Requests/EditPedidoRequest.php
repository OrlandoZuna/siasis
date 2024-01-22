<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Almacen\Entities\Stock;
use Modules\Almacen\Entities\Articulo;
use Modules\Almacen\Entities\Detalle;
use Modules\Almacen\Entities\Categoria;
use Validator;
use Illuminate\Validation\Rule;
class EditPedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        $input=$this->request->all();
        $item_type=$this->request->get('dateAlm');
        
        switch ($item_type) {
            case 'dateExist':
                $cat=Categoria::pluck('id')->implode(',');
                $rules=[
                   'catid.*'=>'required|in:'.$cat,
                   'para_uso'=>'required|max:191',
                   'tipo_pedido'=>'required',
                ];
                foreach ($input['artid'] as $key => $art) {
                    if ($art==null) {
                        $rules['artid.'.$key]='required';
                        $rules['cantidadpedida.'.$key]='required|numeric';
                    }else{
                        $arts=Articulo::where('cat_id',$input['catid'][$key])->pluck('id');
                        $rules['artid.'.$key]=['required','distinct',Rule::in($arts)];
                        $artic=Articulo::findOrfail($art);
                        $stock=Stock::where([['almacene_id',$input['almacen']],
                            ['articulo_id',$art]])->get();
                        if ($artic->limitinf !=null && $artic->limitsup != null) {
                            $rules['cantidadpedida.'.$key]='required|numeric|between:'.$artic->limitinf.','.$artic->limitsup.'|max:'.$stock->sum('total');
                        }else{
                            $rules['cantidadpedida.'.$key]='required|numeric|min:1|max:'.$stock->sum('total');
                        }
                    }
                }
                break;
            case 'dateExistNot' || 'dateExistNotPed':
                $cat=Categoria::pluck('id')->implode(',');
                $rules=[
                    'catid.*'=>'required|in:'.$cat,
                    'cantidadpedida.*'=>'required|integer|numeric|min:1',
                    'para_uso'=>'required|max:191',
                    'tipo_pedido'=>'required|in:1,2',
                ];
                foreach ($input['artid'] as $key => $art) {
                    if($art != null){
                       $artic=Articulo::where('cat_id',$input['catid'][$key])->pluck('id');
                       $rules['artid.'.$key]=['required','distinct',Rule::in($artic)];
                    }else{
                        $rules['artid.'.$key]='required';
                    }
                }
                 break;
            case 'dateExistNotIn':
                $rules=[
                    'cantidadpedida.*'=>'required|numeric',
                    'catid.*'=>'required',
                    'unidid.*'=>'required',
                    'usoArt.*'=>'required|max:100',
                    'para_uso'=>'required|max:191',
                    'tipo_pedido'=>'required',
                    'observaciones'=>'required|max:191'
                ];
                $details=Detalle::where('pedido_id',$input['OrderDate'])->get();
                $detailsCount=count($details);
                foreach ($details as $key => $de) {
                    $article=Articulo::findOrfail($de->codigo_material);
                    if ($input['nameart'][$key] == $article->nombre) {
                        $rules['nameart.'.$key] = 'required|max:100';
                    }elseif($input['nameart'][$key] != $article->nombre || $input['nameart'][$key]== null ){
                        $rules['nameart.'.$key] = 'required|max:100|unique:pgsql.almacenes.articulos,nombre';
                    }
                }
                $nameartlist=array_slice($input['nameart'],$detailsCount);
                
                foreach ($nameartlist as $key => $name) {
                    $rules['nameart.'.($key+$detailsCount)]='required|max:100|unique:pgsql.almacenes.articulos,nombre';
                }
                break;
                case 'dateExistDe':
                $rules=[
                   'artid.*'=>'required|distinct',
                   'para_uso'=>'required|max:191',
                ];
                foreach ($this->request->get('artid') as $key => $art) {
                    if ($art==null) {
                        $rules['cantidadpedida.'.$key]='required|numeric';
                    }else{
                        $artic=Articulo::findOrfail($art);
                        $stock=Stock::where([['almacene_id',$input['almacen']],
                            ['articulo_id',$art]])->get();
                        if ($artic->limitinf !=null && $artic->limitsup != null) {
                            $rules['cantidadpedida.'.$key]='required|numeric|between:'.$artic->limitinf.','.$artic->limitsup.'|max:'.$stock->sum('total');
                        }else{
                            $rules['cantidadpedida.'.$key]='required|numeric|max:'.$stock->sum('total');
                        }       
                    }
                }
                break;
        }
        $validation=Validator::make($input,$rules,$this->messages());
        if ($validation->fails()) {
            return $validation->validate();
        }else{
           return $validation->failed();
        }
    }
    public function messages(){
        return[
            'cantidadpedida.*.max'=>'1',
            'cantidadpedida.*.required'=>'El campo es requerido',
            'cantidadpedida.*.numeric'=>'El campo debe ser numérico',
            'artid.*.required'=>'El campo es requerido',
            'artid.*.distinct'=>'Registro duplicado',
            'catid.*.required'=>'El campo es requerido',
            'unidid.*.required'=>'El campo es requirido',
            'nameart.*.required'=>'El campo es requerido',
            'nameart.*.max'=>'Cantidad máxima de caracteres excedida',
            'nameart.*.unique'=>'El nombre de articulo ya está en uso',
            'usoArt.*.required'=>'El campo es requerido',
            'usoArt.*.max'=>'Cantidad máxima de caracteres excedida',
            'para_uso.required'=>'El campo es requerido',
            'para_uso.max'=>'Cantidad máxima de caracteres excedida',
            'tipo_pedido.required'=>'El campo tipo de pedido es requerido',
            'observaciones.required'=>'El campo observaciones es requerido',
            'observaciones.max'=>'El campo observaciones no debe exceder los 191 caracteres'  
        ];
    }
    public function authorize()
    {
        return true;
    }
}
