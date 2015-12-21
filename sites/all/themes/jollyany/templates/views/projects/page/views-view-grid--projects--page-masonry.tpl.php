<?php

/**
 * @file
 * Default simple view template to display a rows in a grid.
 *
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 *
 * @ingroup views_templates
 */
?>

<?php if (!empty($title)) : ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="masonry_wrapper">
	<?php foreach ($rows as $row_number => $columns): ?>        
		<?php $i=1; foreach ($columns as $column_number => $item): ?>
			<div id="project<?php echo $i; ?>">
				<?php print $item; ?>
				<?php if($i==1 || $i == 3 || $i == 5 || $i == 10) : ?>
					<script>jQuery('#project<?php echo $i; ?> .item').addClass('item-w2');</script>
				<?php endif; ?>
			</div>
		<?php $i++; endforeach; ?>
	<?php endforeach; ?>
</div>


