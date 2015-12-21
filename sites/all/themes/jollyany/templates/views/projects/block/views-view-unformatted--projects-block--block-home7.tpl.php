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

<div class="padding-top margin-top">
    <div id="owl_portfolio_two_line" class="owl-carousel">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>  
        <?php endforeach; ?>
    </div>
</div>