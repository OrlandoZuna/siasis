<?php
namespace App\Helper;
use Modules\Almacen\Entities\Articulo;
class ArticleHelper{
	public function getArticle($valList){
		return Articulo::whereIn('id',$valList)->get();
	}
}
?>