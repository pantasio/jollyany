<?php
	/**
	 * @file
	 * jollyany's theme implementation to display a single Portfolio node.
	 */
	global $base_url;
	global $theme_root;
	global $image_default;
	
	// Grabs the firsts image path and sets $imagePath.
	$imagePath = $image_default;
	if(isset($node->uc_product_image['und'])) {
		$imagePath = file_create_url($node->uc_product_image['und'][0]['uri']); 
	}
	$termid = arg(2);
?>
<?php if (!$page) : ?>
	<?php if( !empty($termid) ) : ?>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
	<?php endif; ?>
		<div class="shop_item">
			<?php print render($title_prefix); ?>
			<div class="entry">
				<img src="<?php print $imagePath; ?>" alt="" class="img-responsive">
				<div class="magnifier">
					<div class="buttons">
						<?php print render($content['add_to_cart']); ?>
					</div><!-- end buttons -->
				</div><!-- end magnifier -->
			</div><!-- end entry -->
			<div class="shop_desc">
				<div class="shop_title pull-left">
					<a href="<?php echo $node_url; ?>"><span><?php print $title ?></span></a>
					<span class="cats"><?php print jollyany_format_comma_field('taxonomy_catalog', $node); ?></span>
				</div>
				<span class="price pull-right">
					<?php print uc_currency_format($node->sell_price); ?>
				</span>
			</div><!-- end shop_desc -->
			<?php print render($title_suffix); ?>
		</div><!-- end item -->
		<div class="clearfix"></div>
	<?php if( !empty($termid) ) : ?>
		</div>
	<?php endif; ?>
	
