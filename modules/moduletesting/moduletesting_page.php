<?php
global $smarty;
include('../../config/config.inc.php');
include('../../header.php');
 
$smarty->display(dirname(__FILE__) . '/moduletesting_page.tpl');
     
include('../../footer.php');
?>