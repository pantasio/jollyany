<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div id="blog-masonry" class="blog-masonry">
		<?php $i=1; foreach ($rows as $id => $row): ?>
			<div class="col-lg-4 <?php if($i%3==1) { echo 'first'; } elseif($i%3==0) { echo 'last'; } ?>">
				<?php print $row; ?>
			</div>
		<?php $i++; endforeach; ?>
	</div>
	<div class="clearfix"></div>
	<hr>
</div>

