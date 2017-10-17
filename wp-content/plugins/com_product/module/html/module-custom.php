<?php 
switch ($instance["position"]) {
	case 'register-widget':
		?>
		<form name="frm" method="post" action="" class="dang-ky-tu-van">
                <div><input type="text" name="txtFullName" id="txtFullName" class="form-control" placeholder="Họ tên" /></div>
                <div><input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="Số điện thoại" /></div>
                <div><textarea cols="50" placeholder="Dịch vụ quan tâm" class="form-control" rows="3" name="txtContent" id="txtContent"></textarea></div>
                <div class="send">
                    <input type="submit" onclick="return checkRegister();" value="Gửi" />        
                    <input type="hidden" name="action" value="contact" />                    
                    <?php wp_nonce_field("contact",'security_code',true);?>          
                </div>                                                     
            </form>
		<?php
		break;
	case 'title-footer-widget':
		echo $instance["content"];
		break;
}
?>
