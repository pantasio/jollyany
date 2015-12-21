<div class="portfolio-carousel">
    <div class="entry">
        <?php if(isset($node->field_image['und'])) : ?>
			<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
		<?php else :?>
			<img src="<?php global $image_default; echo $image_default; ?>" alt="" class="img-responsive">
		<?php endif; ?>
        <div class="magnifier">
            <div class="buttons">
                <a class="st" rel="bookmark" href="<?php print $node_url; ?>"><i class="fa fa-eye"></i></a>
            </div><!-- end buttons -->
        </div><!-- end magnifier -->
    </div><!-- end entry -->
    <div class="blog-carousel-header">
        <h3><a title="" href="<?php print $node_url; ?>"><?php echo $title; ?></a></h3>
    </div><!-- end blog-carousel-header -->
    <div class="blog-carousel-desc">
        <?php print $node->body['und'][0]['summary']; ?>
    </div><!-- end blog-carousel-desc -->
</div><!-- end blog-carousel -->