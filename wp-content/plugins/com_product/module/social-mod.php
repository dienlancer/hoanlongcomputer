<?php
class SocialMod extends WP_Widget {
	public function __construct() {
		$id_base = 'social-widget';
		$name	= 'Social widget';
		$widget_options = array(
					'classname' => 'social-widget',
					'description' => 'Hiển thị Social '
				);
		$control_options = array('width'=>'350px');
		parent::__construct($id_base, $name,$widget_options, $control_options);	

	}	
	public function widget( $args, $instance ) {
	
		extract($args);
	
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title))? '': $title;
		$title_status = (empty($instance['title_status']))? '':$instance['title_status'];
		$css = (empty($instance['css']))? '':$instance['css'];
		$classname = $this->widget_options['classname'];
		$before_widget = str_replace($classname, $classname . ' ' . $css, $before_widget);
		echo $before_widget;		
		if($title_status == "active" || empty($title_status)){
			if(!empty($title)){
				echo $before_title . $title . $after_title;
			}		
		}		
		require ZENDVN_SP_MODULE_PATH . '/html/social.php';		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
	
		$instance = $old_instance;
	
		$instance['title'] 		= strip_tags($new_instance['title']);
		$instance['title_status'] 		= strip_tags($new_instance['title_status']);	
		$instance['content'] 	= strip_tags($new_instance['content']);
		$instance['facebook'] 	= strip_tags($new_instance['facebook']);
		$instance['twitter'] 	= strip_tags($new_instance['twitter']);		
		$instance['google_plus']= strip_tags($new_instance['google_plus']);
		$instance['linkedin'] 	= strip_tags($new_instance['linkedin']);
		$instance['flickr'] 	= strip_tags($new_instance['flickr']);
		$instance['css'] 	= strip_tags($new_instance['css']);		
		return $instance;
	}
	
	public function form( $instance ) {
		$htmlObj = new ZendvnHtml();
			
		//Tao phan tu chua Title
		$inputID 	= $this->get_field_id('title');
		$inputName 	= $this->get_field_name('title');
		$inputValue = @$instance['title'];
		$arr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Title',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$arr);
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
		
		//Tao phan tu chua Content
		$inputID 	= $this->get_field_id('content');
		$inputName 	= $this->get_field_name('content');
		$inputValue = @$instance['content'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Content',array('for'=>$inputID))
					  . $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);
		
		
		//Tao phan tu chua facebook
		$inputID 	= $this->get_field_id('facebook');
		$inputName 	= $this->get_field_name('facebook');
		$inputValue = @$instance['facebook'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Facebook link',array('for'=>$inputID))
		. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua twitter
		$inputID 	= $this->get_field_id('twitter');
		$inputName 	= $this->get_field_name('twitter');
		$inputValue = @$instance['twitter'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Twitter link',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);
					
		//Tao phan tu chua google-plus
		$inputID 	= $this->get_field_id('google_plus');
		$inputName 	= $this->get_field_name('google_plus');
		$inputValue = @$instance['google_plus'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Google plus link',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);
		
		//Tao phan tu chua linkedin
		$inputID 	= $this->get_field_id('linkedin');
		$inputName 	= $this->get_field_name('linkedin');
		$inputValue = @$instance['linkedin'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('linkedin link',array('for'=>$inputID))
		. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua flickr
		$inputID 	= $this->get_field_id('flickr');
		$inputName 	= $this->get_field_name('flickr');
		$inputValue = @$instance['flickr'];
		$arr 		= array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('Flickr',array('for'=>$inputID))
		. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);

		//Tao phan tu chua cssclass
		$inputID 	= $this->get_field_id('css');
		$inputName 	= $this->get_field_name('css');
		$inputValue = @$instance['css'];
		$arr = array('class' =>'widefat','id' => $inputID);
		$html		= $htmlObj->label('CssClass',array('for'=>$inputID))
					. $htmlObj->textbox($inputName,$inputValue,$arr);
		echo $htmlObj->pTag($html);
	}
	

}
