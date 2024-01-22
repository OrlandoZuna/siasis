<?php
namespace App\Repositories;

use App\Clasificador;

use KissParadigm\LaravelHashid\Facades\Hashid;
class ClasificadorLoginController
{
    protected $model;

    public function __construct(Clasificador $clasificador)
    {
        $this->model = $clasificador;
    }

    public function all()
    {
        return $this->model->orderBy('codigo', 'asc')->get();
    }

    public function clasificador($id)
    {
        $id = Hashid::decode($id);
        return $this->model->where('id', $id)->first();
    }

    public function store($request)
    {
        $clasificador= new Clasificador($request->all());
        $clasificador->codigo_min();
        $clasificador->save();
        return true;
    }

    public function update($request, $id)
    {
        $unit = $this->clasificador($id);
        $unit->find($request->all());
        $unit->codigo_min();
        return true;
    }

    public function destroy($id)
    {
        $id = Hashid::decode($id);
        $this->model->find($id)->delete();
        return true;
    }

}
