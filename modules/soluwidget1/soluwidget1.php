<?php
require_once(dirname(__FILE__) . '/classes/SoluWidget1Obj.php');
/**
 * @author Cesar Auris <sistemas_aempresarial@hotmail.com>
 */
class Soluwidget1 extends Module
{

    protected $_html = '';
    
    public function __construct()
    {
        $this->name        = 'soluwidget1';
        $this->tab         = 'front_office_features';
        $this->version     = '1.0';
        $this->author      = 'Cesar Auris Saga';
        $this->displayName = $this->l('Modulo gidget1');
        $this->description = $this->l('Modulo para gestionar contenido en la columna izquierda.');
        $this->bootstrap   = true; //libreria bootsrap
        $this->secure_key = Tools::encrypt($this->name);
        
        $this->ps_versions_compliancy = array(
            'min' => '1.5',
            'max' => _PS_VERSION_
        ); //las versiones con las que el módulo es compatible.     
        // $this->dependencies=array("blockbanner","bu"); //dependencias de otros modulos
        
        
        parent::__construct();
    }
    public function getContent()
    {
        if (Tools::getValue('eliminar')==1 && Tools::getValue('id')) {
            $id=Tools::getValue('id');
           $this->eliminarRegistro($id);
        }

      



        $this->context->controller->addJS(_PS_JS_DIR_.'tiny_mce/tiny_mce.js');
        $this->context->controller->addJS(_PS_JS_DIR_.'admin/tinymce.inc.js');
        // $this->context->controller->addCSS($this->_path.'homeslider.css');
        // $this->context->controller->addJS($this->_path.'js/homeslider.js?refresh='.date('Y-m-d_m-s'));
        // $this->context->controller->addJqueryPlugin(array('bxslider'));
        $this->_html = '';

        $this->_html .= $this->headerHTML();

        $this->panelNombreWidget();
        $this->displayForm();
        $this->listaRegistros();
        return $this->_html;

       // echo _PS_JS_DIR_;exit;

        /*
        $data = array();
        
        
        $this->context->controller->addJqueryUI('ui.sortable');
        if (Tools::isSubmit('soluanalytics_form')) {
            
            
        }
       
        
        $data['envio_form_token']  = Tools::getAdminTokenLite('AdminModules');
        $data['envio_form'] = AdminController::$currentIndex . '&token=' . $data['envio_form_token'] . '&configure=' . $this->name;
        
        $this->context->smarty->assign($data);
        return $this->display(__FILE__, "getContent.tpl");
        */
         $output = null;

 
   
    return $this->_html .$this->displayForm();
    }

public function listaRegistros(){

    $envio_form_token  = Tools::getAdminTokenLite('AdminModules');
        $envio_form = AdminController::$currentIndex . '&token=' . $envio_form_token . '&configure=' . $this->name;

 $widgetObject = new SoluWidget1Obj();
    $rows=$widgetObject->getAll();




    $this->_html.='<fieldset>
   <h2>Configuracion del modulos de Fotos del cliente</h2>
   <div class="panel">
      <div class="panel-heading">
         <legend> <i class="icon-print"></i> Listado creados</legend>



      </div>
      <div class="table-responsive-row clearfix">
         <table class="table customer">
            <thead>
               <tr class="nodrag nodrop">
                  <th class="fixed-width-xs text-center">
                     <span class="title_box">
                     ID
                     </span>
                  </th>
                  <th class="">
                     <span class="title_box">
                     Titulo
                     </span>
                  </th>
                   <th class="">
                     <span class="title_box">
                     Orden
                     </span>
                  </th>
                   <th class="">
                     <span class="title_box">
                     Activo
                     </span>
                  </th>
                   <th class="">
                     <span class="title_box">
                     Mostrar Titulo
                     </span>
                  </th>
                  <th class="">
                     <span class="title_box">
                     Fecha de Creacion
                     </span>
                  </th>
                  <th class="">
                     <span class="title_box">
                     Fecha de Actualización
                     </span>
                  </th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
            ';
            foreach ($rows as $row) {
               
          

              $this->_html.='  <tr class=" odd">
                  <td class="pointer text-center">
                   '.$row['id'].'
                  </td>
                  <td class="pointer">
                     '.$row['titulo'].'
                  </td>
                   <td class="pointer">
                     '.$row['orden'].'
                  </td>
                  <td class="pointer">';

                   if($row['active']==1){
                    $this->_html.='<a class="list-action-enable action-enabled"> <i class="icon-check"></i></a>';
                }else{
                    $this->_html.='<a class="list-action-enable action-disabled" ><i class="icon-remove"></i></a>';
                }
                $this->_html.=' </td>
                     <td class="pointer">';

                   if($row['show_titulo']==1){
                    $this->_html.='<a class="list-action-enable action-enabled"> <i class="icon-check"></i></a>';
                }else{
                    $this->_html.='<a class="list-action-enable action-disabled" ><i class="icon-remove"></i></a>';
                }
                  $this->_html.=' </td>


                  <td class="pointer">
                     '.$row['date_add'].'
                  </td>
                  <td class="pointer">
                     '.$row['date_upd'].'
                  </td>
                  <td class="text-right">
                     <div class="btn-group-action">
                        <div class="btn-group pull-right">
                           <a href="'.$envio_form.'&id='.$row['id'].'" title="Modificar" class="edit btn btn-default">
                           <i class="icon-pencil"></i> Modificar
                           </a>
                           <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                           <i class="icon-caret-down"></i>&nbsp;
                           </button>
                           <ul class="dropdown-menu">
                              <li>
                                 <a href="'.$envio_form.'&id='.$row['id'].'" title="Ver">
                                 <i class="icon-search-plus"></i> Ver
                                 </a>                          
                              </li>
                              <li class="divider">
                              </li>
                              <li>
                                 <a href="'.$envio_form.'&eliminar=1&id='.$row['id'].'" onclick="if (confirm(\'¿Borrar elementos seleccionados?\n\nNNo se podra recuperar\')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Eliminar" class="delete">
                                 <i class="icon-trash"></i> Eliminar
                                 </a>                          
                              </li>
                           </ul>
                        </div>
                     </div>
                  </td>
               </tr>';
           }

                $this->_html.=' 
         </table>
      </div>
   </div>
</fieldset>';

}
    
public function panelNombreWidget(){
    $data=array();



    $widgetObject = new SoluWidget1Obj();
    $rows=$widgetObject->getAll();

    //$this->context->controller->addCSS($this->_path.'homeslider.css');

    if (Tools::isSubmit($this->name.'panelNombreWidget')) {

        $soluwidget1_nombre_widget = Tools::getValue('nombre_widget');

        if (!$soluwidget1_nombre_widget || empty($soluwidget1_nombre_widget) || !Validate::isGenericName($soluwidget1_nombre_widget) || $soluwidget1_nombre_widget == "") {
            $data['error'] = 1;
            $data['msg']   = $this->l('Codigo Invalido');

        } else {
            Configuration::updateValue("SOLUWIDGET1_NOMBRE_WIDGET", $soluwidget1_nombre_widget);
            $data['error'] = 0;
            $data['msg']   = $this->l('Codigo Valido');


        }
    }
    $data['moduloName']=$this->name;
    $data['soluwidget1_nombre_widget'] = Configuration::get('SOLUWIDGET1_NOMBRE_WIDGET');

    $data['envio_form_token']  = Tools::getAdminTokenLite('AdminModules');
    $data['envio_form'] = AdminController::$currentIndex . '&token=' . $data['envio_form_token'] . '&configure=' . $this->name;

    $this->smarty->assign($data);
    $this->_html.= $this->display(__FILE__, '/views/templates/hook/panelnombrewidget.tpl');

   




}
    
