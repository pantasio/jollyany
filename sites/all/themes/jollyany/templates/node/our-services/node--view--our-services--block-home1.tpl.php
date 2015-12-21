<div class="servicebox">
	<a href="<?php print $node_url; ?>">
		<div class="service-icon-circle">
			<i class="fa <?php print render($content['field_icon']); ?>"></i>
		</div><!-- end service icon -->
    </a>
	<div class="title">
    	<h3><?php echo $title; ?></h3>
    </div><!-- end title -->
    <?php print $node->body['und'][0]['summary']; ?>
</div><!-- end servicebox -->