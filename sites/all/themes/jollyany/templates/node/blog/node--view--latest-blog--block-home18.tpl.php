<div class="recent_post_img">
    <a href="<?php print $node_url; ?>">
		<?php if(isset($node->field_image['und'])) : ?>
			<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="">
		<?php else :?>
			<img src="<?php global $image_default; echo $image_default; ?>" alt="">
		<?php endif; ?>
	</a>
</div>
<a href="<?php print $node_url; ?>"><h4><?php print $title; ?></h4></a>
<div class="meta">
    <span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
    <span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php if ($comment_count > 0 && $comment_count != "1") { echo "s"; } ?></a></span>
    <span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
</div>