<?php
class Module{	
	private $_module_options = array();	
	public function __construct(){		
		$this->_module_options = array(									
					"loadModuleCustom" 		=> true,		
					"loadModuleArticle" 	=> true,		
					"loadModuleImage" 	=> true,	
					"loadModuleHotline" 	=> true,				
				);
		foreach ($this->_module_options as $key => $val){	
			if($val == true){
				add_action('widgets_init',array($this,$key));
			}
		}
	}		
	public function loadModuleCustom(){
		require_once plugin_dir_path(__FILE__) . '/module/module-custom.php';		
		register_widget('ModuleCustom');
	}
	public function loadModuleArticle(){
		require_once plugin_dir_path(__FILE__) . '/module/module-article.php';		
		register_widget('ModuleArticle');
	}
	public function loadModuleImage(){
		require_once plugin_dir_path(__FILE__) . '/module/module-image.php';		
		register_widget('ModuleImage');
	}
	public function loadModuleHotline(){
		require_once plugin_dir_path(__FILE__) . '/module/module-hotline.php';		
		register_widget('ModuleHotline');
	}
}