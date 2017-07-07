<?php
/**
 * @author Cesra Auris <sistemas_aempresarial@hotmail.com>
 * @
 */
//require_once(dirname(__FILE__).'/classes/FotoclienteObj.php');
class FotoclienteFotosModuleFrontController extends ModuleFrontController{

public function init(){
	$this->display_column_left=false;
	$this->display_column_right=false;
	parent::init();	

}

public function setMedia(){	
	parent::setMedia();	//al declara esto ya podemos usar el context de smart
	$this->path=__PS_BASE_URI__.'modules/fotocliente/';
	$this->context->controller->addCSS($this->path.'views/css/fotocliente.css','all');
	$this->context->controller->addJS($this->path.'views/js/fotocliente.js');
}
	//devolver los contenidos
	protected function initListaFotos(){
		//return 'ola amigos';
		$fotos=FotoclienteObj::getAll();
        $this->context->smarty->assign("fotos",$fotos);

        $enabled_coomment=Configuration::get('FOTOCLI_COMMENTS');
        $this->context->smarty->assign("enabled_coomment",$enabled_coomment);
        
		$this->setTemplate('listaFotos.tpl');
	}

	public function initContent(){
		parent::initContent();		
		//recuperamos el parametro pasado por la url
		$module_action=Tools::getValue('module_action');
		$action_list=array('listafotos'=>'initListaFotos');
		if (isset($action_list[$module_action])) {
			$function =$action_list[$module_action];
			$this->$function();
				
		}else{
			echo 'No se encontro medodo del controlador :fotos.php';
		}
	}



}

 ?>