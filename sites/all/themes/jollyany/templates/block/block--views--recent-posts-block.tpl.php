<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>" <?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
	<?php if($block->subject): ?>
		<div class="widget">
            <div class="title">
                <h3><?php print $block->subject ?></h3>
			</div>    
		</div>    
	<?php endif; ?> 
	<?php print render($title_suffix); ?>
   
	<?php print $content ?>
</div>
