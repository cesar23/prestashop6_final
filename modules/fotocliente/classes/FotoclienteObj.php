<?php 
class FotoclienteObj extends ObjectModel{
public $id_fotocliente_item;
public $id_product;
public $foto;
public $comment;

 /**
  *@see ObjectModel:$definition 
  */

public static $definition=array(
	
		'table'=>'fotocliente_item', //tabla db (ojo  no es necesario poner el prefijo)
		'primary'=>'id_fotocliente_item', //clave primaria de la tabla
		'multilang'=>false,//multilenguaje 
		//array con los campos de la tabla
		'fields'=>array(
				'id_product'=>array('type'=>self::TYPE_INT,//tipo de campo
										'validate'=>'isUnsignedID',//tipo de validacion
												'required'=>true //si es requerido
												),
				'foto'=>array('type'=>self::TYPE_STRING,'required'=>true),
				'comment'=>array('type'=>self::TYPE_STRING,'validate'=>'isCleanHtml'),
			),
	);
public static function getProductFotos($id_product){

	 $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."fotocliente_item`
	  WHERE  `id_product`=".(int)$id_product." ORDER BY `id_fotocliente_item` DESC;");
	 return $fotos;

}

public static function getAll(){

	 $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."fotocliente_item` ORDER BY `id_fotocliente_item` DESC;");
	 return $fotos;

}

}
