<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="row">
		<div class="blog-masonry">    
			<?php $i=1; foreach ($rows as $id => $row): ?>
				<div class="col-lg-12">
					<?php print $row; ?>
				</div>
			<?php $i++; endforeach; ?>
		</div>
		<div class="clearfix"></div>
		<hr>
	</div>
</div>

