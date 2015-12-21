<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div id="accordion-second" class="clearfix">
                <div class="accordion" id="accordion2">
                    <?php $i=1; foreach ($rows as $id => $row): ?>
                    <div id="panel-<?php echo $i; ?>" class="accordion-group">
                        <?php print $row; ?>
						<?php if($i==1) : ?>
							<script>
								jQuery('#panel-<?php echo $i; ?> .panel-heading').addClass('active');
								jQuery('#panel-<?php echo $i; ?> .collapse').addClass('in');
								jQuery('#panel-<?php echo $i; ?> .icon-fixed-width').addClass('fa-minus');
							</script>
						<?php else: ?>
							<script>
								jQuery('#panel-<?php echo $i; ?> .icon-fixed-width').addClass('fa-plus');
							</script>
						<?php endif; ?>
                    </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>