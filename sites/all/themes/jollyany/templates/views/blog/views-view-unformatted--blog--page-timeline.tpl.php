
<?php if (!empty($title)) : ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<div id="content" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="text-center clearfix">
		<span class="blog_button">Latest News</span>
    </div>
    <ul class="timeline">
		<?php $i=1; foreach ($rows as $id => $row): ?>
			<li class="wow <?php if($i%2==1) { echo 'fadeInLeft'; } else { echo 'timeline-inverted fadeInRight'; } ?>">
				<?php print $row; ?>
			</li>
		<?php $i++; endforeach; ?>
	</ul>
	<div class="clearfix"></div>
	<hr>
</div>
