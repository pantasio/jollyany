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
<?php if (!$page) : ?>
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="team_member">
			<div class="entry">
				<?php if(isset($node->field_image['und'])) : ?>
					<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
				<?php else :?>
					<img src="<?php global $image_default; echo $image_default; ?>" alt="" class="img-responsive">
				<?php endif; ?>
				<div class="magnifier">
					<div class="buttons">
						<?php if(!empty( $content['field_email'])) : ?>
							<a class="sf" rel="bookmark" href="<?php print render($content['field_email']); ?>"><span class="fa fa-envelope"></span></a>
						<?php endif; ?>
						<?php if(!empty($content['field_google_plus_url'])) : ?>
							<a class="sf" rel="bookmark" href="<?php print render($content['field_google_plus_url']); ?>"><span class="fa fa-google-plus"></span></a>
						<?php endif; ?>
						<?php if(!empty($content['field_twitter_url'])) : ?>
							<a class="st" rel="bookmark" href="<?php print render($content['field_twitter_url']); ?>"><span class="fa fa-twitter"></span></a>
						<?php endif; ?>
						<?php if(!empty($content['field_facebook_url'])) : ?>
							<a class="sg" rel="bookmark" href="<?php print render($content['field_facebook_url']); ?>"><span class="fa fa-facebook"></span></a>
						<?php endif; ?>
					</div>
				</div><!-- end magnifier -->
			</div><!-- end entry -->
			<h3><a href="<?php print $node_url; ?>"><?php print $node->title; ?></a> <span>|</span> <small><?php print render($content['field_member_regency']); ?></small></h3>
			<?php print $node->body['und'][0]['summary']; ?>
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
						<img src="<?php global $image_default; echo $image_default; ?>" alt="" class="img-responsive">
					<?php endif; ?>
                    <div class="magnifier">
                        <div class="buttons">
							<?php if(!empty( $content['field_email'])) : ?>
								<a class="sf" rel="bookmark" href="<?php print render($content['field_email']); ?>"><span class="fa fa-envelope"></span></a>
							<?php endif; ?>
							<?php if(!empty($content['field_google_plus_url'])) : ?>
								<a class="sf" rel="bookmark" href="<?php print render($content['field_google_plus_url']); ?>"><span class="fa fa-google-plus"></span></a>
							<?php endif; ?>
							<?php if(!empty($content['field_twitter_url'])) : ?>
								<a class="st" rel="bookmark" href="<?php print render($content['field_twitter_url']); ?>"><span class="fa fa-twitter"></span></a>
							<?php endif; ?>
							<?php if(!empty($content['field_facebook_url'])) : ?>
								<a class="sg" rel="bookmark" href="<?php print render($content['field_facebook_url']); ?>"><span class="fa fa-facebook"></span></a>
							<?php endif; ?>
						</div>
                    </div><!-- end magnifier -->
                </div><!-- end entry -->
			</div><!-- end team_member -->
        </div><!-- end col-lg-3 -->
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="team_member">
                <h1><?php print $node->title; ?> <span>|</span> <small><?php print render($content['field_member_regency']); ?></small></h1>
				<?php
					// Hide comments, tags, and links now so that we can render them later.
					hide($content['field_image']);
					hide($content['field_member_regency']);
					hide($content['field_email']);
					hide($content['field_facebook_url']);
					hide($content['field_twitter_url']);
					hide($content['field_google_plus_url']);
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
							<a href="<?php echo $prev_url; ?>">← Older Member</a>
						</li>
					<?php endif; ?>
					<?php if(isset($next_url)) : ?>
						<li class="next">
							<a href="<?php echo $next_url; ?>">Newer Member →</a>
						</li>
					<?php endif; ?>
				</ul>
			</div><!-- next_prev -->
		<?php endif; ?>	
    </div>
<?php endif; ?>