<?php
/**
 * @file comment-wrapper.tpl.php
 * Jollyany's custom comment wrapper template.
 */
?>

<div class="padding-top <?php print $classes; ?>" <?php print $attributes; ?>>

  <?php if ($content['comments'] && $node->type != 'forum'): ?>
    <?php print render($title_prefix); ?>
    <h3><?php print t('Comments'); ?> (<?php print $node->comment_count; ?>)</h3>
    <?php print render($title_suffix); ?>
  <?php endif; ?>
  
   <?php if ($content['comments'] && $node->type != 'forum'): ?>
  <div class="comments_wrapper">
    <div class="comment-list">
		<?php print render($content['comments']); ?>
	</div>
  </div>  
  <?php endif; ?>
  
  <div class="clearfix"></div>

  <?php if ($content['comment_form']): ?>
	  <div class="comments_form">
		  <div class="title"><h3><?php print t('Leave a comment'); ?></h3></div>
		  <?php print render($content['comment_form']); ?>
	  </div>  
  <?php endif; ?>

</div> <!-- /#comments -->