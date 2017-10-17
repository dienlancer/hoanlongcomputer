<?php
    global $zController,$zendvn_sp_settings;
    $meta_key="_zendvn_sp_zaproduct_";
    $width=$zendvn_sp_settings["product_width"];
    $height=$zendvn_sp_settings["product_height"];
    $vHtml=new HtmlControl();
    $zController->getController("/frontend","ProductController");   
    $pageID = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');  
    $linkDetailCart = get_permalink($pageID);    
    if(have_posts())  {
        while (have_posts()) {
            the_post();
            $postID=$post->ID;
            $productName=get_the_title();
            $productCode=get_post_meta($postID,$meta_key."product_code",true);
            $productPrice=get_post_meta($postID,$meta_key."price",true);            
            $fileUrl = wp_get_attachment_url(get_post_thumbnail_id());
            $newFileName=$vHtml->getFileName($fileUrl);
            $newFileUrl=wp_upload_dir()["url"] . DS . $width . "x" . $height . "-" . $newFileName;            
            ?>
            <div class="row">
                <div class="col-md-4">
                                        <figure><a href="#"><img src="<?php echo $newFileUrl; ?>"></a></figure>
                </div>
                <div class="col-md-8">
                    <form name="frm" method="post" >
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td><?php echo $productCode; ?></td>
                            </tr>
                            <tr>
                                <td>Tên sản phẩm</td>
                                <td><?php echo $productName; ?></td>
                            </tr>                            
                            <tr>
                                <td>Giá</td>
                                <td><?php echo $vHtml->fnPrice($productPrice) ; ?></td>
                            </tr>                            
                            <tr>
                                <td><input type="submit"  value="Mua hàng" /></td>
                                <td><a href="<?php echo $linkDetailCart; ?>">Giỏ hàng</a></td>
                            </tr>
                        </table>
                        <input type="hidden" name="product_id" value="<?php echo $postID; ?>" />
                        <input type="hidden" name="product_code" value="<?php echo $productCode; ?>" />
                        <input type="hidden" name="product_name" value="<?php echo $productName; ?>" />
                        <input type="hidden" name="product_image" value="<?php echo $newFileName; ?>" />
                        <input type="hidden" name="product_price" value="<?php echo $productPrice; ?>" />
                        <input type="hidden" name="product_quantity" value="1" />  
                        <input type="hidden" name="action" value="add-cart" />                      
                        <?php wp_nonce_field("add-cart",'security_code',true);?>
                    </form>        
                </div>
            </div>
            <?php
        }
    }
?>

