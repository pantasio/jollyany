<div class="servicebox">
    <a href="<?php print $node_url; ?>">
        <div class="service-icon-circle border-none">
            <i class="fa <?php print render($content['field_icon']); ?>"></i>
            <div class="arrow-up"></div>
        </div><!-- end service icon -->
    </a>
    <div class="title">
        <h3><?php echo $title; ?></h3>
    </div><!-- end title -->
    <?php print $node->body['und'][0]['summary']; ?>
</div>