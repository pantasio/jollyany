<div class="item">
    <a class="buddy_tooltip" href="<?php print $node_url; ?>" data-content="<?php if(isset($node->field_regency)) { print $node->field_regency['und'][0]['value']; } else { print $node->field_member_regency['und'][0]['value']; } ?>" rel="popover" data-placement="top" data-original-title="<?php if(isset($node->field_client)) { print $node->field_client['und'][0]['value']; } else { print $node->title; } ?>" data-trigger="hover">
		<?php if(isset($node->field_image['und'])) : ?>
			<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" class="img-responsive img-thumbnail" alt="">
		<?php else :?>
			<img src="<?php global $image_default; echo $image_default; ?>" alt="" class="img-responsive img-thumbnail">
		<?php endif; ?>
	</a>
</div><!-- end item -->   