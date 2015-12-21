<div class="container">
    <div class="services_vertical">
		<?php $i=1; foreach ($rows as $id => $row): ?>
			<div class="col-lg-4 <?php if($i%3==1) { echo 'first'; } elseif($i%3==0) { echo 'last'; } ?>">
				<?php print $row; ?>                                
			</div>
		<?php $i++; endforeach; ?>
		<div class="clearfix"></div>
	</div>
</div>
<div class="clearfix"></div>