    public function headerHTML()
    {
        
        $this->context->controller->addJqueryUI('ui.sortable');
        /* Style & js for fieldset 'slides configuration' */
        $html = '<script type="text/javascript">
            $(function() {
                var $mySlides = $("#slides");
                $mySlides.sortable({
                    opacity: 0.6,
                    cursor: "move",
                    update: function() {
                        var order = $(this).sortable("serialize") + "&action=updateSlidesPosition";
                        $.post("'.$this->context->shop->physical_uri.$this->context->shop->virtual_uri.'modules/'.$this->name.'/ajax_'.$this->name.'.php?secure_key='.$this->secure_key.'", order);
                        }
                    });
                $mySlides.hover(function() {
                    $(this).css("cursor","move");
                    },
                    function() {
                    $(this).css("cursor","auto");
                });
            });
        </script>';

        return $html;
    }


    public function displayForm()
{
    // Get default language
    $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
    // ECHO '<script language="javascript" type="text/javascript">tinySetup();</script>';
    // Init Fields form array

    $widgetObject = new SoluWidget1Obj();
    $total_reg=$widgetObject->getTotalRegistros();

    $options = array();  


  $counter = $total_reg+1;  
 while ($counter > 0)
    {
        $valor=$counter--;      
       $options[] = array(
        "id_option" => $valor,
        "name" => $valor
        );
    }
     /*
while (true) {
  $i++; 
        $options[] = array(
        "id_option" => $i,
        "name" => $i
        );
        if ($i==($total_reg)+1) {
            break;
        }
}
*/

$fields_form[0]['form'] = array(
    'tinymce' => true,
    'legend' => array(
        'title' => $this->l('Settings') ,
        'icon' => 'icon-edit'
    ) ,
    'input' => array(
        array(
            'type' => 'hidden',
            'value' => NULL,
            'name' => 'id'
        ) ,
        array(
            'type' => 'text',
            'label' => $this->l('Titulo') ,
            'name' => 'titulo'
        ) ,
        array(
            'type' => 'textarea',
            'label' => $this->l('Contenido') ,
            'name' => 'contenido',
            'autoload_rte' => true,

            // 'lang' => true,

        ) ,

        array(
  'type' => 'select',                              // This is a <select> tag.
  'label' => $this->l('Orden:'),         // The <label> for this <select> tag.
  'asc' => $this->l('Choose a shipping method'),  // A help text, displayed right next to the <select> tag.
  'name' => 'orden',                     // The content of the 'id' attribute of the <select> tag.
  'required' => true,                              // If set to true, this option must be set.
  'options' => array(
    'query' => $options,                           // $options contains the data itself.
    'id' => 'id_option',                           // The value of the 'id' key must be the same as the key for 'value' attribute of the <option> tag in each $options sub-array.
    'name' => 'name'                               // The value of the 'name' key must be the same as the key for the text content of the <option> tag in each $options sub-array.
  )
),
        array(
            'type' => 'switch',
            'label' => $this->l('Mostrar Titulo') ,
            'name' => 'show_titulo',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'active_on',
                    'value' => 1,
                    'label' => $this->l('Yes')
                ) ,
                array(
                    'id' => 'active_off',
                    'value' => 0,
                    'label' => $this->l('No')
                )
            ) ,
        ) ,
        array(
            'type' => 'switch',
            'label' => $this->l('Active') ,
            'name' => 'active',
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'active_on',
                    'value' => 1,
                    'label' => $this->l('Si')
                ) ,
                array(
                    'id' => 'active_off',
                    'value' => 0,
                    'label' => $this->l('No')
                )
            ) ,
        ) ,
    ) ,
    'submit' => array(
        'title' => $this->l('Save') ,
        'class' => 'btn btn-default pull-right'
    )
);



