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

<div id="boxed-portfolio" class="portfolio_wrapper padding-top">
    <?php foreach ($rows as $row_number => $columns): ?>        
		<?php $i=1; foreach ($columns as $column_number => $item): ?>
            <?php print $item; ?>
		<?php $i++; endforeach; ?>
	<?php endforeach; ?>
</div>
