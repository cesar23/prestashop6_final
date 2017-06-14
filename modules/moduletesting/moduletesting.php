<?php
/*
*  @author Pablo Fernández para islaVisual
*  @version  Release: 1.0b
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

if (!defined('_PS_VERSION_')) exit;

class ModuleTesting extends Module {
    public function __construct(){
        $this->name = 'ModuleTesting';
        $this->tab = 'front_office_features';
        $this->version = '1.0b';
        $this->author = 'Pablo Fernández para islaVisual';

        parent::__construct();

        $this->displayName = $this->l('Módulo de Pruebas');
        $this->description = $this->l('Módulo creado a partir de otro. Pruebas.');
    }

    public function install(){
        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('footer') ||
            !$this->registerHook('header') ||
            !$this->registerHook('rightColumn'))
            return false;
        return true;
    }

    public function uninstall(){
        if ( !parent::uninstall() ) Db::getInstance()->Execute( 'DELETE FROM `' . _DB_PREFIX_ . 'ModuleTesting`' );
        parent::uninstall();
    }

    public function hookLeftColumn( $params ){
        global $smarty;
        return $this ->display( __FILE__, 'ModuleTesting.tpl' );
    }    
    
    public function hookRightColumn( $params ){
        return $this->hookLeftColumn( $params );
    }
}
