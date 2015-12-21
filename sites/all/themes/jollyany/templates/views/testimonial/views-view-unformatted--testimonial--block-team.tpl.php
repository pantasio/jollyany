<div class="container">	
	<div class="padding-top text-center">
		<?php $i=1; foreach ($rows as $id => $row): ?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="team_member testimonial_widget <?php if($i==1) { echo 'first'; } elseif($i==count($rows)) { echo 'last'; } ?>">
					<?php print $row; ?> 
				</div>
			</div>
		<?php $i++; endforeach; ?>
    </div>
</div>