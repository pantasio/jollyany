<?php
	/**
	 * @file
	 * jollyany's theme implementation to display a single Portfolio node.
	 */
	global $base_url; 
	global $image_default;
	$next = jollyany_pagination($node, 'n');
	$prev = jollyany_pagination($node, 'p');

	if ($next != NULL) { 
	  $next_url = url('node/' . $next, array('absolute' => TRUE));
	}

	if ($prev != NULL) { 
	  $prev_url = url('node/' . $prev, array('absolute' => TRUE));
	}
?>
<?php if (!$page) : ?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="team_member testimonial_widget first">
        	<div class="entry">
				<?php if(isset($node->field_image['und'])) : ?>
					<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
				<?php else :?>
					<img src="<?php echo $image_default; ?>" alt="" class="img-responsive">
				<?php endif; ?>
			</div><!-- end entry -->
            <h3><?php print render($content['field_client']); ?> <span>|</span> <small><?php print render($content['field_regency']); ?> (<?php print render($content['field_company']); ?>)</small></h3>
            <?php
				// Hide comments, tags, and links now so that we can render them later.
				hide($content['field_client']);
				hide($content['field_regency']);
				hide($content['field_company']);
				hide($content['field_image']);
				hide($content['links']);
				hide($content['comments']);
				print render($content);
			?>
		</div><!-- end team_member -->
    </div><!-- end col-lg-3 -->
<?php elseif ($page) : ?>
	<div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 first">
			<div class="team_member">
            	<div class="entry">
            		<?php if(isset($node->field_image['und'])) : ?>
						<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
					<?php else :?>
						<img src="<?php echo $image_default; ?>" alt="" class="img-responsive">
					<?php endif; ?>
                </div><!-- end entry -->
			</div><!-- end team_member -->
        </div><!-- end col-lg-3 -->
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="team_member">
                <h1><?php print $node->title; ?> <span>|</span> <small><?php print render($content['field_regency']); ?>  (<?php print render($content['field_company']); ?>)</small></h1>
				<?php
					// Hide comments, tags, and links now so that we can render them later.
					hide($content['field_client']);
					hide($content['field_regency']);
					hide($content['field_company']);
					hide($content['field_image']);
					hide($content['links']);
					hide($content['comments']);
					print render($content);
				?>
				
				<div class="widget">
					<?php 
						$sidebar_node = block_get_blocks_by_region('sidebar_node'); 
						print render($sidebar_node); 
					?>
				</div><!-- end widget -->
			</div><!-- end team_member -->
        </div><!-- end col-lg-6 --> 
        
        <div class="clearfix"></div>
        <?php if($page && module_exists('prev_next')): ?>	
			<div class="next_prev text-center">
				<ul class="pager">
					<?php if(isset($prev_url)) : ?>
						<li class="previous">
							<a href="<?php echo $prev_url; ?>">← Older Testimonial</a>
						</li>
					<?php endif; ?>
					<?php if(isset($next_url)) : ?>
						<li class="next">
							<a href="<?php echo $next_url; ?>">Newer Testimonial →</a>
						</li>
					<?php endif; ?>
				</ul>
			</div><!-- next_prev -->
		<?php endif; ?>	
    </div>
<?php endif; ?>