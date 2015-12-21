<?php print render($title_prefix); ?>
<div class="timeline-badge danger"><i class="fa fa-pencil"></i></div>
<div class="timeline-panel">
    <div class="blog-carousel">
        <div class="entry">
			<?php if(isset($node->field_image['und'])) : ?>
				<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
			<?php else :?>
				<img src="<?php global $image_default; echo $image_default; ?>" alt="" class="img-responsive">
			<?php endif; ?>
            <div class="magnifier">
                <div class="buttons">
                    <a class="st" rel="bookmark" href="<?php print $node_url; ?>"><i class="fa fa-link"></i></a>
                </div><!-- end buttons -->
            </div><!-- end magnifier -->
            <div class="post-type">
                <i class="fa fa-picture-o"></i>
            </div><!-- end pull-right -->
        </div><!-- end entry -->
        <div class="blog-carousel-header">
            <h3><a title="<?php print $title; ?>" href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
            <div class="blog-carousel-meta">
                <span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
                <span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php
                        if ($comment_count > 0 && $comment_count != "1") {
                            echo "s";
                        }
                        ?></a></span>
                <span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
            </div><!-- end blog-carousel-meta -->
        </div><!-- end blog-carousel-header -->
        <div class="blog-carousel-desc">
            <?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; } ?>
        </div><!-- end blog-carousel-desc -->
    </div>
</div>
<?php print render($title_suffix); ?>