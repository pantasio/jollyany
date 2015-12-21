<?php
/**
 * @file
 * jollyany's theme implementation to display a single Portfolio node.
 */
global $base_url; 
$image_slide = "";

if ($items = field_get_items('node', $node, 'field_gallery')) {
  if (count($items) == 1) {
    $image_slide = 'false';
  }
  elseif (count($items) > 1) {
    $image_slide = 'true';
  }
}

$img_count = 0;
$counter = count($items);
?>


	<?php print render($title_prefix); ?>
	<?php if(isset($node->field_video['und']) && !empty($node->field_video['und'][0]['value'])) :?>
		<div class="timeline-badge danger"><i class="fa fa-play"></i></div>
		<div class="timeline-panel">
			<div class="blog-carousel">
				<div class="entry">
					<?php print $node->field_video['und'][0]['value']; ?>
					<div class="post-type">
						<i class="fa fa-play"></i>
					</div><!-- end pull-right -->
				</div><!-- end entry -->
				<div class="blog-carousel-header">
					<h3><a title="<?php print $title; ?>" href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
					<div class="blog-carousel-meta">
						<span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
						<span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php if ($comment_count> 0 && $comment_count != "1" ) { echo "s"; } ?></a></span>
						<span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
					</div><!-- end blog-carousel-meta -->
				</div><!-- end blog-carousel-header -->
				<div class="blog-carousel-desc">
					<?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; } ?>
				</div><!-- end blog-carousel-desc -->
			</div>
		</div>
	<?php elseif(isset($node->field_audio['und']) && !empty($node->field_audio['und'][0]['value'])) :?>
		<div class="timeline-badge danger"><i class="fa fa-music"></i></div>
		<div class="timeline-panel">
			<div class="blog-carousel">
				<div class="entry">
					<?php print $node->field_audio['und'][0]['value']; ?>
					<div class="post-type">
						<i class="fa fa-music"></i>
					</div><!-- end pull-right -->
				</div><!-- end entry -->
				<div class="blog-carousel-header">
					<h3><a title="<?php print $title; ?>" href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
					<div class="blog-carousel-meta">
						<span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
						<span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php if ($comment_count> 0 && $comment_count != "1" ) { echo "s"; } ?></a></span>
						<span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
					</div><!-- end blog-carousel-meta -->
				</div><!-- end blog-carousel-header -->
				<div class="blog-carousel-desc">
					<?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; } ?>
				</div><!-- end blog-carousel-desc -->
			</div>
		</div>
	<?php elseif(isset($node->field_quote['und']) && !empty($node->field_quote['und'][0]['value'])) :?>
		<div class="timeline-badge danger"><i class="fa fa-quote-left"></i></div>
		<div class="timeline-panel">
			<div class="blog-carousel">
				<div class="entry">
					<div class="quote-post">
						<blockquote>
							<?php print $node->field_quote['und'][0]['value']; ?>
						</blockquote>
					</div><!-- end quote-post -->
					<div class="post-type">
						<i class="fa fa-quote-right"></i>
					</div><!-- end pull-right -->
				</div><!-- end entry -->
					
				<div class="blog-carousel-header">
					<h3><a title="<?php print $title; ?>" href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
					<div class="blog-carousel-meta">
						<span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
						<span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php if ($comment_count> 0 && $comment_count != "1" ) { echo "s"; } ?></a></span>
						<span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
					</div><!-- end blog-carousel-meta -->
				</div><!-- end blog-carousel-header -->
				<div class="blog-carousel-desc">
					<?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; } ?>
				</div><!-- end blog-carousel-desc -->
			</div>
		</div>
	<?php elseif($image_slide != '') : ?>
		<div class="timeline-badge danger"><i class="fa fa-camera"></i></div>
		<div id="node-<?php print $node->nid; ?>" class="timeline-panel">
			<div class="blog-carousel">
				<div class="entry">
					<div class="flexslider">
						<ul class="slides">
							<?php while ($img_count < $counter) { ?>
								<li><img src="<?php echo file_create_url($node->field_gallery['und'][$img_count]['uri']); ?>" class="img-responsive" alt=""></li>
							<?php $img_count++; } ?>	
						</ul><!-- end slides -->    
					</div><!-- end post-slider -->  
					<div class="post-type">
						<i class="fa fa-camera"></i>
					</div><!-- end pull-right -->
				</div><!-- end entry -->
				<div class="blog-carousel-header">
					<h3><a title="<?php print $title; ?>" href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
					<div class="blog-carousel-meta">
						<span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
						<span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php if ($comment_count> 0 && $comment_count != "1" ) { echo "s"; } ?></a></span>
						<span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
					</div><!-- end blog-carousel-meta -->
				</div><!-- end blog-carousel-header -->
				<div class="blog-carousel-desc">
					<?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; } ?>
				</div><!-- end blog-carousel-desc -->
				<script type="text/javascript">
					jQuery(window).load(function(){
					  jQuery('#node-<?php print $node->nid; ?> .flexslider').flexslider({
						animation: "fade",
						controlNav: false,
						start: function(slider){
						  jQuery('body').removeClass('loading');
						}
					  });
					});
				</script>
			</div>
		</div>
	<?php else :?>
		<div class="timeline-badge danger"><i class="fa fa-pencil"></i></div>
		<div class="timeline-panel">
			<div class="blog-carousel">
				<div class="entry">
					<?php if(isset($node->field_image['und'])) : ?>
						<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
					<?php else :?>
						<img src="<?php global $image_default; echo $image_default; ?>" alt="" class="img-responsive">
					<?php endif; ?>
					<div class="magnifier">
						<div class="buttons">
							<a class="st" rel="bookmark" href="<?php print $node_url; ?>"><i class="fa fa-link"></i></a>
						</div><!-- end buttons -->
					</div><!-- end magnifier -->
					<div class="post-type">
						<i class="fa fa-picture-o"></i>
					</div><!-- end pull-right -->
				</div><!-- end entry -->
				<div class="blog-carousel-header">
					<h3><a title="<?php print $title; ?>" href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
					<div class="blog-carousel-meta">
						<span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
						<span><i class="fa fa-comment"></i> <a href="<?php print $node_url; ?>#comments"><?php print $comment_count; ?> Comment<?php if ($comment_count> 0 && $comment_count != "1" ) { echo "s"; } ?></a></span>
						<span><i class="fa fa-tag"></i> <?php print jollyany_format_comma_field('field_blog_category', $node); ?></span>
					</div><!-- end blog-carousel-meta -->
				</div><!-- end blog-carousel-header -->
				<div class="blog-carousel-desc">
					<?php if(isset($node->body['und'])) { print $node->body['und'][0]['summary']; } ?>
				</div><!-- end blog-carousel-desc -->
			</div>
		</div>
	<?php endif; ?>
	<?php print render($title_suffix); ?>


