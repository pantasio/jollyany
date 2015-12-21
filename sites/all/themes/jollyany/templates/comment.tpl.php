<?php
/**
 * @file comment.tpl.php
 * Jollyany's comment template.
 */
 
global $parent_root;
?>

<article class="comment">
	<?php if (!$picture) : ?>
		<img src="<?php echo $parent_root; ?>/demos/no-avatar.jpg" alt="avatar" class="img-circle comment-avatar">
	<?php else :?>
		<?php preg_match('/\< *[img][^\>]*[src] *= *[\"\']{0,1}([^\"\']*)/i', $picture, $matches); ?>
		<img src="<?php echo $matches[1]; ?>" alt="avatar" class="img-circle comment-avatar">
	<?php endif; ?>
	<div class="comment-content">
		<h4 class="comment-author">
			<?php print $author; ?> <small class="comment-meta"><?php print format_date($comment->created, 'custom', 'F d, Y'); ?></small>
		</h4>
		<?php if (!empty($content['links'])) { print render($content['links']); } ?>
		<?php hide($content['links']); print render($content); ?>
		<?php if ($signature): ?>
			<div class="user-signature clearfix">
				 <?php print $signature ?>
			</div>
		<?php endif; ?>
	</div>
</article><!-- End .comment -->

	