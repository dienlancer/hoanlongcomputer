<?php 
//echo "<pre>".print_r($instance,true)."</pre>";
switch ($instance["position"]) {
	case 'hotline-widget':
		$vHtml='
<div><a rel="nofollow" href="'.$instance["facebook_url"].'" class="icon-entry"><i class="fa fa-facebook"></i></a>
<a rel="nofollow" href="'.$instance['youtube_url'].'" class="icon-entry"><i class="fa fa-youtube"></i></a>
<a rel="nofollow" href="'.$instance['google_url'].'" class="icon-entry"><i class="fa fa-google-plus"></i></a></div>
		';		
		echo $vHtml;
		break;
}
?>
