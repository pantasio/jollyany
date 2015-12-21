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
	
	$termid = arg(2);
?>

<?php if (!$page) : ?>
	<?php if( !empty($termid) ) : ?>
		<div class="col-lg-4">
	<?php endif; ?>
		<div class="portfolio_item">
			<div class="entry">
				<?php if(isset($node->field_image['und'])) : ?>
					<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
				<?php else :?>
					<img src="<?php echo $image_default; ?>" alt="" class="img-responsive">
				<?php endif; ?>
				<div class="magnifier">
					<div class="buttons">
						<a class="st btn btn-default" rel="bookmark" href="<?php echo $node_url; ?>"><?php print theme_get_setting('project_text_button'); ?></a>
						<h3><?php print $title; ?></h3>
					</div><!-- end buttons -->
				</div><!-- end magnifier -->
			</div><!-- end entry -->
		</div><!-- end portfolio_item -->
	<?php if( !empty($termid) ) : ?>
		</div>
	<?php endif; ?>
<?php else :?>
	<div class="row">
	<?php if(isset($node->field_layout['und']) && $node->field_layout['und'][0]['taxonomy_term']->name == 'Sidebar') :?>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 single-portfolio">
				<div class="col-sm-7">
					<?php if(isset($node->field_video['und']) && !empty($node->field_video['und'][0]['value'])) :?>
						<div class="portfolio_item">
							<div class="entry">
								<?php print $node->field_video['und'][0]['value']; ?>
								<div class="post-type">
									<i class="fa fa-play"></i>
								</div><!-- end pull-right -->
							</div><!-- end entry -->
						</div><!-- end portfolio_item -->
					<?php elseif(isset($node->field_audio['und']) && !empty($node->field_audio['und'][0]['value'])) :?>
						<div class="portfolio_item">
							<div class="entry">
								<?php print $node->field_audio['und'][0]['value']; ?>
								<div class="post-type">
									<i class="fa fa-music"></i>
								</div><!-- end pull-right -->
							</div><!-- end entry -->
						</div><!-- end portfolio_item -->
					<?php elseif($image_slide != '') : ?>
						<div id="aboutslider" class="flexslider clearfix">
							<ul class="slides">
								<?php while ($img_count < $counter) { ?>
									<li><img src="<?php echo file_create_url($node->field_gallery['und'][$img_count]['uri']); ?>" class="img-responsive" alt=""></li>
								<?php $img_count++; } ?>	
							</ul><!-- end slides -->
						</div><!-- end slider -->
						<div class="aboutslider-shadow">
							<span class="s1"></span>
						</div>
					<?php else :?>
						<div class="portfolio_item">
							<div class="entry">
								<?php if(isset($node->field_image['und'])) : ?>
									<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
								<?php else :?>
									<img src="<?php echo $image_default; ?>" alt="" class="img-responsive">
								<?php endif; ?>
								<div class="magnifier">
									<div class="buttons">
										<a href="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" class="sf" title="" data-gal="prettyPhoto[product-gallery]"><span class="fa fa-search"></span></a>
										<a class="st" rel="bookmark" href="#"><span class="fa fa-heart"></span></a>
										<a class="sg" rel="bookmark" href="#"><span class="fa fa-eye"></span></a>
									</div>
								</div><!-- end magnifier -->
							</div><!-- entry -->
						</div><!-- end portfolio_item -->
					<?php endif; ?>
				</div><!-- end col-sm-6 -->
				<div class="col-sm-5">
					<div class="title">
						<h2><?php echo $title; ?></h2>
					</div><!-- end title -->	
					<?php
						// Hide comments, tags, and links now so that we can render them later.
						hide($content['field_live_demo']);
						hide($content['field_tags']);
						hide($content['field_category']);
						hide($content['field_skill']);
						hide($content['field_image']);
						hide($content['field_gallery']);
						hide($content['field_audio']);
						hide($content['field_video']);
						hide($content['field_layout']);
						hide($content['links']);
						hide($content['comments']);
						print render($content);
					?>
					<div class="product_details">
						<h3><?php print t('Project Details'); ?></h3>
						<ul>
							<li><strong><?php print t('Customer'); ?>:</strong> <?php print $name; ?></li>
							<?php if(isset($node->field_live_demo['und'])) : ?>
								<li><strong><?php print t('Live demo'); ?>:</strong> <a href="<?php print $node->field_live_demo['und'][0]['value']; ?>"><?php print $node->field_live_demo['und'][0]['value']; ?></a></li>
							<?php endif; ?>
							<li><strong><?php print t('Category'); ?>:</strong> <?php print jollyany_format_comma_field('field_category', $node); ?></li>
							<li><strong><?php print t('Skill'); ?>:</strong> <?php print jollyany_format_comma_field('field_skill', $node); ?></li>
							<li><strong><?php print t('Date post'); ?>:</strong> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></li>
							<li><strong><?php print t('Tags'); ?>:</strong> <?php print jollyany_format_comma_field('field_tags', $node); ?></li>
						</ul>				
					</div><!-- end product_details -->
				</div><!-- end col-sm-6 -->
			
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
   
	<?php else :?>
		
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 single-portfolio">
				<div class="full_portfolio">
					<?php if(isset($node->field_video['und']) && !empty($node->field_video['und'][0]['value'])) :?>
						<div class="portfolio_item">
							<div class="entry">
								<?php print $node->field_video['und'][0]['value']; ?>
								<div class="post-type">
									<i class="fa fa-play"></i>
								</div><!-- end pull-right -->
							</div><!-- end entry -->
						</div><!-- end portfolio_item -->
					<?php elseif(isset($node->field_audio['und']) && !empty($node->field_audio['und'][0]['value'])) :?>
						<div class="portfolio_item">
							<div class="entry">
								<?php print $node->field_audio['und'][0]['value']; ?>
								<div class="post-type">
									<i class="fa fa-music"></i>
								</div><!-- end pull-right -->
							</div><!-- end entry -->
						</div><!-- end portfolio_item -->
					<?php elseif($image_slide != '') : ?>
						<div id="aboutslider" class="flexslider clearfix">
							<ul class="slides">
								<?php while ($img_count < $counter) { ?>
									<li><img src="<?php echo file_create_url($node->field_gallery['und'][$img_count]['uri']); ?>" class="img-responsive" alt=""></li>
								<?php $img_count++; } ?>	
							</ul><!-- end slides -->
						</div><!-- end slider -->
						<div class="slider-shadow"></div>
					<?php else :?>
						<div class="portfolio_item">
							<div class="entry">
								<?php if(isset($node->field_image['und'])) : ?>
									<img src="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive">
								<?php else :?>
									<img src="<?php echo $image_default; ?>" alt="" class="img-responsive">
								<?php endif; ?>
								<div class="magnifier">
									<div class="buttons">
										<a href="<?php echo file_create_url($node->field_image['und'][0]['uri']); ?>" class="sf" title="" data-gal="prettyPhoto[product-gallery]"><span class="fa fa-search"></span></a>
										<a class="st" rel="bookmark" href="#"><span class="fa fa-heart"></span></a>
										<a class="sg" rel="bookmark" href="#"><span class="fa fa-eye"></span></a>
									</div>
								</div><!-- end magnifier -->
							</div><!-- entry -->
						</div><!-- end portfolio_item -->
					<?php endif; ?>
				</div><!-- end full_portfolio -->
	   
				<div class="col-sm-5">
					<div class="title">
						<h1><?php echo $title; ?></h1>
					</div><!-- end title -->	
					<?php
						// Hide comments, tags, and links now so that we can render them later.
						hide($content['field_live_demo']);
						hide($content['field_tags']);
						hide($content['field_category']);
						hide($content['field_skill']);
						hide($content['field_image']);
						hide($content['field_gallery']);
						hide($content['field_audio']);
						hide($content['field_video']);
						hide($content['field_layout']);
						hide($content['links']);
						hide($content['comments']);
						print render($content);
					?>
					<div class="product_details">
						<h3><?php print t('Project Details'); ?></h3>
						<ul>
							<li><strong><?php print t('Customer'); ?>:</strong> <?php print $name; ?></li>
							<?php if(isset($node->field_live_demo['und'][0]['value'])) : ?>
								<li><strong><?php print t('Live demo'); ?>:</strong> <a href="<?php print $node->field_live_demo['und'][0]['value']; ?>"><?php print $node->field_live_demo['und'][0]['value']; ?></a></li>
							<?php endif; ?>
							<li><strong><?php print t('Category'); ?>:</strong> <?php print jollyany_format_comma_field('field_category', $node); ?></li>
							<li><strong><?php print t('Skill'); ?>:</strong> <?php print jollyany_format_comma_field('field_skill', $node); ?></li>
							<li><strong><?php print t('Date post'); ?>:</strong> <?php print format_date($node->created, 'custom', 'd M, Y'); ?></li>
							<li><strong><?php print t('Tags'); ?>:</strong> <?php print jollyany_format_comma_field('field_tags', $node); ?></li>
						</ul>				
					</div><!-- end product_details -->
				</div><!-- end col-sm-6 -->
		 
				<div class="col-sm-7">
					<?php 
						$sidebar_node = block_get_blocks_by_region('sidebar_node'); 
						print render($sidebar_node); 
					?>
				</div><!-- end col-sm-6 -->
				
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
		 
	<?php endif; ?>
	</div>
<?php endif; ?>