<?php elseif ($page) : ?>
	<script src="<?php echo $theme_root; ?>/js/jquery.prettyPhoto.js"></script>
	<?php if(isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Sidebar') :?>
		<div class="shop_wrapper col-lg-9 col-md-9 col-sm-12 col-xs-12">
	<?php else: ?>
		<div class="shop_wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<?php endif; ?>
    <div class="general_row">
        <div class="shop-left shop_item col-lg-6">
        	<div class="entry">
            	<img src="<?php print $imagePath; ?>" alt="" class="img-responsive">
				<div class="magnifier">
					<div class="buttons">
						<a href="<?php print $imagePath; ?>" class="sf" title="" data-gal="prettyPhoto[product-gallery]"><span class="fa fa-search"></span></a>
					</div>
				</div><!-- end magnifier -->
            </div><!-- entry -->
            
			<?php if(isset($node->uc_product_image['und']) && count($node->uc_product_image['und']) > 1) : ?>
				<div class="thumbnails clearfix">
					<?php $i=1; foreach($node->uc_product_image['und'] as $key=>$product_images) :?>
					<?php if($key==0) { continue; } ?>
					<div class="entry <?php if($i==1) { echo 'first'; } elseif($i == count($node->uc_product_image['und']) -1) { echo 'last'; } ?>">
						<img class="img-responsive" src="<?php print file_create_url($product_images['uri']); ?>" alt="" />
						<div class="magnifier">
							<div class="buttons">
								<a href="<?php print file_create_url($product_images['uri']); ?>" class="sf" title="" data-gal="prettyPhoto[product-gallery]"><span class="fa fa-search"></span></a>
							</div><!-- end buttons -->
						</div><!-- end magnifier -->
					</div>
					<?php $i++; endforeach; ?>  
				</div> 
			<?php endif; ?>  
        </div><!-- end shop-left -->
        
        <div class="shop-right col-lg-6">
        
        	<div class="title">
            	<h2><?php print $title ?></h2>
                
				<?php if($node->list_price != $node->sell_price) :?>
					<span class="price list-price" style="text-decoration: line-through; padding-right: 10px; font-weight: bold;">
						<?php print uc_currency_format($node->list_price); ?>
					</span>
				<?php endif; ?>
				<span class="price">
					<?php print uc_currency_format($node->sell_price); ?>
				</span>          
            </div><!-- end title -->
            
            <div class="shop_desc">
            <?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; }  ?>
            </div><!-- end shop_desc -->
            
            <div class="shop_item_details">
            	<div class="title">
                	<h2>Product Details</h2>
            	</div><!-- end title -->
                <ul>
                	<li><strong>Size:</strong> <?php print jollyany_format_comma_field('field_size', $node); ?></li>
                	<li><strong>Category:</strong> <?php print jollyany_format_comma_field('taxonomy_catalog', $node); ?></li>
                	<li><strong>Tags:</strong> <?php print jollyany_format_comma_field('field_product_tags', $node); ?></li>
                	<li><strong>Brands:</strong> <?php print jollyany_format_comma_field('field_brands', $node); ?></li>
                </ul>
            </div><!-- end shop_item_details -->
            
            <div class="shop_meta">
                
                <div class="pull-left">
                	<div class="btn-shop">
                        <?php print render($content['add_to_cart']); ?>
						<div class="cart-icon"><a href="shop-cart.html"><span><i class="fa fa-shopping-cart"></i></span></a></div>
                    </div>
                </div><!-- end pull-right -->
			</div><!-- end shop meta -->
            
        </div><!-- end shop-right -->
		<script>jQuery('input.node-add-to-cart').addClass('btn woo_btn btn-primary');</script>
    </div><!-- end row -->
    
    <div class="clearfix"></div>
    
    <div class="general_row">
        <div id="shop_features" class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active dm-icon-effect-1"><a href="#tab1" data-toggle="tab">DESCRIPTION</a></li>
                <li class="dm-icon-effect-1"><a href="#tab2" data-toggle="tab">Additional Information</a></li>
                <li class="dm-icon-effect-1"><a href="#tab3" data-toggle="tab">REVIEWS(<?php print $comment_count; ?>)</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="about_section">
                            <div class="entry padding-top">
                                <a href="<?php print $imagePath; ?>" title="" rel="prettyPhoto[product-gallery]"><img class="img-top img-responsive" src="<?php print $imagePath; ?>" alt="" /></a>
                            </div><!-- end entry -->
                        </div><!-- end about_section -->
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="title"><h3><?php print $title ?></h3></div>
                        <?php
							// Hide comments, tags, and links now so that we can render them later.
							hide($content['field_additional_information']);
							hide($content['uc_product_image']);
							hide($content['taxonomy_catalog']);
							hide($content['field_size']);
							hide($content['field_brands']);
							hide($content['field_product_tags']);
							hide($content['field_layout']);
							hide($content['links']);
							hide($content['comments']);
							print render($content);
						?>
                    </div>
                </div>
                <div class="tab-pane" id="tab2">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="about_section">
                            <div class="entry padding-top">
                                <a href="<?php print $imagePath; ?>" title="" rel="prettyPhoto[product-gallery]"><img class="img-top img-responsive" src="<?php print $imagePath; ?>" alt="" /></a>
                            </div><!-- end entry -->
                        </div><!-- end about_section -->
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <?php if(isset($node->field_additional_information['und'])) { print $node->field_additional_information['und'][0]['value']; }  ?>
                    </div>
                </div>
                <div class="tab-pane" id="tab3">
					<div id="comments" class="padding-top">
						<?php if ($comment == COMMENT_NODE_OPEN) : ?>
							<?php print render($content['comments']); ?>
						<?php endif; ?>
					</div><!-- end comments -->  
                </div>
            </div><!-- end tab-content -->
        </div><!-- end tabbable -->
    </div><!-- end general_row -->
	<script>
		//pretty photo
		jQuery('a[data-gal]').each(function() {
			jQuery(this).attr('rel', jQuery(this).data('gal'));
		});  	
		jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});
	</script>
	</div>
	<?php if(isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Sidebar') :?>
		<div id="sidebar" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <?php 
				$sidebar_right = block_get_blocks_by_region('sidebar_right'); 
				print render($sidebar_right); 
			?>
        </div><!-- end left-sidebar -->
	<?php endif; ?>
<?php endif; ?>


