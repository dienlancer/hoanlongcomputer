<?php 
switch ($instance["position"]) {
	case 'logo-footer-widget':
		echo '<a href="'.$instance["img_link"].'"><img src="'.wp_upload_dir()['url'].'/'.$instance['img_url'].'" /></a>';
		break;
}
?>
