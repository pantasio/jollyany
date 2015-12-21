<div class="accordion-heading">
    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $node->nid ?>">
        <em class="fa icon-fixed-width"></em><?php echo $title; ?>
    </a>
</div>
<div id="collapse<?php echo $node->nid ?>" class="accordion-body collapse">
    <div class="accordion-inner">
			<?php
				// Hide comments, tags, and links now so that we can render them later.
				hide($content['links']);
				hide($content['comments']);
				print render($content);
			?>
    </div>
</div>