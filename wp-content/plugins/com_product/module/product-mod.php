<?php
class ProductMod extends WP_Widget {
	public function __construct() {
		$id_base = 'product-mod';
		$name	= 'Product';
		$widget_options = array(
					'classname' => 'product-mod-widget',
					'description' => 'Show products'
				);
		$control_options = array('width'=>'350px');
		parent::__construct($id_base, $name,$widget_options, $control_options);	
	}	
	public function widget( $args, $instance ) {			
		extract($args);			
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title))? '': $title;
		$css = (empty($instance['css']))? '':$instance['css'];
		$title_status = (empty($instance['title_status']))? '':$instance['title_status'];
		$classname = $this->widget_options['classname'];
		$before_widget = str_replace($classname, $classname . ' ' . $css, $before_widget);
		echo $before_widget;
		if($title_status == "active" || empty($title_status)){
			if(!empty($title)){
				echo $before_title . $title . $after_title;
			}		
		}		
		require ZENDVN_SP_MODULE_PATH . '/html/list-product.php';		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {	
		$instance = $old_instance;		
		$instance['title'] 		= strip_tags($new_instance['title']);		
		$instance['comboproduct'] 		= strip_tags($new_instance['comboproduct']);	
		$instance['title_status'] 		= strip_tags($new_instance['title_status']);	
		$content = "";
		if($new_instance['striphtml_status'] == "active" || empty($new_instance['striphtml_status']))
			$content = strip_tags($new_instance['content']);
		else
			$content = $new_instance['content'];		
		$instance['content'] 	= $content;						
		$instance['striphtml_status'] 	= strip_tags($new_instance['striphtml_status']);		
		$instance['css'] 	= strip_tags($new_instance['css']);		
		return $instance;
	}
	
	public function form( $instance ) {	
		$htmlObj = new ZendvnHtml();
				
		//Tao phan tu chua Title
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = @$instance['title'];
		$attr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Title',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$attr,null);
		echo $htmlObj->pTag($html);

		// Hiển thị title
		$inputID 	= $this->get_field_id('title_status');
		$inputName 	= $this->get_field_name('title_status');
		$inputValue="";
		if(!empty(@$instance['title_status'])){
			$inputValue = @$instance['title_status'];
		}		
		$attr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Title status',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$attr,null);
		echo $htmlObj->pTag($html);	

		//Tao phan tu chua Combobox
		$inputID 	= $this->get_field_id('comboproduct');
		$inputName 	= $this->get_field_name('comboproduct');
		$inputValue = @$instance['comboproduct'];
		$attr 		= array('class' =>'widefat','id' => $inputID);
		$options['data'] 			=array('new','best-seller');
		$html		= $htmlObj->label('comboproduct',array('for'=>$inputID))					  
					  . $htmlObj->selectbox($inputName,$inputValue,$attr,$options);	
					  ;
		echo $htmlObj->pTag($html);	

		//Tao phan tu chua Content
		$inputID 	= $this->get_field_id('content');
		$inputName 	= $this->get_field_name('content');
		$inputValue = @$instance['content'];
		$attr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Content',array('for'=>$inputID))
					  . $htmlObj->textarea($inputName,$inputValue,$attr,null);
		echo $htmlObj->pTag($html);

		// striphtml_status
		$inputID 	= $this->get_field_id('striphtml_status');
		$inputName 	= $this->get_field_name('striphtml_status');
		$inputValue="";
		if(!empty(@$instance['striphtml_status'])){
			$inputValue = @$instance['striphtml_status'];
		}		
		$attr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('StripHtml status',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$attr,null);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua cssclass
		$inputID 	= $this->get_field_id('css');
		$inputName 	= $this->get_field_name('css');
		$inputValue = @$instance['css'];
		$attr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('CssClass',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$attr,null);
		echo $htmlObj->pTag($html);			
	}
}

