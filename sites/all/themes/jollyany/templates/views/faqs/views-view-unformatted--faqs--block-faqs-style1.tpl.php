<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="about_tabbed">
                <div class="panel-group" id="accordion2">
                    <?php $i=1; foreach ($rows as $id => $row): ?>
                    <div id="panel-<?php echo $i; ?>" class="panel panel-default">
                        <?php print $row; ?>  
						<?php if($i==1) : ?>
							<script>
								jQuery('#panel-<?php echo $i; ?> .panel-heading').addClass('active');
								jQuery('#panel-<?php echo $i; ?> .collapse').addClass('in');
							</script>
						<?php endif; ?>
                    </div>
                    <?php $i++; endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


    