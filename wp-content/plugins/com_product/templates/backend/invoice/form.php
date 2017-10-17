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
	$lbl 	= 'Invoice';			
	$code 	= 	@$zController->_data['code'];
	$date 	= 	@$zController->_data['created_date'];
	$username 	= 	@$zController->_data['username'];
	$email 	= $vHtml->cmsTextbox('email','email',"regular-text",sanitize_text_field(@$zController->_data['email']))	;
	$fullname 	=$vHtml->cmsTextbox('fullname','fullname',"regular-text",sanitize_text_field(@$zController->_data['fullname']));
	$address 	=$vHtml->cmsTextbox('address','address',"regular-text",sanitize_text_field(@$zController->_data['address']));
	$phone 	=$vHtml->cmsTextbox('phone','phone',"regular-text",sanitize_text_field(@$zController->_data['phone']));
	$mobilephone 	=$vHtml->cmsTextbox('mobilephone','mobilephone',"regular-text",sanitize_text_field(@$zController->_data['mobilephone']));
	$fax 	=$vHtml->cmsTextbox('fax','fax',"regular-text",sanitize_text_field(@$zController->_data['fax']));
	$payment_method_title=@$zController->_data["payment_method_title"];
	$quantity 	= number_format(@$zController->_data['quantity'],0,",",".")	;
	$total_price 	=$vHtml->fnPrice(@$zController->_data['total_price']) 	;
	$arrData 	=array('Inactive','Active');	
	$status=$vHtml->cmsSelectbox("status","status","",$arrData,absint(@$zController->_data['status']));
	// lấy danh sách chi tiết đơn hàng
	$invoiceDetailModel=$zController->getModel("/backend","AdminInvoiceModel");
	$arrInvoiceDetail=$invoiceDetailModel->getInvoiceDetail();		
?>
<div class="wrap">
	<h1><?php echo $lbl;?></h1>
	<?php echo $msg;?>
	<form method="post" action="" id="<?php echo $page;?>"
		enctype="multipart/form-data">
		<input name="action" value="<?php echo $action;?>" type="hidden">				
		<?php wp_nonce_field($action,'security_code',true);?>				
		<table class="content-form">
				<tr>
					<td scope="row" align="right">
						<label><i><b>Code :</b></i></label>
					</td>
					<td><?php echo $code;?></td>
				</tr>	
				<tr>
					<td scope="row" align="right">
						<label><i><b>Created date :</b></i></label>
					</td>
					<td><?php echo $date;?></td>
				</tr>	
				<tr>
					<td scope="row" align="right">
						<label><i><b>Username :</b></i></label>
					</td>
					<td><?php echo $username;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Email :</b></i></label>
					</td>
					<td><?php echo $email;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i></i><b>Fullname :</b></label>
					</td>
					<td><?php echo $fullname;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Address :</b></i></label>
					</td>
					<td><?php echo $address;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Phone :</b></i></label>
					</td>
					<td><?php echo $phone;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Mobilephone :</b></i></label>
					</td>
					<td><?php echo $mobilephone;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Fax :</b></i></label>
					</td>
					<td><?php echo $fax;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Payment method :</b></i></label>
					</td>
					<td><?php echo $payment_method_title;?></td>
				</tr>
				<tr>
					<td scope="row" align="right">
						<label><i><b>Quantity :</b></i></label>
					</td>
					<td><?php echo $quantity;?></td>
				</tr>	
				<tr>
					<td scope="row" align="right">
						<label><i><b>Total price :</b></i></label>
					</td>
					<td><?php echo $total_price;?></td>
				</tr>											
				<tr>
					<td scope="row" align="right">
						<label><i><b>Status :</b></i></label>
					</td>
					<td><?php echo $status;?></td>
				</tr>							
		</table>		
		<p class="submit">
			<input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit">
		</p>
	</form>
	<div>
		<table width="100%" id="com_product16" class="com_product16">
			<thead>
				<tr>
					<th>Code</th>
					<th>Name</th>
					<th>Image</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total price</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach ($arrInvoiceDetail as $key => $value) {
				$product_code=$value["product_code"];
				$product_name=$value["product_name"];
				$product_image=$value["product_image"];
				$newFileUrl=wp_upload_dir()["url"] . DS . WIDTH . "x" . HEIGHT . "-" . $product_image; 
				$product_price=$vHtml->fnPrice(@$value["product_price"]) ;
				$product_quantity=number_format($value["product_quantity"],0,",",".") ;
				$product_total_price=$vHtml->fnPrice(@$value["product_total_price"]);
			 	?>
			 	<tr>
					<td><?php echo $product_code; ?></td>
					<td><?php echo $product_name; ?></td>
					<td align="center"><img  src="<?php echo $newFileUrl; ?>" width="84" height="112" /></td>
					<td align="right"><?php echo $product_price; ?></td>
					<td align="right"><?php echo $product_quantity; ?></td>
					<td align="right"><?php echo $product_total_price; ?></td>
				</tr>
			 	<?php
			 } 
			?>				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="center"><b>Tổng cộng</b></td>
					<td align="right"><?php echo $quantity; ?></td>
					<td align="right"><?php echo $total_price; ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
