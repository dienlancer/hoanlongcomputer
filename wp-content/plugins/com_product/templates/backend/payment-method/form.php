<?php 

	global $zController;	
	$msg = '';
	if(count($zController->_error)>0){
		$msg .= '<div class="error"><ul>';		
		foreach ($zController->_error as $key => $val){
			$msg .= '<li>' . $val . '</li>';
		}
		$msg .= '</ul></div>';
	}		
	$vHtml = new HtmlControl();	
	$page 	= $zController->getParams('page');		
	$action = ($zController->getParams('action') != '')? $zController->getParams('action'):'add';		
	$lbl 	= 'Payment method';				
	$title 	='<input type="text" id="title" name="title" class="regular-text" value="'.sanitize_text_field(@$zController->_data['title']).'" />';	
	$alias 	='<input type="text" id="alias" name="alias" class="regular-text" value="'.sanitize_text_field(@$zController->_data['alias']).'" />';
	$content 	='<textarea id="content" name="content" rows="5" cols="100" >'.@$zController->_data['content'].'</textarea>';
	$arrData 	=array('Inactive','Active');	
	$status=$vHtml->cmsSelectbox("status","status","",$arrData,absint(@$zController->_data['status']));	
	$id='';
	if(count($zController->_data) > 0){
		if(!empty($zController->_data['id'])){
			$id=(int)$zController->_data['id'];
		}
	}
	$inputID                =   '<input type="hidden" name="id" id="id" value="'.@$id.'" />'; 
	$action					=	'<input name="action" value="'.$action.'" type="hidden">				';
?>
<div class="wrap">
	<h1><?php echo $lbl;?></h1>
	<?php echo $msg;?>
	<form method="post" action="" id="<?php echo $page;?>"
		enctype="multipart/form-data">
		<?php echo $inputID; ?>
		<?php echo $action; ?>						
		<?php wp_nonce_field($action,'security_code',true);?>				
		<table class="content-form">
				<tr>
					<td scope="row"><b><i><label>Title</label></i></b></td>
					<td><?php echo $title;?></td>
				</tr>	
				<tr>
					<td scope="row"><b><i><label>Alias</label></i></b></td>
					<td><?php echo $alias;?></td>
				</tr>					
				<tr>
					<td scope="row" valign="top"><b><i><label>Content</label></i></b></td>
					<td><?php echo $content;?></td>
				</tr>			
				<tr>
					<td scope="row"><b><i><label>Status</label></i></b></td>
					<td><?php echo $status;?></td>
				</tr>							
		</table>		
		<p class="submit">
			<input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit">
		</p>
	</form>	
</div>
<script type="text/javascript" language="javascript">

        CKEDITOR.replace('content',{

            height:250

        });

    </script>      