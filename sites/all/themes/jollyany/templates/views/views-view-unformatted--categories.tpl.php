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
<ul class="nav nav-tabs nav-stacked">
	<?php $i=0; foreach ($rows as $id => $row): ?>
		<li>
			<?php print $row; ?>
		</li>
	<?php $i++; endforeach; ?>
</ul>
		