$helper = new HelperForm();
$helper->show_toolbar             = false;
$helper->table                    = $this->table;
$helper->module                   = $this;
$helper->default_form_language    = $this->context->language->id;
$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

$helper->identifier    = $this->identifier;
$helper->submit_action = 'submit'.$this->name;
$helper->currentIndex  = $this->context->link->getAdminLink('AdminModules', false)
                         . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
$helper->token         = Tools::getAdminTokenLite('AdminModules');

  //-------
  
    // valores por defecto
$widgetObject = new SoluWidget1Obj();
$helper->fields_value['id'] = NULL;

$helper->fields_value['titulo'] = (Tools::getValue('titulo'))?Tools::getValue('titulo'):'';
$helper->fields_value['contenido'] = (Tools::getValue('contenido'))?Tools::getValue('contenido'):'';
$helper->fields_value['orden'] = (Tools::getValue('orden'))?Tools::getValue('orden'):0;
$helper->fields_value['active'] = (Tools::getValue('active'))?Tools::getValue('active'):1;
$helper->fields_value['show_titulo'] = (Tools::getValue('show_titulo'))?Tools::getValue('show_titulo'):1;



//----------- si vamos a modificar un registro entrara aqui
if (Tools::getValue('id')) {
    $row=$widgetObject->getRow(Tools::getValue('id'));
     $helper->fields_value['id'] = Tools::getValue('id');
 $helper->fields_value['titulo'] = $row['titulo'];
 $helper->fields_value['contenido'] = $row['contenido'];
$helper->fields_value['orden'] = $row['orden'];

  $helper->fields_value['active'] = $row['active'];

   $helper->fields_value['show_titulo'] = $row['show_titulo'];

}
//-------------

 if (Tools::isSubmit('submit'.$this->name))
    {
       
        $id=Tools::getValue('id'); 
        $titulo=Tools::getValue('titulo');    
         $orden=Tools::getValue('orden');        
        $contenido=Tools::getValue('contenido');
         $active=Tools::getValue('active');
          $show_titulo=Tools::getValue('show_titulo');

       

        $my_module_name = strval(Tools::getValue('show_titulo'));
        // if (!$my_module_name
        //   || empty($my_module_name)
        //   || !Validate::isGenericName($my_module_name)){
        //     $this->_html .= $this->displayError($this->l('Invalid Configuration value'));
          if ($my_module_name==""){
            $this->_html .= $this->displayError($this->l('Invalid Configuration value'));
    }elseif (empty(Tools::getValue('titulo')) || Tools::getValue('titulo')=="") {
         $this->_html .= $this->displayError($this->l('Ingresa un titulo valido'));
    }            
        else
        {
            Configuration::updateValue('SOLUWIDGET1_TITLE_ON', $my_module_name);
            //save DB
              $widgetObject = new SoluWidget1Obj();
                    //$widgetObject->id_product=(int)$id_product;
             // $widgetObject->id=NULL;
                    $widgetObject->id=$id;
                    $widgetObject->titulo=$titulo;
                    $widgetObject->orden=$orden;
                    $widgetObject->contenido=($contenido);
                    $widgetObject->active=$active;
                    $widgetObject->show_titulo=$show_titulo;
                    $widgetObject->date_add=date('Y-m-d H:i:s');
                    $widgetObject->date_upd=date('Y-m-d H:i:s'); 
                    $result=$widgetObject->Guardar();                                  
                    //$result=$widgetObject->add();//añadimos
                    //---- end DB ---------
                    $this->_html .= $this->displayConfirmation($result['msg']);

                    if ($result['success']==true && $result['tipo_sql']=='insert') {
                        $this->_html .= $this->displayConfirmation($this->l('Se inserto nuevo registro'));
                       //$this->context->smarty->assign('saveForm','1');
                       $hhh= $this->currentURL();                    
                        header('Location: '.$hhh);
                        


    
                    }
                    else if ($result['success']==true && $result['tipo_sql']=='update') {
                        $this->_html .= $this->displayConfirmation($this->l('Se actualizo registro'));
                         $hhh= $this->currentURL();                    
                        header('Location: '.$hhh);
                        
                    }
                    else{
                         //$this->context->smarty->assign('errorForm',$this->l('No se ah podido gravar foto en la DB'));
                    }

           
        }
    }



    $this->_html .= $helper->generateForm($fields_form);
     $widgetObject = new SoluWidget1Obj();

  
}

    public function install()
    {
        
        
        if (!parent::install()
            || !$this->registerHook('leftColumn') 
            || !$this->installDB() 
            ||  !Configuration::updateValue("SOLUWIDGET1_NOMBRE_WIDGET",ucfirst($this->displayName))
                ) {
            return false;
        }
        
        return true;
        
    }
    
    
    public function installDB()
    {
        return Db::getInstance()->execute("CREATE TABLE IF NOT EXISTS `" . _DB_PREFIX_ . "soluwidget1` (
      `id` int(11) NOT NULL AUTO_INCREMENT,  
      
       `titulo` varchar(255) NOT NULL,  
      `contenido` text NOT NULL,
      `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',

      `show_titulo` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
       `orden` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
       `date_add` datetime  NULL,
        `date_upd` datetime  NULL,           
      PRIMARY KEY (`id`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8  AUTO_INCREMENT=1;");
        
        
        
    }
    
    
    public function uninstall()
    {
        
        if (!parent::uninstall() 
            || !$this->registerHook('leftColumn') 
            || !$this->uninstallDB() 
            || !Configuration::deleteByName('SOLUWIDGET1_NOMBRE_WIDGET')) {
            return false;
        }
        return true;
        
        
    }
    
    
    public function uninstallDB()
    {
        return Db::getInstance()->execute("DROP TABLE  `" . _DB_PREFIX_ . "soluwidget1` ;");
        
        
        
    }
    
    //este  hook es el que  se vee en  ladod el clciente
    public function hookLeftColumn($params)
    {
        //return true;
        $data = array();
        $this->context->controller->addCss(($this->_path).'css/soluwidget1.css');
        $this->context->controller->addJs(($this->_path).'js/soluwidget1.js');
  //$this->context->controller->addJs(($this->_path).'js/soluwidget1.js?refresh='.date('Y-m-d_m-s'), 'all');

        $widgetObject = new SoluWidget1Obj();
        $data['listados']=$widgetObject->getAllActivos();
        $data['soluwidget1_nombre_widget'] = Configuration::get('SOLUWIDGET1_NOMBRE_WIDGET');

        $lista=array();
        foreach ($data['listados'] as  $value) {
            $lista[]=array(
                "titulo"=>$value['titulo'],
                "orden"=>$value['orden'],
                "contenido"=>$this->buildContent($value['contenido']),
                "active"=>$value['active'],
                "show_titulo"=>$value['show_titulo'],

                );
        }
        $data['listado']=$lista;
        $this->smarty->assign($data);
        return $this->display(__FILE__, '/views/templates/hook/displayWidgetLeftColum.tpl');

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

    public function currentURL(){
         if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
                            $pro = 'https';
                        } else {
                            $pro = 'http';
                        }
                        $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
                        $current_url =  $pro."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
                        return  $current_url;
    }


    function eliminarRegistro($id){

      $widgetObject = new SoluWidget1Obj();            
      $widgetObject->id=$id;    
      $result=$widgetObject->eliminarRegistro();   
      $envio_form_token  = Tools::getAdminTokenLite('AdminModules');
      $envio_form = AdminController::$currentIndex . '&token=' . $envio_form_token . '&configure=' . $this->name;                  
      header('Location: '.$envio_form);
  }



   public function buildContent($content) {
        //$exp[] = '/width=\"+([0-9]+%)\"/'; //quita porcentaje de anchos
/*
        $exp[] = '/<blockquote cite="(.*?)\">.*?<\/blockquote>/'; //facebook
        $exp[] = '/<iframe src="https:\/\/www.facebook.com\/plugins\/.*?href=https%3A%2F%2Fwww.facebook.com%2F(.*?)%2F(.*?)%2F(.*?)%.*?width="(.*?)".*?height="(.*?)".*?iframe>/'; //facebook
        $exp[] = '/<blockquote class="instagram-media".*?>.*?(www.instagram.com\/p\/(.*?)\/).*?(<\/blockquote>)/'; //instagram
        $exp[] = '/(<blockquote)( class="twitter-tweet".*?>)(.*?twitter.com\/.*?\/status\/(.*?)".*?)(<\/blockquote>)/'; //twitter
        $exp[] = '/<iframe.*?src="https:\/\/www.youtube.com\/embed\/(.*?)\?.*" frameborder="0" allowfullscreen><\/iframe>/'; //youtube
        $exp[] = '/<(IMG|img).*?((src|SRC)=".*?\").*?>/s'; // imágenes sueltas 
        $exp[] = '/<iframe.*?src="(https:\/\/.*?)".*?<\/iframe>/'; //iframes
        $exp[] = '/<script.*?src="(https|http):\/\/player.ooyala.com\/iframe.js#.*?ec=(.*?)(&|").*?<\/script>/'; //embed ooyala
        $exp[] = '/<iframe.*?src="(\/\/giphy.*?)".*?<\/iframe>/'; //imagen giphy


        $exp[] = '/<\/?div[^>]*>/'; ///---elimina divs
        $exp[] = '/<iframe.*?<\/iframe>/'; //iframes
        $exp[] = '/<script.*?<\/script>/'; //scripts
        $exp[] = '/(<a.*? )(target=".*?")(.*?>.*?<\/a>)/'; //a target
        $exp[] = '/style=".*?"/i'; //etiquetas style
        $exp[] = '<blockquote.*?\/blockquote>'; //etiquetas blockquote
        $exp[] = '/<object.*?\/object>/'; //elimina etiquetas object

        $exp[] = '/width=+([0-9]+%)/';
        

       
        //$replace[] = '888px';
        $replace[] = '<amp-facebook width=486 height=657 layout="responsive" data-href="$1"></amp-facebook>';
        $replace[] = '<amp-facebook width=$4 height=$5 layout="responsive" data-href="https://www.facebook.com/$1/$2/$3"></amp-facebook>';
        $replace[] = '<amp-instagram data-shortcode="$2" width="400" height="400" layout="responsive"></amp-instagram>';
        $replace[] = '<amp-twitter width=486 height=657 layout="responsive" data-tweetid="$4" data-cards="visible"></amp-twitter>';
        $replace[] = '<amp-youtube data-videoid="$1" layout="responsive" width="304" height="190"></amp-youtube>';
        $replace[] = '<amp-img $2 layout="responsive" width="580" height="380"></amp-img>';
        $replace[] = '<amp-iframe width=600 height=350 sandbox="allow-scripts allow-same-origin" layout="responsive" frameborder="0" src="$1"></amp-iframe>';
        $replace[] = '<amp-video width=600 height=350 src="//ak.c.ooyala.com/$2/DOcJ-FxaFrRg4gtDEwOmk2OjBrO6qGv_" controls><source type="video/mp4" src="//ak.c.ooyala.com/$2/DOcJ-FxaFrRg4gtDEwOmk2OjBrO6qGv_"></amp-video>';
        $replace[] = '<amp-iframe width=600 height=350 sandbox="allow-scripts allow-same-origin" layout="responsive" frameborder="0" src="https:$1"></amp-iframe>';        

        $replace[] = '';
        $replace[] = '';
        $replace[] = '';
        $replace[] = '$1$3';
        $replace[] = '';
        $replace[] = '';
        $replace[] = '';
        $replace[] = 'width=600px';
        */

         $exp[] = '/<(IMG|img).*?(class=\"(.*?)\")*?((src|SRC)=\".*?\").*?>/'; //facebook

         $replace[] = '<img clas="$3 replace-2x img-responsive" $4  width="250" height="250" itemprop="image">';

        $final_content = preg_replace($exp, $replace, $content);

        //return htmlentities($final_content, 48 | ENT_NOQUOTES , "UTF-8");
        return $final_content;
    }

    
}
