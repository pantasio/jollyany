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
<div class="tagcloud">
	<?php $i=0; foreach ($rows as $id => $row): ?>
		<?php print $row; ?>
	<?php $i++; endforeach; ?>
</div>
		