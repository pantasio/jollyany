<div class="carousel_wrapper">
	<div class="margin-top">
        <div id="owl_shop_carousel" class="owl-carousel">
			<?php $i=1; foreach ($rows as $id => $row): ?>
				<div class="shop_carousel">
					<?php print $row; ?>
				</div>
			<?php $i++; endforeach; ?>
		</div>
	</div>
	<script>jQuery('.node-add-to-cart').addClass('st btn btn-default');</script>
</div>