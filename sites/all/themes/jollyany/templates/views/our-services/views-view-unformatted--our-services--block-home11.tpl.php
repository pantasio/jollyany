<div class="container">
    <div class="services_vertical">
		<?php $i=1; foreach ($rows as $id => $row): ?>
			<div class="col-lg-4 <?php if($i==1) { echo 'first'; } elseif($i==3) { echo 'last'; } ?>">
				<?php print $row; ?>                                
			</div>
		<?php $i++; endforeach; ?>
	</div>
</div>
