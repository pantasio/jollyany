<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="team_member text-center">
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
        <h3><?php print $node->title; ?> <span>|</span> <small><?php print render($content['field_member_regency']); ?></small></h3>
        <?php print $node->body['und'][0]['summary']; ?>
    </div><!-- end team_member -->
</div><!-- end col-lg-4 -->