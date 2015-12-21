<div class="service_vertical_box">
    <a href="<?php print $node_url; ?>">
		<div class="icon-container">
			<i class="fa <?php print render($content['field_icon']); ?>"></i>
		</div>
	</a>
    <h3><?php echo $title; ?></h3>
    <?php print $node->body['und'][0]['summary']; ?>
</div><!-- end service_vertical_box -->