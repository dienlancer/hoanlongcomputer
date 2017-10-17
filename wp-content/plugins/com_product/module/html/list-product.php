<?php global $zController; 
$html = new ZendvnHtml();
?>
                    <div class="title-product-show-all">
                        <div class="title-product"><?php echo $instance['title'];?></div>
                        <div class="show-all"><a href="#" >Show All</a></div>                        
                        <div class="clr"></div>
                    </div>                                           
                    <div class="products-wrapper">
                        <?php 
                            $comboproduct=$instance['comboproduct'];                            
                            $productModel=$zController->getModel("ProductModel");                                                   
                            switch ($comboproduct) {
                                case 0:                                    
                                    $products =$productModel->getLstNewProducts();
                                    break;
                                case 1:
                                    $products =$productModel->getLstBestSeller();
                                    break;                                
                            }                            
                            foreach ($products as $key => $value) {    
                            $id=$value["id"];
                            $product_slug=$value["product_slug"];      
                            $product_image=    WIDTH . 'x' . HEIGHT . '-' . $value["product_image"];
                            $product_name=$value["product_name"];   
                            $link_detail= site_url()."/product/index.php?action=detail&id=".$id."&slug=".$product_slug;
                            $product_price = $html->fnPrice($value["product_price"]);              
                            $lnk=site_url()."/product/index.php?action=detail&id=".$value["id"]."&slug=".$value["product_slug"];                              
                                ?>
                                <div class="box">
                                    <div class="mask">
                                        <div class="btn-position">
                                       <a class="addtocart-button btn_quick_view" href="<?php echo $lnk; ?>" ><span>QUICK VIEW</span>
</a>
                                        </div>
                                        <div class="image"><a href="<?php echo $link_detail; ?>"><img src="<?php echo PRODUCT_IMAGE_URL . DS . $product_image; ?>"   /></a></div>
                                    </div>                                    
                                    <div class="image-footer"><a href="<?php echo $link_detail; ?>"><?php echo $product_name; ?></a></div>
                                    <div class="price"><?php echo $product_price; ?></div>
                                </div>
                                <?php
                            }                            
                        ?>                  
                    </div>                  
                                                             