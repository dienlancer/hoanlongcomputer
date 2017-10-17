<form  method="post"  class="frm">
<?php 
    
    if(have_posts()){
            while (have_posts()) {
                the_post();
                echo '<h1 class="title-category">'.get_the_title().'</h1><hr>';
            }
    }
    global $zController,$zendvn_sp_settings;
    $width=$zendvn_sp_settings["product_width"];
    $height=$zendvn_sp_settings["product_height"];
    $vHtml=new HtmlControl();
    $zController->getController("/frontend","ProductController");
    $productModel=$zController->getModel("/frontend","ProductModel"); 
    $args=array("post_type" => "zaproduct");
    $wpQuery=new WP_Query($args);
    // begin phân trang
    $totalItemsPerPage=0;
    if(!empty($zendvn_sp_settings["product_number"]))
        $totalItemsPerPage=$zendvn_sp_settings["product_number"];
    $pageRange=10;
    $currentPage=1; 
        if(!empty(@$_POST["filter_page"]))          
            $currentPage=@$_POST["filter_page"];  
    $productModel->setWpQuery($wpQuery);   
    $productModel->setPerpage($totalItemsPerPage);    
    $productModel->prepare_items();    
    $totalItems= $productModel->getTotalItems();               
    $arrPagination=array(
                              "totalItems"=>$totalItems,
                              "totalItemsPerPage"=>$totalItemsPerPage,
                              "pageRange"=>$pageRange,
                              "currentPage"=>$currentPage   
                              );    
    $pagination=$zController->getPagination("Pagination",$arrPagination); 
    // end phân trang   
    if($wpQuery->have_posts()){        
        $i=1; 
        while ($wpQuery->have_posts()) {
            $wpQuery->the_post();
            $postID=$wpQuery->post->ID;               
            $productLink=get_the_permalink();
            $productName=get_the_title();
            $fileUrl = wp_get_attachment_url(get_post_thumbnail_id());
            $newFileName=$vHtml->getFileName($fileUrl);
            $newFileUrl=wp_upload_dir()["url"] . DS . $width . "x" . $height . "-" . $newFileName;
            $meta_key=_zendvn_sp_zaproduct_;
            $price =number_format(get_post_meta($postID,$meta_key."price",true),3,",",".") ;
            ?>
            <div class="col-sm-4">
                <div>
                    <figure><a href="<?php echo $productLink; ?>"><img src="<?php echo $newFileUrl; ?>"></a></figure>
                </div>                        
                <div class="item-row-title-category-article">
                    <div><a href="<?php echo $productLink; ?>" class="a_1"><?php echo $productName; ?></a></div>
                    <div><?php echo $price; ?></div>
                </div>                        
            </div>
            <?php            
            if($i%3==0)
                echo '<div class="clr"></div>';
            $i++;          
        }
        echo '<div class="clr"></div>';
        echo $pagination->showPagination();                
    }
    ?>
    <input type="hidden" name="filter_page" value="1" /> 
</form>