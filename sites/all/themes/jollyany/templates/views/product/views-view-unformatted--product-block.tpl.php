<div class="shop_wrapper padding-top">
	<?php $i=1; foreach ($rows as $id => $row): ?>
		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php if($i%4==1) { echo 'first'; } elseif($i%4==0) { echo 'last'; } ?>">
			<?php print $row; ?>
		</div>
	<?php $i++; endforeach; ?>
	<script>jQuery('.node-add-to-cart').addClass('st btn btn-default');</script>
</div>