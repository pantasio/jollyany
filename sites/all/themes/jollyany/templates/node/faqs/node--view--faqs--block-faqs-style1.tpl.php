<div class="panel-heading">
    <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $node->nid ?>">
            <?php echo $title; ?>
        </a>
    </h4>
</div><!-- end panel-heading -->
<div id="collapse<?php echo $node->nid ?>" class="panel-collapse collapse">
    <div class="panel-body">
			<?php
				// Hide comments, tags, and links now so that we can render them later.
				hide($content['links']);
				hide($content['comments']);
				print render($content);
			?>
    </div><!-- end panel-body -->
</div><!-- end collapseOne -->