<div class="servicesbox lazyOwl">
    <div class="title">
        <a href="<?php print $node_url; ?>">
            <div class="icon-container border-none">
                <i class="fa <?php print render($content['field_icon']); ?>"></i>
            </div>
            <h3><?php echo $title; ?></h3>
        </a>
    </div><!-- end title -->
    <div class="servicesbox_content">
        <?php print $node->body['und'][0]['summary']; ?>
    </div>
</div><!-- end servicesboxes -->