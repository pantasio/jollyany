<div class="service_vertical_box">
    <a href="<?php print $node_url; ?>">
		<div class="service-icon">
			<i class="fa <?php print render($content['field_icon']); ?> fa-4x"></i>
		</div>
	</a>
    <h3><?php echo $title; ?></h3>
    <?php print $node->body['und'][0]['summary']; ?>
    <a href="<?php echo $node_url; ?>" class="readmore"><?php print t('Read More...'); ?></a>
</div>