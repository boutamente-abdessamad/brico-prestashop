<?php
class AdminPosslideshowsController extends ModuleAdminController
{
	public function __construct() {

     $token = Tools::getAdminTokenLite('AdminModules');
     $currentIndex='index.php?controller=AdminModules&token='.$token.'&configure=posslideshows&tab_module=front_office_features&module_name=posslideshows';

     parent::__construct();
     Tools::redirectAdmin($currentIndex);
  }
        
       
    

}
