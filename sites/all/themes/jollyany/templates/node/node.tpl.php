<?php
	/**
	 * @file
	 * jollyany's theme implementation to display a single Portfolio node.
	 */
	global $base_url; 
	$next = jollyany_pagination($node, 'n');
	$prev = jollyany_pagination($node, 'p');

	if ($next != NULL) { 
	  $next_url = url('node/' . $next, array('absolute' => TRUE));
	}

	if ($prev != NULL) { 
	  $prev_url = url('node/' . $prev, array('absolute' => TRUE));
	}
?>


	<div class="row">
       <div class="blog-masonry">
            <div class="col-lg-12">
                <div class="blog-carousel">
                    <div class="blog-carousel-header">
                        <h1><?php echo $title; ?></h1>
						<div class="blog-carousel-meta">
							<span><i class="fa fa-calendar"></i> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></span>
						</div>
                    </div><!-- end blog-carousel-header -->
                    <div class="blog-carousel-desc">
                        <?php
						  // We hide the comments and links now so that we can render them later.
						  hide($content['comments']);
						  hide($content['links']);
						  print render($content);
						?>
                    </div><!-- end blog-carousel-desc -->
                </div><!-- end blog-carousel -->
				
				<div class="clearfix"></div>                
                <div id="comments" class="padding-top">
                    <?php if ($comment == COMMENT_NODE_OPEN) : ?>
						<?php print render($content['comments']); ?>
					<?php endif; ?>
                </div><!-- end comments -->  
				
				<div class="clearfix"></div>
				<?php if($page && module_exists('prev_next')): ?>	
					<div class="next_prev text-center">
						<ul class="pager">
							<?php if(isset($prev_url)) : ?>
								<li class="previous">
									<a href="<?php echo $prev_url; ?>">← Older</a>
								</li>
							<?php endif; ?>
							<?php if(isset($next_url)) : ?>
								<li class="next">
									<a href="<?php echo $next_url; ?>">Newer →</a>
								</li>
							<?php endif; ?>
						</ul>
					</div><!-- next_prev -->
				<?php endif; ?>	
            </div><!-- end col-lg-12 -->
		</div><!-- end blog-masonry -->
    </div><!-- end row --> 

