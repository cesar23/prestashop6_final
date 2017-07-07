<?php
class SoluWidget1Obj extends ObjectModel
{
    public $id;
    public $titulo;
    public $contenido;
     public $orden;
    public $active;
    public $show_titulo;
    public $date_add;
    public $date_upd;
    protected $_table;
    
    /**
     *@see ObjectModel:$definition 
     */
    
    
    public static $definition = array('table' => 'soluwidget1', //tabla db (ojo  no es necesario poner el prefijo)
        'primary' => 'id', //clave primaria de la tabla
        'multilang' => false, //multilenguaje 
        
    //array con los campos de la tabla
        'fields' => array('id' => array('type' => self::TYPE_INT, //tipo de campo
        'validate' => 'isUnsignedID', //tipo de validacion
        'required' => false //si es requerido
        ), 'titulo' => array('type' => self::TYPE_STRING, 'required' => true), 
        'contenido' => array('type' => self::TYPE_HTML, 'validate' => 'isCleanHtml', 'size' => 4000), 
        'orden' =>         array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
        'active' =>         array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
        'show_titulo' =>         array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
        'date_add' => array('type' => self::TYPE_DATE,  'validate' => 'isDateFormat', 'required' => false), 
        'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat', 'required' => false)));
    
    


/*
@return devuelve una fila
*/
public static function getRow($id)
    {
        
        $sql = "SELECT * FROM `" . _DB_PREFIX_ . "soluwidget1`  WHERE  `id`=" . (int) $id . " ORDER BY `id` DESC";
        $row = Db::getInstance()->getRow($sql);


        // $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."soluwidget1`
        //  WHERE  `id`=".(int)$id." ORDER BY `id` DESC;");
        return $row;
        
    }

/*
@return devuelve el total de registros
*/
    public static function getTotal($id)
    {
        
        $sql = "SELECT COUNT(*) FROM `" . _DB_PREFIX_ . "soluwidget1`  WHERE  `id`=" . (int) $id . " ORDER BY `id` DESC";
        $row = Db::getInstance()->getValue($sql);

      
        
        // $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."soluwidget1`
        //  WHERE  `id`=".(int)$id." ORDER BY `id` DESC;");
        return $row;
        
    }
    

   public static function getTotalRegistros()
    {
        
        $sql = "SELECT COUNT(*) FROM `" . _DB_PREFIX_ . "soluwidget1` ";
        $row = Db::getInstance()->getValue($sql);

      
        
        // $fotos= Db::getInstance()->executeS("SELECT * FROM `"._DB_PREFIX_."soluwidget1`
        //  WHERE  `id`=".(int)$id." ORDER BY `id` DESC;");
        return $row;
        
    }

    public function Guardar()
    {
        // $context = Context::getContext();
        //$row     = (isset($this->id)) ? $this->getRow($this->id):NULL;
        
        $data             = array();
        $data['success']  = false;
        $data['last_id']  = NULL;
        $data['fect_row'] = NULL;
        $data['tipo_sql'] = '';
        $data['msg'] = ($this->titulo);

        
        if (empty($this->id) || !$this->getTotal($this->id)) {
            //--------INSERT
            $sql="  
            INSERT INTO `" . _DB_PREFIX_ . "soluwidget1` (`id`, `titulo`, `contenido`,`orden`,`active`, `show_titulo`,`date_add`, `date_upd`)  
            VALUES(NULL,  '" . pSQL($this->titulo) . "', 
             '" . pSQL($this->contenido,true) . "', 
               '" . (int)$this->orden . "',  
              '" . (int)$this->active . "',  
               '" . (int)$this->show_titulo . "',  
             '" . pSQL($this->date_add) . "', 
              '" . pSQL($this->date_upd) . "')  
              ";

            Db::getInstance()->execute($sql);
            
            $data['last_id']  = Db::getInstance()->Insert_ID();
            $data['success']  = true;
            $data['tipo_sql'] = 'insert';
            
        } else {
            //--------ACTUALIZA
            $sql = "UPDATE `" . _DB_PREFIX_ . "soluwidget1`  
        SET `titulo` = '" . pSQL($this->titulo) . "',  
        `contenido` = '" . pSQL($this->contenido,true) . "', 
        `orden` = '" .(int)$this->orden . "',  
         `active` = '" .(int)$this->active . "', 
          `show_titulo` = '" .(int)$this->show_titulo . "',             
        `date_upd` = '" . pSQL($this->date_upd) . "'  
        WHERE `id` = " . (int) $this->id;
            
            Db::getInstance()->execute($sql);
            //-----fila afectadas
            if (Db::getInstance()->Affected_Rows() == 1) {
                $data['fect_row'] = 1;
                $data['success']  = true;
                $data['tipo_sql'] = 'update';
            }
            
            /* --------Cuando hay varios SQL
            if (Db::getInstance()->execute($sql))
            Db::getInstance()->execute($sub_sql);
            */
            
            
            
            
        }
        return $data;
        
    }
    
    public static function getAll()
    {
        
        $row = Db::getInstance()->executeS("SELECT * FROM `" . _DB_PREFIX_ . "soluwidget1` ORDER BY `orden` DESC;");
        return $row;
        
    }

     public static function getAllActivos()
    {
        
        $rows = Db::getInstance()->executeS("SELECT * FROM `" . _DB_PREFIX_ . "soluwidget1` WHERE active=1 ORDER BY `orden` DESC;");
        return $rows;
        
    }

     public  function eliminarRegistro()
    {
        $data             = array();
        $data['success']  = false;
        $data['last_id']  = NULL;
        $data['fect_row'] = NULL;
        $data['tipo_sql'] = '';
         $data['msg'] = '';
        


             $sql = "DELETE FROM  `" . _DB_PREFIX_ . "soluwidget1`   WHERE `id` = " . (int) $this->id;
           
            
            Db::getInstance()->execute($sql);
            //-----fila afectadas
            if (Db::getInstance()->Affected_Rows() == 1) {
                $data['fect_row'] = 1;
                $data['success']  = true;
                $data['tipo_sql'] = 'update';
                 $data['msg'] = 'Se elimino registro';
            }
            return $data;
        
    }



  
    
}