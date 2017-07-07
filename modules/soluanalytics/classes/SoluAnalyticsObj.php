<?php 
class SoluAnalyticsObj extends ObjectModel{
public $id;
public $comentario;

 /**
  *@see ObjectModel:$definition 
  */

public static $definition=array(
	
		'table'=>'soluanalytics', //tabla db (ojo  no es necesario poner el prefijo)
		'primary'=>'id', //clave primaria de la tabla
		'multilang'=>false,//multilenguaje 
		//array con los campos de la tabla
		'fields'=>array(
				'id'=>array('type'=>self::TYPE_INT,//tipo de campo
										'validate'=>'isUnsignedID',//tipo de validacion
												'required'=>true //si es requerido
												),
				
				'comentario'=>array('type'=>self::TYPE_STRING,'validate'=>'isCleanHtml'),
			),
	);
public static function getProductFotos($id){

	 $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."soluanalytics`
	  WHERE  `id`=".(int)$id." ORDER BY `id` DESC;");
	 return $fotos;

}

public static function getAll(){

	 $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."soluanalytics` ORDER BY `id` DESC;");
	 return $fotos;

}

}
