<?php
if (!defined( '_PS_VERSION_' ))
    exit;
require_once(dirname(__FILE__) . '/classes/SoluAnalyticsObj.php');

/**
* 2017 solucionessystem
*
* NOTE
* You are free edit and play around with the module.
* Please visit contentbox.org for more information.
*
*  @author    Cesar Auris <sistemas_aempresarial@hotmail.com>
*  @copyright solucionessystem
*  @version   1.1.1
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  http://solucionessystem.com
* 
*/

class Soluanalytics extends Module
{
    
    public function __construct()
    {    

        $this->name        = 'soluanalytics';
        $this->tab         = 'front_office_features';
        $this->version     = '1.1.1';
        $this->author      = 'Cesar Auris Saga';
        $this->displayName = $this->l('Modulo codigo analytics');
        $this->description = $this->l('Modulo creado por solucionessystem.com ');
        $this->bootstrap   = true; //libreria bootsrap
        
       $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.6'); //las versiones con las que el módulo es compatible.     
        // $this->dependencies=array("blockbanner","bu"); //dependencias de otros modulos
        
        
        parent::__construct();
    }
    public function getContent()
    {
        $data = array();
        
        
        
        if (Tools::isSubmit('soluanalytics_form')) {
            
            $soluanalytics_id_seguimiento = Tools::getValue('id_seguimiento');
            
            if (!$soluanalytics_id_seguimiento || empty($soluanalytics_id_seguimiento) || !Validate::isGenericName($soluanalytics_id_seguimiento) || $soluanalytics_id_seguimiento == "") {
                $data['error'] = 1;
                $data['msg']   = $this->l('Codigo Invalido');
                
            } else {
                Configuration::updateValue("SOLUANALYTICS_ID_SEGUIMIENTO", $soluanalytics_id_seguimiento);
                $data['error'] = 0;
                $data['msg']   = $this->l('Codigo Valido');
                
                
            }
        }
        $data['soluanalytics_id_seguimiento'] = Configuration::get('SOLUANALYTICS_ID_SEGUIMIENTO');
        
        $data['envio_form_token']  = Tools::getAdminTokenLite('AdminModules');
        $data['envio_form'] = AdminController::$currentIndex . '&token=' . $data['envio_form_token'] . '&configure=' . $this->name;
        
        $this->context->smarty->assign($data);
        return $this->display(__FILE__, "getContent.tpl");
    }
    public function install()
    {
        
        
        if (!parent::install() || !$this->registerHook('displayFooter') || !$this->installDB()) {
            return false;
        }
        
        return true;
        
    }
    
    
    public function installDB()
    {
        return Db::getInstance()->execute("CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "soluanalytics` (
      `id` int(11) NOT NULL AUTO_INCREMENT,       
      `comentario` text NOT NULL,           
      PRIMARY KEY (`id`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8  AUTO_INCREMENT=1;");
        
        
        
    }
    
    
    public function uninstall()
    {
        
        if (!parent::uninstall() || !$this->registerHook('displayFooter') || !$this->uninstallDB() || !Configuration::deleteByName('SOLUANALYTICS_ID_SEGUIMIENTO')) {
            return false;
        }
        return true;
        
        
    }
    
    
    public function uninstallDB()
    {
        return Db::getInstance()->execute("DROP TABLE  `" . _DB_PREFIX_ . "soluanalytics` ;");
        
        
        
    }
    
    //este  hook es el que  se vee en  ladod el clciente
    public function hookdisplayFooter($params)
    {
        
        
        $soluanalytics_id_seguimiento = Configuration::get('SOLUANALYTICS_ID_SEGUIMIENTO');
        $this->context->smarty->assign("soluanalytics_id_seguimiento", $soluanalytics_id_seguimiento);
        
        
        return $this->display(__FILE__, 'displayProductTabContent.tpl');
        //return "contenido de mi modulos";
    }
    
    
    
    
    
    
    /**
     * @param  string $type el tipo de accion cuando elcliente pulsa en las opciones del modulo como inicializar instalar configurar
     * @param  string $href la url de donde  se ejecuta
     * @return [type] devueleve una
     * @example 
     */
    public function onClickOption($type, $href = '')
    {
        
        //return "return confirm('Estas seguro ?');";
        $matchType = array(
            "reset" => "return confirm('Estas seguro que quiere resetear el modulo ?');",
            "delete" => "return confirm('confirma que desea borra el modulo?');"
        );
        if (isset($matchType[$type])) {
            return $matchType[$type];
        }
        return '';
        
    }
    
}
