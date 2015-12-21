<div class="container">
	<div class="text-center clearfix">
        <nav class="portfolio-filter">
            <ul>
				<li><a class="btn btn-primary" href="#" data-filter="*"><span></span><?php print t('All'); ?></a></li>
				<?php $i=1; foreach ($rows as $id => $row): ?>
					<?php print $row; ?>
				<?php $i++; endforeach; ?>
			</ul>                    
		</nav> 
	</div> 
</div> 
