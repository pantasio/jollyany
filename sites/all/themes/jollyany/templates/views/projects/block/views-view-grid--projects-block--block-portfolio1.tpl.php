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
    <?php
		$j = 1;
		foreach ($rows as $row_number => $columns):
    ?>        
        <?php
			$i = 1;
			foreach ($columns as $column_number => $item):
        ?>
            <div id="project<?php echo $i; ?>">
                <?php print $item; ?>
                <?php if ($j == 1) : ?>
                    <?php if ($i == 1 || $i == 3 || $i == 5) : ?>
                        <script>jQuery('#project<?php echo $i; ?> .item').addClass('item-w2');</script>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if ($i == 3) : ?>
                        <script>jQuery('#project<?php echo $i; ?> .item').addClass('item-w2');</script>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php
            $i++;
			endforeach;
        ?>
    <?php
        $j++;
		endforeach;
    ?>
</div>
