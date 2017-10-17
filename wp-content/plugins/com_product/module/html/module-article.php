<?php 
switch ($instance["position"]) {
	case "news-widget":		
		if(!empty($instance['article_id'])){
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){
				$article_id=$arrArticleID[0];
				$args = array(
					'p'         => $article_id, 
					'post_type' => 'post'
					);
				$wpQuery = new WP_Query($args);			
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		        
						?>
						<div class="margin-bottom-15"><img src="<?php echo $featureImg; ?>" /></div>
						<div class="margin-bottom-5"><a href="<?php echo $permalink; ?>" class="a-1"><?php echo $title; ?></a></div>
						<div><?php echo substr($excerpt, 0,400)."..."  ; ?></div>
						<?php
					}
				}				
			}
		}
		break;	
	case "article-widget":
		if(!empty($instance['article_id'])){
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){	
				$args = array(
					'post__in' => $arrArticleID,
					'post_type' => 'post'
					);			 
				$wpQuery = new WP_Query($args);		
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<div class="row">
							<div class="col-md-4 vibar"><img src="<?php echo $featureImg; ?>" /></div>
							<div class="col-md-8 risat">
								<h3><a href="<?php echo  $permalink; ?>" class="link-title"><?php echo $title; ?></a></h3>                           
							</div>
						</div>
						<?php
					}
				}
			}
		}
		break;
	case "story-widget":
		if(!empty($instance['article_id'])){
			echo "<div class=\"moi-nguoi-mot-cau-chuyen\">";
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){	
				$args = array(
					'post__in' => $arrArticleID,
					'post_type' => 'post'
					);			 
				$wpQuery = new WP_Query($args);		
				if($wpQuery->have_posts()){
					$i=1;
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<div class="col-md-6"><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>" /></a></div>			
						<?php
						if($i%2==0)
							echo "<div class=\"clr\"></div>";
						$i++;
					}
				}
			}
			echo "</div>";
		}
		break;
	case "service-widget":
		if(!empty($instance['article_id'])){
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){
				$article_id=$arrArticleID[0];
				$args = array(
					'p'         => $article_id, 
					'post_type' => 'post'
					);
				$wpQuery = new WP_Query($args);			
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<div class="row juset">            
							<div class="col-md-5 ducati"><img src="<?php echo $featureImg; ?>"></div>
							<div class="col-md-7">
								<h4><a href="<?php echo $permalink; ?>" class="kiot"><?php echo $title; ?></a></h4>
								<div class="desc"><?php echo $excerpt; ?></div>
								<a class="suzuki" href="<?php echo $permalink; ?>">Xem thêm</a>
							</div>
						</div>
						<?php
					}
				}				
			}
		}
		break;
	case "technology-widget":
		if(!empty($instance['article_id'])){
			echo "<div class=\"rapid\" >";
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){	
				$args = array(
					'post__in' => $arrArticleID,
					'post_type' => 'post'
					);			 
				$wpQuery = new WP_Query($args);		
				if($wpQuery->have_posts()){
					$i=1;
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<div class="col-md-3">
							<figure><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>"></a></figure>
							<div class="sinbad"><a href="<?php echo $permalink; ?>"><?php echo mb_substr($title, 0,50)."..." ; ?></a></div>
						</div>		
						<?php
						if($i%4==0)
							echo "<div class=\"clr\"></div>";
						$i++;
					}
				}
			}
			echo "</div>";
		}
		break;
	case "bai-viet-tu-van-widget":
		if(!empty($instance['article_id'])){
			echo "<ul class=\"ramusmen\">";
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){	
				$args = array(
					'post__in' => $arrArticleID,
					'post_type' => 'post'
					);			 
				$wpQuery = new WP_Query($args);					 
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<li><i class="fa fa-angle-right"></i><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></li>
						<?php
					}
				}
			}
			echo "</ul>";
		}
		break;
	case "khuyen-mai-sidebar-widget":
		if(!empty($instance["article_id"])){
			echo "<ul class=\"vertical-menu\">";
			$arrArticleID=explode(",", $instance["article_id"]);
			if(count($arrArticleID) > 0){
				$args = array(
					'post__in' => $arrArticleID,
					'post_type' => 'post'
					);	
				$wpQuery=new WP_Query($args);
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<li><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></li>
						<?php
					}
				}
			}
			echo "</ul>";
		}
		break;
	case "video-widget":
	case "hinh-anh-widget":
	case "khuyen-mai-widget":
		if(!empty($instance['article_id'])){
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){
				$article_id=$arrArticleID[0];
				$args = array(
					'p'         => $article_id, 
					'post_type' => 'post'
					);
				$wpQuery = new WP_Query($args);			
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<figure><a href="<?php echo $permalink; ?>"><img src="<?php echo $featureImg; ?>"></a></figure>
						<div class="viber"><a href="<?php echo  $permalink; ?>">Xem thêm</a></div>
						<?php
					}
				}				
			}
		}
		break;
	case "hinh-anh-tu-van-widget":
		if(!empty($instance['article_id'])){
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){
				$article_id=$arrArticleID[0];
				$args = array(
					'p'         => $article_id, 
					'post_type' => 'post'
					);
				$wpQuery = new WP_Query($args);			
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();
			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		     
						?>
						<img src="<?php echo $featureImg; ?>">						
						<?php
					}
				}				
			}
		}
		break;	
	case "ha-noi-address-widget":
	case "ho-chi-minh-address-widget":		
		if(!empty($instance['article_id'])){
			$arrArticleID=explode(",",$instance["article_id"]);
			if(count($arrArticleID) > 0){
				$article_id=$arrArticleID[0];
				$args = array(
					'p'         => $article_id, 
					'post_type' => 'post'
					);
				$wpQuery = new WP_Query($args);			
				if($wpQuery->have_posts()){
					while ($wpQuery->have_posts()) {
						$wpQuery->the_post();			                           
			            $permalink=get_the_permalink();
			            $title=get_the_title();
			            $excerpt=get_the_excerpt();
			            $content=get_the_content();
			            $featureImg=wp_get_attachment_url(get_post_thumbnail_id());		        
						echo $content;
					}
				}				
			}
		}
		break;	
}
?>






